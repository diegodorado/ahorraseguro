<?php

/**
 * payments actions.
 *
 * @package    mendozaoferta
 * @subpackage payments
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentsActions extends sfActions
{


  public function executeGo(sfWebRequest $request)
  {
    $deal = Doctrine_Core::getTable('Deal')->find($request->getParameter('deal_id'));
    $payment = new Payment();
    $payment->setDeal($deal);
    $payment->setUser($this->getUser()->getGuardUser());
    $payment->setQuantity($request->getParameter('quantity'));
    $payment->setPrice($deal->getValue());
    $payment->setSaved($deal->getDiscount());
    $payment->setOffer($deal->getOffer());
    $payment->setRealValue($deal->getRealValue());
    $payment->setStatus('N');
    $payment->save();
    $payment->setCode(1000 + $payment->getId());
    $payment->save();
    
    $user = $this->getUser()->getGuardUser();
    
    $parameters = array(
      'ok_url'=>$this->generateUrl('payment_ok', $payment, true),
      'error_url'=>$this->generateUrl('payment_error', $payment, true),
      'pending_url'=>$this->generateUrl('payment_pending', $payment, true),
      'buyer_name'=>$user->getFirstName(),
      'buyer_lastname'=>$user->getLastName(),
      'buyer_document_type'=>'DNI',
      'buyer_email'=>$user->getEmail(),
      'transaction_id' =>$payment->getId(),
      'item_quantity_1'=>$payment->getQuantity(),
      'item_name_1'=>$deal->getTitle(),
      'item_ammount_1'=> $payment->getPrice()*100,
      'item_currency_1'=>'ars',
    );
    $parameters = array_merge(sfConfig::get('app_dineromail_checkout_params'),$parameters);
    $url = sfConfig::get('app_dineromail_checkout_url').'?'.http_build_query($parameters);
    $this->redirect($url);
     
  }

  public function executeOk(sfWebRequest $request)
  {
    $this->forward('payments', 'dmReturn');
  }

  public function executeError(sfWebRequest $request)
  {
    $this->forward('payments', 'dmReturn');
  }

  public function executePending(sfWebRequest $request)
  {
    $this->forward('payments', 'dmReturn');
  }


  public function executeDmReturn(sfWebRequest $request)
  {
    $payment = Doctrine_Core::getTable('Payment')->find($request->getParameter('id'));
    //forward404Unless payment found
    $this->forward404Unless($payment);
    
    $payment->check_status();
    
    switch ($payment->getStatus()) {
      case 'A':
        //ACREDITADO
        $this->getUser()->setFlash('notice', sprintf('Hemos recibido tu pago por %s. Te hemos enviado un email con el cupon a %s.', $payment->getDeal()->getTitle(),$payment->getUser()->getEmail()));
        $payment->check_status();
        $this->redirect($this->generateUrl('user_deals'));
        break;
      case 'P':
        //PENDIENTE  DE  PAGO
        $this->getUser()->setFlash('notice', sprintf('Tu compra por %s se encuentra en estado PENDIENTE. Una vez que hayamos registrado tu pago, recibirás tu cupón por email. Gracias!', $payment->getDeal()->getTitle()));
        $this->redirect($this->generateUrl('deal', $payment->getDeal()));
        break;
      case 'C':
        //CANCELADO
        $this->getUser()->setFlash('error', sprintf('Has cancelado tu compra por %s. Puedes intentarlo de nuevo si quieres.', $payment->getDeal()->getTitle()));
        $this->redirect($this->generateUrl('deal', $payment->getDeal()));
        break;
      case 'E':
        //ERROR
        $this->getUser()->setFlash('error', 'Ha habido un error con tu compra. Puedes informarnos para que podamos ayudarte?');
        $this->redirect($this->generateUrl('contact_us'));        
        break;
    }    
    $this->sendUserNotificaction($payment);

  }


  public function executeNotification(sfWebRequest $request)
  {
    $notificacion = $request->getPostParameter('Notificacion');
    //$notificacion = $_REQUEST['Notificacion'];
    try {
      $doc = new SimpleXMLElement($notificacion);

      if( (int)$doc->tiponotificacion!==1){
        throw new Exception('Se esperaba que TIPONOTIFICACION fuera 1');
      }

      foreach ($doc->operaciones->operacion  as  $op) {

        if( (int)$op->tipo!==1){
          throw new Exception('Se esperaba que TIPO fuera 1');
        }
        $payment = Doctrine_Core::getTable('Payment')->find((int)$op->id);
        if(!$payment){
          throw new Exception('No existe el registro.');
        }
        $payment->check_status();
        $this->sendUserNotificaction($payment);
      }

    } catch (Exception $e) {
      //enviar mail si hubo un error
      $message = Swift_Message::newInstance()
        ->setFrom(array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')))
        ->setSubject('Excepción capturada: '.$e->getMessage())
        ->setBody($notificacion)
        ->setTo('diego@cooperativahormigon.com.ar')
      ;
      $this->getMailer()->send($message);  
      return $this->renderText($e->getMessage());
    }

    return $this->renderText('OK');
  }
  


  public function sendUserNotificaction($payment)
  {
    if(!$payment->isCompleted()){
      return;
    }
    
    $mailBody = $this->getPartial('mails/coupon', array('payment'=>$payment));
    $message = Swift_Message::newInstance()
      ->setFrom(array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')))
      ->setSubject('Tu compra por '.$payment->getDeal()->getTitle())
      ->setBody($mailBody)
      ->setContentType("text/html")
      ->setTo($payment->getUser()->getEmail())
    ;
    $this->getMailer()->send($message);
  }

  
}
