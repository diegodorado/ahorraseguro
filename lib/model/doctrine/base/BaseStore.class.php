<?php

/**
 * BaseStore
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $trading_name
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $phone
 * @property string $quarter
 * @property integer $quarter_id
 * @property string $email
 * @property string $web
 * @property string $salesman_and_position
 * @property string $cuit
 * @property enum $condicion_iva
 * @property string $bank
 * @property string $bank_account
 * @property string $bank_cbu
 * @property Quarter $Quarter
 * @property Doctrine_Collection $Deal
 * 
 * @method string              getName()                  Returns the current record's "name" value
 * @method string              getTradingName()           Returns the current record's "trading_name" value
 * @method string              getAddress()               Returns the current record's "address" value
 * @method string              getCity()                  Returns the current record's "city" value
 * @method string              getProvince()              Returns the current record's "province" value
 * @method string              getPhone()                 Returns the current record's "phone" value
 * @method string              getQuarter()               Returns the current record's "quarter" value
 * @method integer             getQuarterId()             Returns the current record's "quarter_id" value
 * @method string              getEmail()                 Returns the current record's "email" value
 * @method string              getWeb()                   Returns the current record's "web" value
 * @method string              getSalesmanAndPosition()   Returns the current record's "salesman_and_position" value
 * @method string              getCuit()                  Returns the current record's "cuit" value
 * @method enum                getCondicionIva()          Returns the current record's "condicion_iva" value
 * @method string              getBank()                  Returns the current record's "bank" value
 * @method string              getBankAccount()           Returns the current record's "bank_account" value
 * @method string              getBankCbu()               Returns the current record's "bank_cbu" value
 * @method Quarter             getQuarter()               Returns the current record's "Quarter" value
 * @method Doctrine_Collection getDeal()                  Returns the current record's "Deal" collection
 * @method Store               setName()                  Sets the current record's "name" value
 * @method Store               setTradingName()           Sets the current record's "trading_name" value
 * @method Store               setAddress()               Sets the current record's "address" value
 * @method Store               setCity()                  Sets the current record's "city" value
 * @method Store               setProvince()              Sets the current record's "province" value
 * @method Store               setPhone()                 Sets the current record's "phone" value
 * @method Store               setQuarter()               Sets the current record's "quarter" value
 * @method Store               setQuarterId()             Sets the current record's "quarter_id" value
 * @method Store               setEmail()                 Sets the current record's "email" value
 * @method Store               setWeb()                   Sets the current record's "web" value
 * @method Store               setSalesmanAndPosition()   Sets the current record's "salesman_and_position" value
 * @method Store               setCuit()                  Sets the current record's "cuit" value
 * @method Store               setCondicionIva()          Sets the current record's "condicion_iva" value
 * @method Store               setBank()                  Sets the current record's "bank" value
 * @method Store               setBankAccount()           Sets the current record's "bank_account" value
 * @method Store               setBankCbu()               Sets the current record's "bank_cbu" value
 * @method Store               setQuarter()               Sets the current record's "Quarter" value
 * @method Store               setDeal()                  Sets the current record's "Deal" collection
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseStore extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('store');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('trading_name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('province', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('quarter', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('quarter_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('web', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('salesman_and_position', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('cuit', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('condicion_iva', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'RI',
              1 => 'Exento',
              2 => 'Monotributista',
             ),
             ));
        $this->hasColumn('bank', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('bank_account', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('bank_cbu', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Quarter', array(
             'local' => 'quarter_id',
             'foreign' => 'id'));

        $this->hasMany('Deal', array(
             'local' => 'id',
             'foreign' => 'store_id'));
    }
}