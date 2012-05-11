<?php

class ContactoForm extends BaseForm
{
  public function configure() {
    
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'comentario' => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('contacto[%s]');

    $this->setValidators(array(
      'nombre' => new sfValidatorString(array(), array(
                       'required' => ('Olvidaste ingresar tu nombre'))),
      'email'     => new sfValidatorEmail(array(), array(
                       'required' => ('Debes ingresar tu email'),
                       'invalid'  => ('Debes ingresar un email válido'))),
      'comentario' => new sfValidatorString(array(), array(
                       'required' => ('Olvidaste ingresar la consulta'))),
    ));

    $oDecorator = new fWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
    $this->getWidgetSchema()->setFormFormatterName('div');

  }
}
