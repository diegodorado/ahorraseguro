<?php

/**
 * Deal form.
 *
 * @package    mendozaoferta
 * @subpackage form
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DealForm extends BaseDealForm
{
  public function configure()
  {
  
    $this->widgetSchema['starts_at'] = new sfWidgetFormInputText;
    $this->widgetSchema['ends_at'] = new sfWidgetFormInputText;

    $this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width:630px'));
    $this->widgetSchema['seller'] = new sfWidgetFormInputText(array(), array('style' => 'width:630px'));
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'file_src'  => '/uploads/deals/'.$this->getObject()->getImage(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));
    $this->validatorSchema['image_delete'] = new sfValidatorPass();    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/deals',
      'mime_types' => 'web_images',
    ));
    $this->setDefaults(array(
      'bought_count' => 0,
      'visited_count' => 0,
      'printed_count' => 0
    ));

  
  }
}
