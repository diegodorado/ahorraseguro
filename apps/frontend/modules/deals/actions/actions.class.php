<?php

/**
 * deals actions.
 *
 * @package    mendozaoferta
 * @subpackage deals
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dealsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->isFirstVisit() && !$request->hasParameter('ref')){
      $this->redirect('@homepage?ref=logo');  
    }
  
    $this->ref = $request->getParameter('ref');
    $this->title = 'Ofertones de hoy';
    $this->deals = Doctrine_Core::getTable('Deal')->getBigDeals();  
  }

  public function executeDeals(sfWebRequest $request)
  {
     $category_id = $request->getParameter('category_id');
     $quarter_id = $request->getParameter('quarter_id');
     $yapa = !!$request->getParameter('yapa');
     if($category_id){
       $category = Doctrine_Core::getTable('Category')->find($category_id);
       $this->title = 'Ofertas de '.$category->getName();
       if($quarter_id){
         $quarter = Doctrine_Core::getTable('Quarter')->find($quarter_id);
         $this->title .= ' en '.$quarter->getName();
       }
     }else{
       $this->title = 'Todas las ofertas';
     }
     $this->deals = Doctrine_Core::getTable('Deal')->getDeals($category_id,$quarter_id,$yapa);
     $this->setTemplate('index');
  }


  public function executeClosed(sfWebRequest $request)
  {
     $this->deals = Doctrine_Core::getTable('Deal')->getClosedDeals();
  }

  public function executeShow(sfWebRequest $request)
  {
     $this->deal = Doctrine_Core::getTable('Deal')->getDeal($request->getParameter('id'));
     $this->deal->increaseVisited();
     if(!$this->deal->isOpen()){
      return 'Closed';
     }
  }


  public function executeCheckout(sfWebRequest $request)
  {
    $this->deal = Doctrine_Core::getTable('Deal')->find($request->getParameter('id'));
    if ($this->deal->getAvailable()===0){
      $this->getUser()->setFlash('error', 'No quedan unidades de esta oferta.');
      $this->redirect($this->generateUrl('deal', $this->deal));
    }
  }


  public function executePay(sfWebRequest $request)
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
    $payment->setStatus('P');
    $payment->save();
    
    $this->getUser()->setPayment($payment->getId());
    $parameters = array(
      'ok_url'=>$this->generateUrl('payment_ok', $payment, true),
      'error_url'=>$this->generateUrl('payment_error', $payment, true),
      'buyer_name'=>$this->getUser()->getUsername(),
      'buyer_email'=>$this->getUser()->getEmail(),
      'item_quantity_1'=>$payment->getQuantity(),
      'item_name_1'=>$deal->getTitle(),
      'item_ammount_1'=> $payment->getPrice()*100,
      'item_currency_1'=>'ars',
    );
    $parameters = array_merge(sfConfig::get('app_dineromail_checkout_params'),$parameters);
    $url = sfConfig::get('app_dineromail_checkout_url').'?'.http_build_query($parameters);
    $this->redirect($url);
     
  }

  public function executePaymentOk(sfWebRequest $request)
  {
    //todo: falta chequear que pasa si el usuario cerró sesión.... mejorar el metodo de verificacion
    $payment = Doctrine_Core::getTable('Payment')->find($request->getParameter('id'));
    //forward404Unless payment found
    $this->forward404Unless($payment);
    //forward404Unless payment in user session
    $this->forward404Unless($this->getUser()->getPayment()==$payment->getId());

    //all right, can continue
    $this->getUser()->clearPayment();
    $deal = $payment->getDeal();
    $deal->increaseBought();
    $payment->setStatus('C');
    $payment->setCode(1000 + $payment->getId());
    $payment->save();

    $this->getMailer()->composeAndSend(
      array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')),
      sfConfig::get('app_from_email'),
      'Han realizado una compra por '.$deal->getTitle(),
      sprintf('%s ha realizado una compra de $%s por %s.', $this->getUser()->getUsername(),$payment->getPrice(),$deal->getTitle())
    );    

    $body = <<<EOF
Hemos recibido tu pago por %s.<br/>
<br/>
Fecha de compra: %s<br/>
Cantidad comprada: %s<br/>
Importe Real: $%s<br/>
Descuento: $%s<br/>
Importe Final: $%s<br/>
------------------------<br/>
Nro de Referencia: %s<br/>
<br/>
<br/>
-------------------------<br/>
Puedes imprimir este email para utilizar tu descuento.<br/>
También estará accesible desde nuestro sitio ingresando a "MI CUENTA"
EOF;

    $body = sprintf($body,
                    $deal->getTitle(),
                    $payment->getDateTimeObject('updated_at')->format('d/m/Y'),
                    $payment->getQuantity(),
                    $payment->getRealValue()*$payment->getQuantity(),
                    $payment->getSaved()*$payment->getQuantity(),
                    $payment->getPrice()*$payment->getQuantity(),
                    $payment->getCode());
    $this->getMailer()->composeAndSend(
      array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')),
      $this->getUser()->getEmail(),
      'Tu compra por '.$deal->getTitle(),
      $body
    );


    $this->getUser()->setFlash('notice', sprintf('Hemos recibido tu pago por %s. Te hemos enviado un email con el cupon a %s. Revisa tu casilla.', $deal->getTitle(),$this->getUser()->getEmail()));
    $this->redirect($this->generateUrl('deal', $deal));

  }

  public function executePaymentError(sfWebRequest $request)
  {
    //todo: falta chequear que pasa si el usuario cerró sesión.... mejorar el metodo de verificacion
    $payment = Doctrine_Core::getTable('Payment')->find($request->getParameter('id'));
    //forward404Unless payment found
    $this->forward404Unless($payment);
    //all right, can continue
    $this->getUser()->clearPayment();
    $deal = $payment->getDeal();
    $payment->setStatus('E');
    $payment->save();
    $this->getUser()->setFlash('error', sprintf('Has cancelado tu compra por %s. Puedes intentarlo de nuevo si quieres.', $deal->getTitle()));
    $this->redirect($this->generateUrl('deal', $deal));

  }

  
}
