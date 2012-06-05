<?php

class SetComissionValue extends Doctrine_Migration_Base
{
  public function up()
  {
    $q = Doctrine_Query::create() 
      ->update('Deal') 
      ->set('commission', 30)
      ->where('is_oferton = ?', true); 
    $q->execute();   

    $q = Doctrine_Query::create() 
      ->update('Deal') 
      ->set('commission', 15)
      ->where('is_oferton = ?', false); 
    $q->execute();   

  }

  public function down()
  {
  }
}
