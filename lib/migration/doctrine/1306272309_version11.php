<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version11 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('payment', 'payment_user_id_sf_guard_user_id', array(
             'name' => 'payment_user_id_sf_guard_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('payment', 'payment_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('payment', 'payment_user_id_sf_guard_user_id');
        $this->removeIndex('payment', 'payment_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}