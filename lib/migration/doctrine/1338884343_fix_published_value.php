<?php

class FixPublishedValue extends Doctrine_Migration_Base
{
  public function up()
  {
    $q = Doctrine_Query::create() 
      ->update('Deal') 
      ->set('published_value', 'ROUND((real_value * (100 - offer)/100))'); 
    $q->execute();   
  
  }

  public function down()
  {
  }
}
