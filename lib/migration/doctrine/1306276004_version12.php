<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version12 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('payment', 'saved', 'integer', '8', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('payment', 'saved');
    }
}