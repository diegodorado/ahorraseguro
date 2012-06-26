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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }


  public function executeIpn_notification(sfWebRequest $request)
  {
  
    $mailBody = var_export($_POST);
    $message = Swift_Message::newInstance()
      ->setFrom(array(sfConfig::get('app_from_email')=>sfConfig::get('app_from_fullname')))
      ->setSubject('ipn test')
      ->setBody($mailBody)
      ->setContentType("text/html")
      ->setTo('diego@cooperativahormigon.com.ar')
    ;
    $this->getMailer()->send($message);  
  
    return $this->renderText('OK');
  }
  
  
}
