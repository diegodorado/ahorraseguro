<?php

class create_newsletterTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name','frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'newsletter';
    $this->name             = 'create';
    $this->briefDescription = 'creates the newsletter message';
    $this->detailedDescription = <<<EOF
The [create_newsletter|INFO] task creates the newsletter message.
Call it with:

  [php symfony newsletter:create|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    sfContext::createInstance($this->configuration);
    $this->configuration->loadHelpers('Partial');

    $big_deals = Doctrine_Core::getTable('Deal')->getTodayBigDeals();
    $deals = Doctrine_Core::getTable('Deal')->getTodayDeals();

    if (count($big_deals)){
      
      $html = get_partial('mails/newsletter', array('base_url'=>'http://ahorraseguro.com.ar','big_deals'=>$big_deals, 'deals'=>$deals));
      $titles = array();
      foreach($big_deals as $deal){
        $titles[] = $deal->getNewsletterTitle();
      }

      //just in case...disable last active message
      //todo: use an update query.. do not fetch it
      $nm = Doctrine_Core::getTable('NewsletterMessage')->getActive();
      if($nm){
        $nm->is_active = false;
        $nm->save();
      }

      $q = Doctrine_Query::create()
        ->select('COUNT(ne.id)')
        ->from('NewsletterEmail ne')
        ->where('ne.is_active = ?', true);
      $result = $q->execute(array(), Doctrine_Core::HYDRATE_NONE);
      $total = $result[0][0];
      $limit = ceil($total/300);// 5h *60min

      $nm = new NewsletterMessage();
      $nm->from_email = 'info@ahorraserguro.com.ar';
      $nm->from_name = 'Ahorra Seguro';
      $nm->subject = implode(' - ',$titles);
      $nm->body = $html;
      $nm->limit_i = $limit;
      $nm->offset_i = 0;
      $nm->recipients_count = $total;
      $nm->sent_count = 0;    
      $nm->is_active = 1;
      //$nm->save();    


      $message = Swift_Message::newInstance()
        ->setFrom(array($nm->from_email => $nm->from_name))
        ->setSubject($nm->subject)
        ->setBody($nm->body)
        ->setTo('angelcrego@gmail.com,diego@cooperativahormigon.com.ar')
      ;

      $this->getMailer()->send($message);
      $message = Swift_Message::newInstance()
        ->setFrom(array($nm->from_email => $nm->from_name))
        ->setSubject($nm->subject)
        ->setBody($nm->body)
        ->setTo('angelcrego@gmail.com,diego@cooperativahormigon.com.ar')
        ->setContentType("text/html")
      ;

      $this->getMailer()->send($message);
      



    }else{
      echo "No hay Ofertones para crear el newsletter\n";
    }
  }


}
