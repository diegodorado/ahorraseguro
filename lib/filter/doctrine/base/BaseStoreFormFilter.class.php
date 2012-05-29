<?php

/**
 * Store filter form base class.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStoreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trading_name'          => new sfWidgetFormFilterInput(),
      'address'               => new sfWidgetFormFilterInput(),
      'city'                  => new sfWidgetFormFilterInput(),
      'province'              => new sfWidgetFormFilterInput(),
      'phone'                 => new sfWidgetFormFilterInput(),
      'quarter_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quarter'), 'add_empty' => true)),
      'email'                 => new sfWidgetFormFilterInput(),
      'web'                   => new sfWidgetFormFilterInput(),
      'salesman_and_position' => new sfWidgetFormFilterInput(),
      'cuit'                  => new sfWidgetFormFilterInput(),
      'condicion_iva'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'RI' => 'RI', 'Exento' => 'Exento', 'Monotributista' => 'Monotributista'))),
      'bank'                  => new sfWidgetFormFilterInput(),
      'bank_account'          => new sfWidgetFormFilterInput(),
      'bank_cbu'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorPass(array('required' => false)),
      'trading_name'          => new sfValidatorPass(array('required' => false)),
      'address'               => new sfValidatorPass(array('required' => false)),
      'city'                  => new sfValidatorPass(array('required' => false)),
      'province'              => new sfValidatorPass(array('required' => false)),
      'phone'                 => new sfValidatorPass(array('required' => false)),
      'quarter_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quarter'), 'column' => 'id')),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'web'                   => new sfValidatorPass(array('required' => false)),
      'salesman_and_position' => new sfValidatorPass(array('required' => false)),
      'cuit'                  => new sfValidatorPass(array('required' => false)),
      'condicion_iva'         => new sfValidatorChoice(array('required' => false, 'choices' => array('RI' => 'RI', 'Exento' => 'Exento', 'Monotributista' => 'Monotributista'))),
      'bank'                  => new sfValidatorPass(array('required' => false)),
      'bank_account'          => new sfValidatorPass(array('required' => false)),
      'bank_cbu'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('store_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Store';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'name'                  => 'Text',
      'trading_name'          => 'Text',
      'address'               => 'Text',
      'city'                  => 'Text',
      'province'              => 'Text',
      'phone'                 => 'Text',
      'quarter_id'            => 'ForeignKey',
      'email'                 => 'Text',
      'web'                   => 'Text',
      'salesman_and_position' => 'Text',
      'cuit'                  => 'Text',
      'condicion_iva'         => 'Enum',
      'bank'                  => 'Text',
      'bank_account'          => 'Text',
      'bank_cbu'              => 'Text',
    );
  }
}
