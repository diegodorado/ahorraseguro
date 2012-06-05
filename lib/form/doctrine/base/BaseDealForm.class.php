<?php

/**
 * Deal form base class.
 *
 * @method Deal getObject() Returns the current form's model object
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDealForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'is_oferton'       => new sfWidgetFormInputCheckbox(),
      'has_yapa'         => new sfWidgetFormInputCheckbox(),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'seller_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Seller'), 'add_empty' => true)),
      'store_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'add_empty' => true)),
      'quarter_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quarter'), 'add_empty' => true)),
      'starts_at'        => new sfWidgetFormDateTime(),
      'ends_at'          => new sfWidgetFormDateTime(),
      'bought_count'     => new sfWidgetFormInputText(),
      'visited_count'    => new sfWidgetFormInputText(),
      'printed_count'    => new sfWidgetFormInputText(),
      'commission'       => new sfWidgetFormInputText(),
      'offer'            => new sfWidgetFormInputText(),
      'published_value'  => new sfWidgetFormInputText(),
      'real_value'       => new sfWidgetFormInputText(),
      'image'            => new sfWidgetFormInputText(),
      'title'            => new sfWidgetFormInputText(),
      'newsletter_title' => new sfWidgetFormInputText(),
      'featured'         => new sfWidgetFormTextarea(),
      'conditions'       => new sfWidgetFormTextarea(),
      'description'      => new sfWidgetFormTextarea(),
      'max_per_buy'      => new sfWidgetFormInputText(),
      'max_deals'        => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'is_oferton'       => new sfValidatorBoolean(array('required' => false)),
      'has_yapa'         => new sfValidatorBoolean(array('required' => false)),
      'category_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      'seller_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Seller'), 'required' => false)),
      'store_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'required' => false)),
      'quarter_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Quarter'), 'required' => false)),
      'starts_at'        => new sfValidatorDateTime(),
      'ends_at'          => new sfValidatorDateTime(),
      'bought_count'     => new sfValidatorInteger(),
      'visited_count'    => new sfValidatorInteger(),
      'printed_count'    => new sfValidatorInteger(),
      'commission'       => new sfValidatorInteger(array('required' => false)),
      'offer'            => new sfValidatorInteger(array('required' => false)),
      'published_value'  => new sfValidatorInteger(array('required' => false)),
      'real_value'       => new sfValidatorInteger(array('required' => false)),
      'image'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 255)),
      'newsletter_title' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'featured'         => new sfValidatorString(array('max_length' => 4000)),
      'conditions'       => new sfValidatorString(array('max_length' => 4000)),
      'description'      => new sfValidatorString(array('max_length' => 4000)),
      'max_per_buy'      => new sfValidatorInteger(array('required' => false)),
      'max_deals'        => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('deal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Deal';
  }

}
