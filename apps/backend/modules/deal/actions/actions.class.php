<?php

require_once dirname(__FILE__).'/../lib/dealGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/dealGeneratorHelper.class.php';

/**
 * deal actions.
 *
 * @package    mendozaoferta
 * @subpackage deal
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dealActions extends autoDealActions
{
  public function executePayments(sfWebRequest $request) {

    $deal = Doctrine_Core::getTable('Deal')->getDeal($request->getParameter('id'));
    $payments = Doctrine_Core::getTable('Payment')->getDealPayments($request->getParameter('id'));
    $csv = '"Usuario"'."\t".'"Email"'."\t".'"Cantidad"'."\t".'"Codigo"'."\t".'"Fecha y Hora"'."\n";
    foreach($payments as $p){
      $csv .= sprintf('"%s"'."\t".'"%s"'."\t".'"%s"'."\t".'"%s"'."\t".'"%s"'."\n",$p->getUser(),$p->getUser()->getEmail(),$p->getQuantity(),$p->getCode(),$p->getDateTimeObject('updated_at')->format('d/m/Y  H:i \h\s'));
    }
    $csv =  chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
	  $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->setHttpHeader('Content-Type', 'application/vnd.ms-excel');	
	  $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment;filename='.$deal->getTitle().'.csv');
	  $this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary');
	  return $this->renderText($csv);

    
  }
  


  public function executePreview(sfWebRequest $request) {
    $deal_id = $request->getParameter('id');
    $this->getUser()->setFlash('notice', 'Estas previsualizando una oferta.');
    $this->redirect('/oferta/'.$deal_id);
  }
  

  

  public function executeJson(sfWebRequest $request)
  {
	  if($request->isXmlHttpRequest()){
      $this->getResponse()->setHttpHeader('Content-type','application/json');
 		  $this->setLayout(false);

      $store = Doctrine_Core::getTable('Store')->find($request->getParameter('store_id'));
      $result = array('quarter_id'=>$store->getQuarterId());
  	  return $this->renderText(json_encode($result));
		
	  }
  }
  
}
