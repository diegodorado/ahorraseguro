<?php

class UpdateNewsletterTitle extends Doctrine_Migration_Base
{
  public function up()
  {

    Doctrine_Query::create() 
    ->update('deal') 
    ->set('newsletter_title', 'title')
    ->execute();   

  }

  public function down()
  {
  }
}
