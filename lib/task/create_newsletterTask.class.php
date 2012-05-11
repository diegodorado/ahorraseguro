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

    $this->namespace        = '';
    $this->name             = 'create_newsletter';
    $this->briefDescription = 'creates the newsletter message';
    $this->detailedDescription = <<<EOF
The [create_newsletter|INFO] task creates the newsletter message.
Call it with:

  [php symfony create_newsletter|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    sfContext::createInstance($this->configuration);
    $this->configuration->loadHelpers('Partial');

    $deals = Doctrine_Core::getTable('Deal')->getTodayDeals();
    $descuentos = Doctrine_Core::getTable('Deal')->getRandomDescuentos();

    if (count($deals)){
      
      $html = get_partial('mails/newsletter', array('base_url'=>'http://ahorraseguro.com.ar','deals'=>$deals, 'descuentos'=>$descuentos));
      $titles = array();
      foreach($deals as $deal){
        $titles[] = $deal->getNewsletterTitle();
      }

      //just in case...disable last active message
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
      $limit = ceil($total/300);

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
      $nm->save();    

    }
  }


}
