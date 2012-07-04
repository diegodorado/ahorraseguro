<?php

class mailsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  
    $this->big_deals = Doctrine_Core::getTable('Deal')->getTodayBigDeals();
    $this->deals = Doctrine_Core::getTable('Deal')->getTodayDeals();
    $this->setLayout(false);
  }
 
  public function executeCoupon(sfWebRequest $request)
  {
  
    $this->payment = Doctrine_Core::getTable('Payment')->getPayment(56);
    $this->setLayout(false);
  }

}
