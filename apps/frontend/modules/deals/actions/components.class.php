<?php

class dealsComponents extends sfComponents
{
  public function executeCategoryList()
  {
     $this->categories = Doctrine_Core::getTable('Category')->getCategories($this->has_yapa);  
  }

  public function executeRandomLeftDeals()
  {
     $this->deals = Doctrine_Core::getTable('Deal')->getRandomLeftDeals();
  }

  public function executeRandomRightDeals()
  {
     $this->deals = Doctrine_Core::getTable('Deal')->getRandomRightDeals();
  }

  
}
