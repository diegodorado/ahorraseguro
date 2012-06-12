<?php

class PaymentTable extends Doctrine_Table
{
  public static $statuses = array(
    'C' => 'Completado',
    'P' => 'Pendiente',
    'E' => 'Error',
  );
  
  public function getPayment($id)
  {
    $q = $this->createQuery('p')
      ->where('p.id = ?', $id);
    return $q->fetchOne();
  }

  public function getUserPayments($user_id)
  {
    $q = $this->createQuery('p')
      //->where('p.status = ?', 'C')
      ->andWhere('p.user_id = ?', $user_id)
      ->orderby('p.updated_at desc');
    return $q->execute();
  }

  public function getDealPayments($deal_id)
  {
    $q = $this->createQuery('p')
      ->where('p.status = ?', 'C')
      ->andWhere('p.deal_id = ?', $deal_id)
      ->orderby('p.updated_at desc');
    return $q->execute();
  }

}
