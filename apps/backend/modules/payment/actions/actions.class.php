<?php

require_once dirname(__FILE__).'/../lib/paymentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/paymentGeneratorHelper.class.php';

/**
 * payment actions.
 *
 * @package    mendozaoferta
 * @subpackage payment
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends autoPaymentActions
{

  public function executeCheck(sfWebRequest $request) {
    $payment = Doctrine_Core::getTable('Payment')->find($request->getParameter('id'));
    if($payment->check_status()){
      $flash = 'notice';
    }else{
      $flash = 'error';
    }
    $this->getUser()->setFlash($flash, sprintf('El estado del pago %s es: %s',$payment->getId(),$payment->friendly_status()));
    $this->redirect('@payment');
  }


  public function executeReport(sfWebRequest $request) {

    $conn = Doctrine_Manager::connection();

    $q = Doctrine_Query::create()
      ->select("
        payment.*,
        CONCAT(user.first_name,' ',user.last_name),
        CONCAT(seller.first_name,' ',seller.last_name),
        seller.percent,
        category.name,
        store.name,
        store.trading_name,
        store.city,
        store.province,
        quarter.name,
        deal.id,
        deal.is_oferton,
        deal.has_yapa,
        deal.starts_at,
        deal.ends_at,
        deal.bought_count,
        deal.visited_count,
        deal.printed_count,
        deal.commission,
        deal.offer,
        deal.published_value,
        deal.real_value,
        deal.newsletter_title,
        deal.max_per_buy,
        deal.max_deals,
        deal.created_at,
        deal.updated_at
        ")
      ->from('Payment payment')
      ->innerJoin('payment.Deal deal')
      ->innerJoin('payment.User user')
      ->leftJoin('deal.Category category')
      ->innerJoin('deal.Store store')
      ->innerJoin('deal.Seller seller')
      ->innerJoin('deal.Quarter quarter')
      ;


    $query = $conn->prepare($q->getSqlQuery());
    $query->execute(array());
    $r = $query->fetchAll(Doctrine_Core::FETCH_ASSOC);

  
    $arr = array();
    $arr[] = array_keys($r[0]); //hold field labels
    foreach ($r as $k => $v) {
      foreach ($v as $k2 => $v2) {
        //set null to empty string
        if(is_null($v2)){
          $v[$k2] = '';
        }
      }
      $arr[] = array_values($v);
    }

    $this->json = json_encode($arr);

  }



}
