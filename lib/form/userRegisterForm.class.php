<?php

class userRegisterForm extends sfGuardRegisterForm
{
  public function configure()
  {

    unset($this['username']);

    $this->validatorSchema['email_address'] = new sfValidatorAnd(array(
      $this->validatorSchema['email_address'],
      new sfValidatorEmail(),
    ));

    $this->validatorSchema['email_address']->setMessage('required', 'Requerido');
    $this->validatorSchema['email_address']->setMessage('invalid', 'Email Invalido');
    $this->validatorSchema['password']->setMessage('required', 'Requerido');
    $this->getWidgetSchema()->setLabels(array(
      'first_name' => 'Nombre',
      'last_name' => 'Apellido',
      'email_address' => 'Email',
      'password' => 'Contraseña',
      'password_again' => 'Confirmar Contraseña'
    ));


    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'sfGuardUser', 'column' => array('email_address')),array('invalid' => 'Ya existe un usuario con ese email.'))
    );
    $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Las contraseñas deben ser iguales.')));



    $oDecorator = new fWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
    $this->getWidgetSchema()->setFormFormatterName('div');
    
  }  
}
