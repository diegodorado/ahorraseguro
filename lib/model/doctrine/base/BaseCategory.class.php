<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Deal
 * 
 * @method string              getName() Returns the current record's "name" value
 * @method Doctrine_Collection getDeal() Returns the current record's "Deal" collection
 * @method Category            setName() Sets the current record's "name" value
 * @method Category            setDeal() Sets the current record's "Deal" collection
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Deal', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}