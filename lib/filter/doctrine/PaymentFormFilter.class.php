<?php

/**
 * Payment filter form.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaymentFormFilter extends BasePaymentFormFilter
{
  public function configure()
  {
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices'=>array_merge(array(''=>''),PaymentTable::$statuses)));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
                    'required' => false,
      'choices' => array_keys(PaymentTable::$statuses),
    ));

    $this->getWidgetSchema()->setLabels(array(
      'status' => 'Estado',
      'deal_id' => 'Oferta',
      'user_id' => 'Usuario'
    ));

  }


  protected function addStatusColumnQuery(Doctrine_Query $query, $field, $value)
  {
    $fieldName = $this->getFieldName($field);
    $query->addWhere(sprintf("%s.%s = '%s'", $query->getRootAlias(), $fieldName, $value));
  }

}
