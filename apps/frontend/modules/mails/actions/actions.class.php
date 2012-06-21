<?php

class mailsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  
    $this->big_deals = Doctrine_Core::getTable('Deal')->getTodayBigDeals();
    $this->deals = Doctrine_Core::getTable('Deal')->getTodayDeals();
  }
 
}
