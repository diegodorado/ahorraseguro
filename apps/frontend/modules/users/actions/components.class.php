<?php


class usersComponents extends sfComponents
{
  public function executeLogin()
  {
    $this->loggedIn = $this->getUser()->isAuthenticated();
    if (!$this->loggedIn)
    {
      $class = sfConfig::get('app_sf_guard_plugin_signin_form', 
        'sfGuardFormSignin');
      $this->form = new $class();
    }
  }

  public function executeMenu()
  {
    $this->loggedIn = $this->getUser()->isAuthenticated();
    if (!$this->loggedIn)
    {
      $this->form = new userSuscriptionForm;
    }
  }


  public function executeStats()
  {
    $q = Doctrine_Query::create()
      ->select('count(*) as deals_count,sum(saved) as saved_total')
      ->from('payment')
      ->andWhere('status=?','C');
    $r = $q->execute(array(),Doctrine_Core::HYDRATE_ARRAY);
    if ($r)
    {
      $this->deals_count = $r[0]['deals_count'];
      $this->saved_total = $r[0]['saved_total'];
    }else{
      $this->deals_count = 0;
      $this->saved_total = 0;
    }
  }
  
}
