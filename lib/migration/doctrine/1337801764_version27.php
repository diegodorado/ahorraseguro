<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version27 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('quarter', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'unique' => '1',
              'length' => '255',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->addColumn('store', 'quarter_id', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->dropTable('quarter');
        $this->removeColumn('store', 'quarter_id');
    }
}