<?php

require_once dirname(__FILE__).'/../lib/newsletter_emailGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/newsletter_emailGeneratorHelper.class.php';

/**
 * newsletter_email actions.
 *
 * @package    mendozaoferta
 * @subpackage newsletter_email
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletter_emailActions extends autoNewsletter_emailActions
{
  public function executeUpload(sfWebRequest $request)
  {
    //handles file upload and puts emails to db 

    if ($request->isMethod('post')){
      $mails = array();
      if ($_FILES['list']['error'] == UPLOAD_ERR_OK               //checks for errors
            && is_uploaded_file($_FILES['list']['tmp_name'])) { //checks that file is uploaded

          $handle = @fopen($_FILES['list']['tmp_name'], "r");
          $ln= 0;
          if ($handle) {
              while (($buffer = fgets($handle, 4096)) !== false) {
                $ln++;
                $buffer = trim($buffer);
                $mails[$buffer] = $ln;
              }
              if (!feof($handle)) {
                $this->getUser()->setFlash('error', 'Error: unexpected fgets() fail.');
                $this->redirect('@upload_emails');
              }
              fclose($handle);
          }

            
        //stops if an email is invalid
        $regexp = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/";
        foreach (array_keys($mails) as $mail) {
          if (!preg_match($regexp, $mail)) {
            $this->getUser()->setFlash('error', sprintf("Email '%s' invalido en la linea %d",$mail, $mails[$mail]));
            $this->redirect('@upload_emails');
          }
        }  


        //stops if an email is duplicated
        $q = Doctrine_Query::create()
          ->select('email')
          ->from('NewsletterEmail')
          ->whereIn('email',array_keys($mails));
        $r = $q->execute(array(),Doctrine_Core::HYDRATE_SINGLE_SCALAR);

        if ($r) {
          $this->getUser()->setFlash('error', sprintf("Email '%s' en la linea %d ya existe en la DB",$r, $mails[$r]));
          $this->redirect('@upload_emails');
        }


        $nec = new Doctrine_Collection('NewsletterEmail');
        foreach (array_keys($mails) as $mail) {
          $ne = new NewsletterEmail;
          $ne->setEmail($mail);
          $ne->setIsOriginal(false);
          $nec->add($ne);
        }  

        $this->mails = $nec->save();



      }  




    }		


  }
}
