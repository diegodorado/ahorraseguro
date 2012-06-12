<?php

/**
 * BaseNewsletterEmail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $email
 * @property boolean $is_active
 * @property boolean $is_original
 * 
 * @method string          getEmail()       Returns the current record's "email" value
 * @method boolean         getIsActive()    Returns the current record's "is_active" value
 * @method boolean         getIsOriginal()  Returns the current record's "is_original" value
 * @method NewsletterEmail setEmail()       Sets the current record's "email" value
 * @method NewsletterEmail setIsActive()    Sets the current record's "is_active" value
 * @method NewsletterEmail setIsOriginal()  Sets the current record's "is_original" value
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseNewsletterEmail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('newsletter_email');
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('is_original', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}