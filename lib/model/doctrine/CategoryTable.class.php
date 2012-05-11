<?php

class CategoryTable extends Doctrine_Table
{
  public function getDescuentosCategories($filter=false)
  {
    $q = $this->createQuery('c')
      ->orderBy('c.name ASC');

    if($filter){
      $q->leftJoin('c.Deal d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'D')
      ;
    }      

    return $q->execute();
  }
  public function getPromocionesCategories($filter=false)
  {
    $q = $this->createQuery('c')
      ->orderBy('c.name ASC');

    if($filter){
      $q->leftJoin('c.Deal d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'P')
      ;
    }
   return $q->execute();
     
  }
  
  public function getCategory($id)
  {
    $q = $this->createQuery('c')
      ->where('c.id = ?', $id);
    return $q->fetchOne();
  }    
}
