<?php

class usersActions extends sfActions
{
  public function executeRegister(sfWebRequest $request) {
		if($this->getUser()->isAuthenticated()){
        $this->getUser()->setFlash('notice', 'Ya estás conectado.');
		  $this->redirect($request->getParameter('referer', '@homepage'));
		}
		$this->form = new userRegisterForm();
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('sf_guard_user'));
      if ($this->form->isValid()){
        $this->form->save();
        $user = $this->form->getObject();
        $this->getUser()->signIn($user);

        $mailBody = $this->getPartial('mails/register');
        $message = Swift_Message::newInstance()
          ->setFrom(array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')))
          ->setSubject('Gracias por Registrate en ahorraseguro.com.ar')
          ->setBody($mailBody)
          ->setContentType("text/html")
          ->setTo($user->getEmail())
        ;
        $this->getMailer()->send($message);
        $this->getUser()->setFlash('notice', 'Bienvenido! Ya podés empezar a ahorrar seguro.');

        $this->redirect($request->getParameter('referer', '@homepage'));
      }
    }
  }

  public function executeSuscribe(sfWebRequest $request) {
    $params =  $request->getParameter('newsletter_email');
    $ne = Doctrine_Query::create()
      ->from('NewsletterEmail')
      ->where('email = ?',$params['email'])
      ->fetchOne();

    if($ne && !$ne->getIsOriginal()){
      //means it was loaded from backend
      $ne->setIsOriginal(true);
      $ne->save();
      $this->getUser()->setFlash('notice', sprintf('Te suscribiste correctamente a nuestro newsletter utilizando el siguiente correo electrónico:  %s .', $ne->getEmail()));
    }else{
		  $this->form = new userSuscriptionForm;
      $this->form->bind($params);
      if ($this->form->isValid()){
        $this->form->save();
        $this->getUser()->setFlash('notice', sprintf('Te suscribiste correctamente a nuestro newsletter utilizando el siguiente correo electrónico:  %s .', $this->form->getObject()->getEmail()));
      }else{
        $this->getUser()->setFlash('error', $this->form['email']->getError());
      }
    }
    

    $this->redirect('@homepage');
  }


  public function executeUnsuscribe(sfWebRequest $request) {

    $ne = Doctrine_Core::getTable('NewsletterEmail')->getByToken($request->getParameter('token'));  
    if ($ne){
      $ne->is_active = 0;
      $ne->save();
      $this->getUser()->setFlash('notice', sprintf('Hemos anulado la suscripción de la cuenta de correo electrónico: %s.', $ne->getEmail()));
    }else{
      $this->getUser()->setFlash('error','El link para anular la suscripción es inválido.');
    }
    $this->redirect('@homepage');
  }


  public function executeBoucher(sfWebRequest $request) {
    $this->payment = Doctrine_Core::getTable('Payment')->getPayment($request->getParameter('id'));
  }

  public function executeAccount(sfWebRequest $request) {
    $this->redirect('@user_savings');
  }

  public function executeDeals(sfWebRequest $request) {
     $user_id = $this->getUser()->getGuarduser()->getId();
     $this->payments = Doctrine_Core::getTable('Payment')->getUserPayments($user_id);  
  }

  public function executeSavings(sfWebRequest $request) {
    $user_id = $this->getUser()->getGuarduser()->getId();
    
    $q = Doctrine_Query::create()
      ->select('count(*) as deals_count, sum(quantity) as quantity_total,sum(price) as price_total,sum(saved) as saved_total,sum(real_value) as real_value_total,avg(offer) as offer_avg')
      ->from('payment')
      ->where('user_id=?',$user_id)
      ->andWhere('status=?','A');
    $r = $q->execute(array(),Doctrine_Core::HYDRATE_ARRAY);
    $this->data = array(
      array('class'=>'', 'title'=>'Ofertas Realizadas','value'=>$r[0]['deals_count']),
      array('class'=>'', 'title'=>'Cantidad Comprada','value'=>sprintf('%d',$r[0]['quantity_total'])),
      array('class'=>'', 'title'=>'Dinero Abonado','value'=>sprintf('$ %d',$r[0]['price_total'])),
      array('class'=>'saved', 'title'=>'Dinero Ahorrado','value'=>sprintf('$ %d',$r[0]['saved_total'])),
      array('class'=>'', 'title'=>'Valor Real Total','value'=>sprintf('$ %d',$r[0]['real_value_total'])),
      array('class'=>'', 'title'=>'Porcentaje Promedio Ahorrado','value'=>sprintf('%d%%',$r[0]['offer_avg']))
    );
     
  }
  
  public function executeEditAccount(sfWebRequest $request) {
		$this->form = new userEditForm($this->getUser()->getGuarduser());
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('sf_guard_user'));
      if ($this->form->isValid()){
        $this->form->save();
        $this->getUser()->setFlash('notice', 'Datos Actualizados');
        $this->redirect('@user_edit_account');
      }
    }		
  }
  public function executeChangePassword(sfWebRequest $request) {
		$this->form = new userChangePasswordForm($this->getUser()->getGuarduser());
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('sf_guard_user'));
      if ($this->form->isValid()){
        $this->form->save();
        $this->getUser()->setFlash('notice', 'Datos Actualizados');
        $this->redirect('@user_account');
      }
    }		
  }


}
