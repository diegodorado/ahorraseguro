<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfConfig::set('sf_jquery_web_dir', ''); 
    sfConfig::set('sf_jquery_core', 'jquery-1.5.1.min.js'); 
  }
}
