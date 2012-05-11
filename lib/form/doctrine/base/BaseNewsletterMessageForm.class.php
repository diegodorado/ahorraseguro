<?php

/**
 * NewsletterMessage form base class.
 *
 * @method NewsletterMessage getObject() Returns the current form's model object
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsletterMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'from_email'       => new sfWidgetFormInputText(),
      'from_name'        => new sfWidgetFormInputText(),
      'subject'          => new sfWidgetFormInputText(),
      'body'             => new sfWidgetFormTextarea(),
      'limit_i'          => new sfWidgetFormInputText(),
      'offset_i'         => new sfWidgetFormInputText(),
      'recipients_count' => new sfWidgetFormInputText(),
      'sent_count'       => new sfWidgetFormInputText(),
      'is_active'        => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'from_email'       => new sfValidatorString(array('max_length' => 255)),
      'from_name'        => new sfValidatorString(array('max_length' => 255)),
      'subject'          => new sfValidatorString(array('max_length' => 255)),
      'body'             => new sfValidatorString(array('max_length' => 4000)),
      'limit_i'          => new sfValidatorInteger(),
      'offset_i'         => new sfValidatorInteger(),
      'recipients_count' => new sfValidatorInteger(),
      'sent_count'       => new sfValidatorInteger(),
      'is_active'        => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('newsletter_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsletterMessage';
  }

}
