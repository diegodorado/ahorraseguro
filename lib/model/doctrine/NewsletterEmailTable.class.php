<?php

class NewsletterEmailTable extends Doctrine_Table
{

  public function getChunk($limit, $offset)
  {
    $q = $this->createQuery('ne')
      ->where('ne.is_active = ?', true)
      ->orderBy('ne.id ASC')
      ->limit($limit)
      ->offset($offset);
    return $q->fetchArray();
  }


  public function getByToken($token)
  {
    $q = $this->createQuery('ne')
      ->where('MD5(ne.email) = ?', $token);
    return $q->fetchOne();
  }  


}
