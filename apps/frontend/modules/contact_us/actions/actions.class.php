<?php

/**
 * contact_us actions.
 *
 * @package    mendozaoferta
 * @subpackage contact_us
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contact_usActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new ContactoForm;

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contacto'));
      if ($this->form->isValid())
      {
        $message = Swift_Message::newInstance()
          ->setFrom(array($this->form->getValue('email') => $this->form->getValue('nombre')))
          ->setTo('info@mendozaoferta.com.ar')
          ->setSubject('Contacto - Mendoza Oferta')
          ->setBody($this->form->getValue('comentario'))
          ->setContentType("text/html")
        ;
        $this->getMailer()->send($message);
        
        $this->redirect('@contact_us_sent');

      }
    }    
      
      
  }
  public function executeSent(sfWebRequest $request)
  {
  }
  
}
