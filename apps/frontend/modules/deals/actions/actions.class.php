<?php

/**
 * deals actions.
 *
 * @package    mendozaoferta
 * @subpackage deals
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dealsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->isFirstVisit() && !$request->hasParameter('ref')){
      $this->redirect('@homepage?ref=logo');  
    }

    $this->ref = $request->getParameter('ref');
    $this->title = 'Ofertones de hoy';
    $this->deals = Doctrine_Core::getTable('Deal')->getBigDeals();  
  }

  public function executeDeals(sfWebRequest $request)
  {
     $this->ref = '';
     $category_id = $request->getParameter('category_id');
     $quarter_id = $request->getParameter('quarter_id');
     $yapa = !!$request->getParameter('yapa');
     if($category_id){
       $category = Doctrine_Core::getTable('Category')->find($category_id);
       $this->title = 'Ofertas de '.$category->getName();
       if($quarter_id){
         $quarter = Doctrine_Core::getTable('Quarter')->find($quarter_id);
         $this->title .= ' en '.$quarter->getName();
       }
     }else{
       $this->title = 'Todas las ofertas';
     }
     $this->deals = Doctrine_Core::getTable('Deal')->getDeals($category_id,$quarter_id,$yapa);
     $this->setTemplate('index');
  }


  public function executeClosed(sfWebRequest $request)
  {
     $this->deals = Doctrine_Core::getTable('Deal')->getClosedDeals();
  }

  public function executeShow(sfWebRequest $request)
  {
     $this->deal = Doctrine_Core::getTable('Deal')->getDeal($request->getParameter('id'));
     $this->deal->increaseVisited();
     if(!$this->deal->isOpen()){
      return 'Closed';
     }
  }


  public function executeCheckout(sfWebRequest $request)
  {
    $this->deal = Doctrine_Core::getTable('Deal')->find($request->getParameter('id'));
    if ($this->deal->getAvailable()===0){
      $this->getUser()->setFlash('error', 'No quedan unidades de esta oferta.');
      $this->redirect($this->generateUrl('deal', $this->deal));
    }
  }



  
}
