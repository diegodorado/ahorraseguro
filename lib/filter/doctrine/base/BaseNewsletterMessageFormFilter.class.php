<?php

/**
 * NewsletterMessage filter form base class.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseNewsletterMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'from_email'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'from_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subject'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'body'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'limit_i'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'offset_i'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recipients_count' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sent_count'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'from_email'       => new sfValidatorPass(array('required' => false)),
      'from_name'        => new sfValidatorPass(array('required' => false)),
      'subject'          => new sfValidatorPass(array('required' => false)),
      'body'             => new sfValidatorPass(array('required' => false)),
      'limit_i'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'offset_i'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'recipients_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sent_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('newsletter_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NewsletterMessage';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'from_email'       => 'Text',
      'from_name'        => 'Text',
      'subject'          => 'Text',
      'body'             => 'Text',
      'limit_i'          => 'Number',
      'offset_i'         => 'Number',
      'recipients_count' => 'Number',
      'sent_count'       => 'Number',
      'is_active'        => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
