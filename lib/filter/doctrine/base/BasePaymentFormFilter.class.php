<?php

/**
 * Payment filter form base class.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePaymentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'status'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deal_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Deal'), 'add_empty' => true)),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'quantity'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'offer'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'real_value'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'saved'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code'            => new sfWidgetFormFilterInput(),
      'dm_bought_on'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dm_id'           => new sfWidgetFormFilterInput(),
      'dm_amount'       => new sfWidgetFormFilterInput(),
      'dm_net_amount'   => new sfWidgetFormFilterInput(),
      'dm_method'       => new sfWidgetFormFilterInput(),
      'dm_medium'       => new sfWidgetFormFilterInput(),
      'dm_installments' => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'status'          => new sfValidatorPass(array('required' => false)),
      'deal_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Deal'), 'column' => 'id')),
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'quantity'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'offer'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'real_value'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'saved'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dm_bought_on'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'dm_id'           => new sfValidatorPass(array('required' => false)),
      'dm_amount'       => new sfValidatorPass(array('required' => false)),
      'dm_net_amount'   => new sfValidatorPass(array('required' => false)),
      'dm_method'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dm_medium'       => new sfValidatorPass(array('required' => false)),
      'dm_installments' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('payment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Payment';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'status'          => 'Text',
      'deal_id'         => 'ForeignKey',
      'user_id'         => 'ForeignKey',
      'quantity'        => 'Number',
      'price'           => 'Number',
      'offer'           => 'Number',
      'real_value'      => 'Number',
      'saved'           => 'Number',
      'code'            => 'Number',
      'dm_bought_on'    => 'Date',
      'dm_id'           => 'Text',
      'dm_amount'       => 'Text',
      'dm_net_amount'   => 'Text',
      'dm_method'       => 'Number',
      'dm_medium'       => 'Text',
      'dm_installments' => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
