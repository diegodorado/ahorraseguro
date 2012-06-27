<?php

class ChangePaymentStatusValues extends Doctrine_Migration_Base
{
  public function up()
  {
    $q = Doctrine_Query::create() 
      ->update('Payment') 
      ->set('status', '?','A')
      ->where('status = ?', 'C'); 
    $q->execute();   

  }

  public function down()
  {
  }
}
