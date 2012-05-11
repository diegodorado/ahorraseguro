<?php

/**
 * Payment form base class.
 *
 * @method Payment getObject() Returns the current form's model object
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePaymentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'status'     => new sfWidgetFormInputText(),
      'deal_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Deal'), 'add_empty' => false)),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'quantity'   => new sfWidgetFormInputText(),
      'price'      => new sfWidgetFormInputText(),
      'offer'      => new sfWidgetFormInputText(),
      'real_value' => new sfWidgetFormInputText(),
      'saved'      => new sfWidgetFormInputText(),
      'code'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 1)),
      'deal_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Deal'))),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'quantity'   => new sfValidatorInteger(),
      'price'      => new sfValidatorInteger(),
      'offer'      => new sfValidatorInteger(),
      'real_value' => new sfValidatorInteger(),
      'saved'      => new sfValidatorInteger(),
      'code'       => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('payment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Payment';
  }

}
