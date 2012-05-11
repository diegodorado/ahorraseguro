<?php

/**
 * newsletter_message module configuration.
 *
 * @package    mendozaoferta
 * @subpackage newsletter_message
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletter_messageGeneratorConfiguration extends BaseNewsletter_messageGeneratorConfiguration
{
  public function getFilterDefaults() {
    return array('is_active' => 1);
  }

}
