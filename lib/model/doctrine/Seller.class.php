<?php

/**
 * Seller
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
class Seller extends BaseSeller
{

  function __toString() {
    return sprintf("%s %s",$this->getFirstName(),$this->getLastName());
  } 

}