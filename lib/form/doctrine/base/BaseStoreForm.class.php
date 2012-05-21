<?php

/**
 * Store form base class.
 *
 * @method Store getObject() Returns the current form's model object
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStoreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'name'                  => new sfWidgetFormInputText(),
      'trading_name'          => new sfWidgetFormInputText(),
      'address'               => new sfWidgetFormInputText(),
      'city'                  => new sfWidgetFormInputText(),
      'province'              => new sfWidgetFormInputText(),
      'phone'                 => new sfWidgetFormInputText(),
      'quarter'               => new sfWidgetFormInputText(),
      'email'                 => new sfWidgetFormInputText(),
      'web'                   => new sfWidgetFormInputText(),
      'salesman_and_position' => new sfWidgetFormInputText(),
      'cuit'                  => new sfWidgetFormInputText(),
      'condicion_iva'         => new sfWidgetFormChoice(array('choices' => array('RI' => 'RI', 'Exento' => 'Exento', 'Monotributista' => 'Monotributista'))),
      'bank'                  => new sfWidgetFormInputText(),
      'bank_account'          => new sfWidgetFormInputText(),
      'bank_cbu'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'                  => new sfValidatorString(array('max_length' => 255)),
      'trading_name'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'province'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'quarter'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'web'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'salesman_and_position' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cuit'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'condicion_iva'         => new sfValidatorChoice(array('choices' => array(0 => 'RI', 1 => 'Exento', 2 => 'Monotributista'), 'required' => false)),
      'bank'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bank_account'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bank_cbu'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Store', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('store[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Store';
  }

}
