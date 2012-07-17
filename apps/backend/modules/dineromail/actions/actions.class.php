<?php

/**
 * dineromail actions.
 *
 * @package    mendozaoferta
 * @subpackage dineromail
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dineromailActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executePays(sfWebRequest $request)
  {

    $parameters = array(
    );
    $parameters = array_merge(sfConfig::get('app_dineromail_ipn_params'),$parameters);
    $url = sfConfig::get('app_dineromail_ipn_url').'?'.http_build_query($parameters);
    
    $xmlstr = file_get_contents($url);
    $xml = simplexml_load_string($xmlstr);
    $this->pays = $xml->Pays[0];


  
  }
}
