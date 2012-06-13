<?php

class myUser extends sfGuardSecurityUser
{

  public function clearPayment()
  {
    $this->getAttributeHolder()->remove('payment');
  }

  public function setPayment($id)
  {
    $this->setAttribute('payment',$id);
  }

  public function getPayment()
  {
    return $this->getAttribute('payment');
  }

  public function isFirstVisit()
  {
    $visited = $this->hasAttribute('visited');
    if (!$visited) {
      $this->setAttribute('visited',true);
    }
    return !$visited;
  }


  public function hasPrinted($printed = null)
  {
    $today = strtotime(date('Y-m-d'));
    if($printed){
      $this->setAttribute('has_printed',true);
      $this->setAttribute('last_printed', $today);
    }else{
      $last_printed = $this->getAttribute('last_printed');
      if ($last_printed && $last_printed<$today){
        $this->getAttributeHolder()->remove('payment');
      }
    }
    return $this->getAttribute('has_printed', false);
  }



}
