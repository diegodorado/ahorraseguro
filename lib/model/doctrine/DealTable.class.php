<?php

class DealTable extends Doctrine_Table
{
  private static $random_type = 'D';
  private static $random_excluded_category_id = null;
  private static $random_left_ids = null;
  private static $random_right_ids = null;

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
    return 'Ofertas';
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
    //sfContext::getInstance()->getLogger()->debug( 'self::getRandomExcludedCategoryId().'.var_export(self::getRandomExcludedCategoryId(),true) );

    $q = Doctrine_Query::create()
      ->select('d.id, RANDOM() AS rand')
      ->from('Deal d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.is_oferton = ?', false)
      ->orderby('rand')
      ->limit(35);
    if(self::getRandomExcludedCategoryId()){
      $q->andWhere('d.category_id <> ?', self::getRandomExcludedCategoryId());
    }
    self::$random_left_ids = array();
    self::$random_right_ids = array();
    $i=1;
    $results = $q->execute(array(),Doctrine_Core::HYDRATE_ARRAY);
    foreach($results as $r){
      if (($i%2)==0  || $i<2){
        self::$random_left_ids[]= $r['id'];
      }else{
        self::$random_right_ids[]= $r['id'];
      }
      $i++;
    }
  }
  
  public function getBigDeals()
  {
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.is_oferton = ?', true)
      ->orderBy('d.starts_at ASC');
    return $q->execute();
  }


  public function getDeals($category_id,$quarter_id,$yapa)
  {
    $q = $this->createQuery('d')
      ->where('d.starts_at < ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.ends_at > ?', date('Y-m-d H:i:s', time()))
      ->andWhere('d.is_oferton = ?', false)
      ->orderBy('d.starts_at ASC');

    if($category_id){
      $q->andWhere('d.category_id = ?', $category_id);
    }
    if($quarter_id){
      $q->andWhere('d.quarter_id = ?', $quarter_id);
    }
    if($yapa){
      $q->andWhere('d.has_yapa = ?', true);
    }

    return $q->execute();
  }



  public function getClosedDeals()
  {
    $q = $this->createQuery('d')
      ->andWhere('d.ends_at < ?', date('Y-m-d H:i:s', time()))
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



  public function getDeal($id)
  {
    $q = $this->createQuery('d')
      ->where('d.id = ?', $id);
    return $q->fetchOne();
  }  

  public function getTodayBigDeals()
  {
    $q = $this->createQuery('d')
      ->where('d.starts_at >= ?', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") , date("d")+1, date("Y"))))
      ->andWhere('d.starts_at < ?', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") , date("d")+2, date("Y"))))
      ->andWhere('d.is_oferton = ?', true)
      ->limit(14);
    return $q->execute();
  }

  public function getTodayDeals()
  {
    $q = $this->createQuery('d')
      ->where('d.ends_at > ?', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") , date("d")+1, date("Y"))))
      ->andWhere('d.is_oferton = ?', false)
      ->limit(17)
      ->orderBy('RAND()');
    return $q->execute();

  }



  
}
