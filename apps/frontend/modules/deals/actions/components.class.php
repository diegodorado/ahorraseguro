<?php

class dealsComponents extends sfComponents
{
  public function executeDescuentosCategoryList()
  {
     $this->categories = Doctrine_Core::getTable('Category')->getDescuentosCategories();  
  }

  public function executePromocionesCategoryList()
  {
     $this->categories = Doctrine_Core::getTable('Category')->getPromocionesCategories();  
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
