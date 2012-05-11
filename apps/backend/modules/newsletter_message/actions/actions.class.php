<?php

require_once dirname(__FILE__).'/../lib/newsletter_messageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/newsletter_messageGeneratorHelper.class.php';

/**
 * newsletter_message actions.
 *
 * @package    mendozaoferta
 * @subpackage newsletter_message
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletter_messageActions extends autoNewsletter_messageActions
{

  function executePreview(sfWebRequest $request) {

    $this->message = Doctrine_Core::getTable('NewsletterMessage')->getMessage($request->getParameter('id'));
  }
  
  function executeStatus(sfWebRequest $request) {

    $this->message = Doctrine_Core::getTable('NewsletterMessage')->getMessage($request->getParameter('id'));
  }

 

}
