<?php

class mailsActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->deals = Doctrine_Core::getTable('Deal')->getTodayDeals();
    $this->descuentos = Doctrine_Core::getTable('Deal')->getRandomDescuentos();

    
    
  }
 
}
