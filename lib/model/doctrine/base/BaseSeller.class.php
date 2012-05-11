<?php

/**
 * BaseSeller
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $cel_phone
 * @property string $address
 * @property integer $percent
 * @property Doctrine_Collection $Deal
 * 
 * @method string              getFirstName()  Returns the current record's "first_name" value
 * @method string              getLastName()   Returns the current record's "last_name" value
 * @method string              getPhone()      Returns the current record's "phone" value
 * @method string              getCelPhone()   Returns the current record's "cel_phone" value
 * @method string              getAddress()    Returns the current record's "address" value
 * @method integer             getPercent()    Returns the current record's "percent" value
 * @method Doctrine_Collection getDeal()       Returns the current record's "Deal" collection
 * @method Seller              setFirstName()  Sets the current record's "first_name" value
 * @method Seller              setLastName()   Sets the current record's "last_name" value
 * @method Seller              setPhone()      Sets the current record's "phone" value
 * @method Seller              setCelPhone()   Sets the current record's "cel_phone" value
 * @method Seller              setAddress()    Sets the current record's "address" value
 * @method Seller              setPercent()    Sets the current record's "percent" value
 * @method Seller              setDeal()       Sets the current record's "Deal" collection
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseSeller extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('seller');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('cel_phone', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('percent', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Deal', array(
             'local' => 'id',
             'foreign' => 'seller_id'));
    }
}