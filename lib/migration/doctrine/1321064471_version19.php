<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version19 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('newsletter_email', 'is_active', 'boolean', '25', array(
             'default' => '1',
             ));
    }

    public function down()
    {

    }
}