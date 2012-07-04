<?php

require_once dirname(__FILE__).'/../lib/paymentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/paymentGeneratorHelper.class.php';

/**
 * payment actions.
 *
 * @package    mendozaoferta
 * @subpackage payment
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends autoPaymentActions
{

  public function executeCheck(sfWebRequest $request) {
    $payment = Doctrine_Core::getTable('Payment')->find($request->getParameter('id'));
    if($payment->check_status()){
      $flash = 'notice';
    }else{
      $flash = 'error';
    }
    $this->getUser()->setFlash($flash, sprintf('El estado del pago %s es: %s',$payment->getId(),$payment->friendly_status()));
    $this->redirect('@payment');
  }


  public function executeFeed(sfWebRequest $request) {
    $token = $request->getParameter('token');
    if($token == 'Ahorra123Token'){
      return $this->renderText('ERROR!');
    }else{
      $q = Doctrine_Query::create()
        ->select('quantity,price,saved,real_value,offer')
        ->from('payment');
      $r = $q->execute(array(),Doctrine_Core::HYDRATE_ARRAY);
      return $this->renderText(json_encode($r));
    }
  }




}
