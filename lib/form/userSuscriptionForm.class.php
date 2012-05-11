<?php

class userSuscriptionForm extends NewsletterEmailForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email' => new sfWidgetFormInputText(array(), array('placeholder'=>'Ingresa tu email')),
      'is_active' => new sfWIdgetFormInputHidden
    ));
    $this->widgetSchema->setLabels(array(
      'email' => 'Recibe nuestras ofertas: ',
    ));

    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));

    $this->validatorSchema['email']->setMessage('required', 'No ingresaste ningun e-mail.');
    $this->validatorSchema['email']->setMessage('invalid', 'Por favor ingresa una dirección de mail válida: xxx@yyy.zzz.');

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'NewsletterEmail', 'column' => array('email')),array('invalid' => 'Ese email ya está registrado.'))
    );
        
    $this->widgetSchema->setNameFormat('newsletter_email[%s]');  
  }
  
}
