<?php

/**
 * BasesfGuardForgotPassword
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $unique_key
 * @property timestamp $expires_at
 * @property sfGuardUser $User
 * 
 * @method integer               getUserId()     Returns the current record's "user_id" value
 * @method string                getUniqueKey()  Returns the current record's "unique_key" value
 * @method timestamp             getExpiresAt()  Returns the current record's "expires_at" value
 * @method sfGuardUser           getUser()       Returns the current record's "User" value
 * @method sfGuardForgotPassword setUserId()     Sets the current record's "user_id" value
 * @method sfGuardForgotPassword setUniqueKey()  Sets the current record's "unique_key" value
 * @method sfGuardForgotPassword setExpiresAt()  Sets the current record's "expires_at" value
 * @method sfGuardForgotPassword setUser()       Sets the current record's "User" value
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BasesfGuardForgotPassword extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_forgot_password');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('unique_key', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('expires_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}