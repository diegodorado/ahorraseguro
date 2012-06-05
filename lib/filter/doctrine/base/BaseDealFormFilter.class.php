<?php

/**
 * Deal filter form base class.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDealFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_oferton'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'has_yapa'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'seller_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Seller'), 'add_empty' => true)),
      'store_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'add_empty' => true)),
      'quarter_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quarter'), 'add_empty' => true)),
      'starts_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'ends_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'bought_count'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'visited_count'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'printed_count'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'commission'       => new sfWidgetFormFilterInput(),
      'offer'            => new sfWidgetFormFilterInput(),
      'published_value'  => new sfWidgetFormFilterInput(),
      'real_value'       => new sfWidgetFormFilterInput(),
      'image'            => new sfWidgetFormFilterInput(),
      'title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'newsletter_title' => new sfWidgetFormFilterInput(),
      'featured'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'conditions'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'max_per_buy'      => new sfWidgetFormFilterInput(),
      'max_deals'        => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_oferton'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'has_yapa'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'category_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'seller_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Seller'), 'column' => 'id')),
      'store_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Store'), 'column' => 'id')),
      'quarter_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quarter'), 'column' => 'id')),
      'starts_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'ends_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'bought_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visited_count'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'printed_count'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'commission'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'offer'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'published_value'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'real_value'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'image'            => new sfValidatorPass(array('required' => false)),
      'title'            => new sfValidatorPass(array('required' => false)),
      'newsletter_title' => new sfValidatorPass(array('required' => false)),
      'featured'         => new sfValidatorPass(array('required' => false)),
      'conditions'       => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'max_per_buy'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_deals'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('deal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Deal';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'is_oferton'       => 'Boolean',
      'has_yapa'         => 'Boolean',
      'category_id'      => 'ForeignKey',
      'seller_id'        => 'ForeignKey',
      'store_id'         => 'ForeignKey',
      'quarter_id'       => 'ForeignKey',
      'starts_at'        => 'Date',
      'ends_at'          => 'Date',
      'bought_count'     => 'Number',
      'visited_count'    => 'Number',
      'printed_count'    => 'Number',
      'commission'       => 'Number',
      'offer'            => 'Number',
      'published_value'  => 'Number',
      'real_value'       => 'Number',
      'image'            => 'Text',
      'title'            => 'Text',
      'newsletter_title' => 'Text',
      'featured'         => 'Text',
      'conditions'       => 'Text',
      'description'      => 'Text',
      'max_per_buy'      => 'Number',
      'max_deals'        => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
