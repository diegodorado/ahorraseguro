<?php

class DealTable extends Doctrine_Table
{
  private static $random_type = 'D';
  private static $random_excluded_category_id = null;
  private static $random_left_ids = null;
  private static $random_right_ids = null;
  public static $types = array(
    'O' => 'Oferton',
    'D' => 'Descuento',
    'P' => 'Promocion',
  );

  private static function getRandomLeftIds()
  {
    if(!self::$random_left_ids){ self::setRandomIds();}
    return self::$random_left_ids;
  }

  private static function getRandomRightIds()
  {
    if(!self::$random_right_ids){ self::setRandomIds();}
    return self::$random_right_ids;
  }

  private static function setRandomType($type)
  {
    self::$random_type = $type;
  }

  private static function getRandomType()
  {
    return self::$random_type;
  }

  public static function getRandomTitle()
  {
    switch (self::$random_type){
      case 'D': 
        return 'Descuentos';
        break;
      case 'P':
        return 'Promociones';
        break;
      case 'O':
        return 'Ofertones';
        break;
    }
    return self::$random_type;
  }

  private static function setRandomExcludedCategoryId($id)
  {
    self::$random_excluded_category_id = $id;
  }

  private static function getRandomExcludedCategoryId()
  {
    return self::$random_excluded_category_id;
  }


  private static function setRandomIds()
  {
    sfContext::getInstance()->getLogger()->debug( 'self::getRandomExcludedCategoryId().'.var_export(self::getRandomExcludedCategoryId(),true) );

    $q = Doctrine_Query::create()
      ->select('d.id, RANDOM() AS rand')
      ->from('Deal d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', self::getRandomType())
      ->orderby('rand')
      ->limit(11);
    if(self::getRandomExcludedCategoryId()){
      $q->andWhere('d.category_id <> ?', self::getRandomExcludedCategoryId());
    }
    self::$random_left_ids = array();
    self::$random_right_ids = array();
    $i=0;
    foreach($q->execute(array(),Doctrine_Core::HYDRATE_ARRAY) as $r){
      (($i%2)==0) ? self::$random_left_ids[]= $r['id'] : self::$random_right_ids[]= $r['id'];
      $i++;
    }
  }
  
  public function getDeals()
  {
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'O')
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }

  public function getClosedDeals()
  {
    $q = $this->createQuery('d')
      ->andWhere('d.ends_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ? OR d.type = ?', array('O','D'))
      ->orderBy('d.ends_at DESC');
    return $q->execute();
  }

  public function getRandomLeftDeals()
  {
    //sfContext::getInstance()->getLogger()->debug( 'getRandomLeftIds.'.var_export(self::$random_left_ids,true) );
    //do not query if empty
    if(count(self::getRandomLeftIds())==0){ return array();}
    $q = $this->createQuery('d')->whereIn('d.id', self::getRandomLeftIds());
    return $q->execute();
  }

  public function getRandomRightDeals()
  {
    //do not query if empty
    if(count(self::getRandomRightIds())==0){ return array();}
    $q = $this->createQuery('d')->whereIn('d.id', self::getRandomRightIds());
    return $q->execute();
  }

  public function getDescuentosCategoryDeals($id)
  {
    self::setRandomExcludedCategoryId($id);
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'D')
      ->andWhere('d.category_id = ?', $id)
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }

  public function getPromocionesCategoryDeals($id)
  {
    self::setRandomExcludedCategoryId($id);
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'P')
      ->andWhere('d.category_id = ?', $id)
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }

  public function getPromoDeals()
  {
    //avoid showing same type*** change: always show random descuentos
    //self::setRandomType('D');
    
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'P')
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }


  public function getDeal($id)
  {
    $q = $this->createQuery('d')
      ->where('d.id = ?', $id);
    return $q->fetchOne();
  }  

  public function getTodayDeals()
  {
    $q = $this->createQuery('d')
      ->where('d.starts_at >= ?', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") , date("d")+0, date("Y"))))
      ->andWhere('d.ends_at < ?', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") , date("d")+1, date("Y"))))
      ->andWhere('d.type = ?', 'O')
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }

  public function getRandomDescuentos()
  {
    $q = $this->createQuery('d')
       ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.type = ?', 'D')
      ->orderby('rand()')
      ->limit(6);
    return $q->execute();
  }


  
}
