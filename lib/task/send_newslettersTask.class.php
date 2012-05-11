<?php

class send_newslettersTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'send_newsletters';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [send_newsletters|INFO] task send a newsletter with latest deals.
Call it with:

  [php symfony send_newsletters|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $nm = Doctrine_Core::getTable('NewsletterMessage')->getActive();
    if($nm){
      $nes = Doctrine_Core::getTable('NewsletterEmail')->getChunk($nm->limit_i,$nm->offset_i);

      $mailer = $this->getMailer();

      //$logger = new Swift_Plugins_Loggers_ArrayLogger();
      //$mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));

      foreach($nes as $ne){
        $replacements[$ne['email']] = array(
          '{email}'      => $ne['email'],
          '{unsuscribe_uri}' => '/unsuscribe/'.md5($ne['email']),
        );
      }
      $mailer->registerPlugin(new Swift_Plugins_DecoratorPlugin($replacements));

      $message = Swift_Message::newInstance()
        ->setFrom(array($nm->from_email => $nm->from_name))
        ->setSubject($nm->subject)
        ->setBody($nm->body)
        ->setContentType("text/html")
      ;

      foreach($nes as $ne){
        $message->setTo($ne['email']);
        $failedRecipients = null;
        if ($mailer->send($message, $failedRecipients)){
          $nm->sent_count++;    
        }
      }
      
      $nm->offset_i += $nm->limit_i;
      if($nm->offset_i >= $nm->recipients_count){
        $nm->is_active = false;
      }
      //what to do with logs??
      //log to symfony? do not log at all?
      //$nm->body .= '<pre>'.htmlentities($logger->dump()).'</pre>';
      
      $nm->save();
    }
    

  }
}
