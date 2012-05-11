<?php

class NewsletterMessageTable extends Doctrine_Table
{

  public function getActive()
  {
    $q = $this->createQuery('nm')
      ->where('nm.is_active = ?', true);
    return $q->fetchOne();
  }

  public function getMessage($id)
  {
    $q = $this->createQuery('m')
      ->where('m.id = ?', $id);
    return $q->fetchOne();
  }  



}
