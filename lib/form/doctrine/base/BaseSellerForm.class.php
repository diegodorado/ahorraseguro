<?php

/**
 * Seller form base class.
 *
 * @method Seller getObject() Returns the current form's model object
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSellerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'cel_phone'  => new sfWidgetFormInputText(),
      'address'    => new sfWidgetFormInputText(),
      'percent'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 255)),
      'last_name'  => new sfValidatorString(array('max_length' => 255)),
      'phone'      => new sfValidatorString(array('max_length' => 255)),
      'cel_phone'  => new sfValidatorString(array('max_length' => 255)),
      'address'    => new sfValidatorString(array('max_length' => 255)),
      'percent'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('seller[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seller';
  }

}
