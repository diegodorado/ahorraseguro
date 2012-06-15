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


  function toArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);
        
        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = toArray($value);
        }

        return $array;
    }
      
  public function executePays(sfWebRequest $request)
  {
  


    $b = new sfWebBrowser();
    //$b->get(XML_SOURCE_URL);
    //$xmlstr = $b->getResponseText();
    //$xml = new SimpleXMLElement($xmlstr);    

die;



$url = 'http://argentina.dineromail.com/Vender/Consulta_IPN.asp';
$data = 'DATA=<REPORTE><NROCTA>00000000</NROCTA><DETALLE><CONSULTA><CLAVE>clave</CLAVE><TIPO>1</TIPO><OPERACIONES><ID>id_operacion</ID></OPERACIONES></CONSULTA></DETALLE></REPORTE>';


// parsea URL
$url = parse_url($url);

// obtiene host y path
$host = $url['host'];
$path = $url['path'];

// abre conexion en puerto 80
$fp = fsockopen($host, 80);

// request
fputs($fp, "POST $path HTTP/1.1\r\n");
fputs($fp, "Host: $host\r\n");
//fputs($fp, "Referer: $referer\r\n");
fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
fputs($fp, "Content-length: ". strlen($data) ."\r\n");
fputs($fp, "Connection: close\r\n\r\n");
fputs($fp, $data);

$result = ''; 
while(!feof($fp)) {
	// resultado del request
	$result .= fgets($fp, 128);
}

// cierra conexion
fclose($fp);

print_r($result);
// separa el header del content
$result = explode("\r\n\r\n", $result, 2);

$header = isset($result[0]) ? $result[0] : '';
$content = isset($result[1]) ? $result[1] : '';

// imprime el content del resultado del request
print $content;
die;



    $parameters = array(
    );
    $parameters = array_merge(sfConfig::get('app_dineromail_ipn_params'),$parameters);
    $url = sfConfig::get('app_dineromail_ipn_url').'?'.http_build_query($parameters);
    
    $xmlstr = file_get_contents($url);
    $xml = simplexml_load_string($xmlstr);
    $this->pays = $xml->Pays[0];


    
    
    //$this->redirect($url);
  
  }
}
