<?php

class CategoryTable extends Doctrine_Table
{
  public function getCategories($has_yapa=false)
  {
    $conn = Doctrine_Manager::connection();

    $query = $conn->prepare("
      select c.id c_id, c.name  c_name,q.id q_id, q.name q_name
      from category c
      inner join deal d on d.category_id = c.id 
      inner join quarter q on d.quarter_id = q.id
      where d.starts_at < :starts_at
        and d.ends_at > :ends_at
        and d.is_oferton = :is_oferton
        and d.has_yapa = :has_yapa
      group by q.id
      order by c.name, q.name
    ");
    $now = date('Y-m-d H:i:s', time());
    $query->execute(array(
        'starts_at' => $now, 
        'ends_at' => $now, 
        'is_oferton' => false,
        'has_yapa' => ($has_yapa ? true : 'not null'),
      ));
    $result = $query->fetchAll(Doctrine_Core::FETCH_ASSOC);

    

    //my horrible array based hidration method    
    $categories = array();
    foreach($result as $row){
      if(!isset($categories[$row['c_id']])){
        $categories[$row['c_id']] = array(
          'id' => $row['c_id'],
          'name' => $row['c_name'],
          'quarters' => array()
        );
      }

      $categories[$row['c_id']]['quarters'][$row['q_id']] = array(
        'id' => $row['q_id'],
        'name' => $row['q_name'],
      );
    }

    return $categories;
  }


}
