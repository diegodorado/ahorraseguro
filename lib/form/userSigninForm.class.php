<?php

class userSigninForm extends sfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {

    $this->getWidgetSchema()->setLabels(array(
      'username' => 'Email',
      'password' => 'Contraseña',
      'remember' => 'Recordar'
    ));

    $this->validatorSchema['username']->setMessage('required', 'Requerido');
    $this->validatorSchema['username']->setMessage('invalid', 'Usuario o password invalido');
    $this->validatorSchema['password']->setMessage('required', 'Requerido');

    
    $oDecorator = new fWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
    $this->getWidgetSchema()->setFormFormatterName('div');
      
  }
}
