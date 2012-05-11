<?php

class userChangePasswordForm extends sfGuardChangeUserPasswordForm
{
  public function configure()
  {
    
    $this->getWidgetSchema()->setLabels(array(
      'password' => 'Contraseña',
      'password_again' => 'Confirmar Contraseña'
    ));

    $oDecorator = new fWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
    $this->getWidgetSchema()->setFormFormatterName('div');
    
  }  
}

