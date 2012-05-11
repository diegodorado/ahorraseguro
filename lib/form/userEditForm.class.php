<?php

class userEditForm extends sfGuardUserForm
{
  public function configure()
  {
    unset(
      $this['username'],
      $this['last_login'],
      $this['created_at'],
      $this['updated_at'],
      $this['salt'],
      $this['algorithm'],
      $this['is_active'],
      $this['is_super_admin'],
      $this['updated_at'],
      $this['groups_list'],
      $this['permissions_list'],
      $this['password']
    );
    

    $this->validatorSchema['email_address'] = new sfValidatorAnd(array(
      $this->validatorSchema['email_address'],
      new sfValidatorEmail(),
    ));

    $this->validatorSchema['email_address']->setMessage('required', 'Requerido');
    $this->validatorSchema['email_address']->setMessage('invalid', 'Email Invalido');
    
    $this->getWidgetSchema()->setLabels(array(
      'first_name' => 'Nombre',
      'last_name' => 'Apellido',
      'email_address' => 'Email',
    ));

    $oDecorator = new fWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
    $this->getWidgetSchema()->setFormFormatterName('div');
    
  }  
}

