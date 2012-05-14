<?php

/**
 * BaseNewsletterMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $from_email
 * @property string $from_name
 * @property string $subject
 * @property string $body
 * @property integer $limit_i
 * @property integer $offset_i
 * @property integer $recipients_count
 * @property integer $sent_count
 * @property boolean $is_active
 * 
 * @method string            getFromEmail()        Returns the current record's "from_email" value
 * @method string            getFromName()         Returns the current record's "from_name" value
 * @method string            getSubject()          Returns the current record's "subject" value
 * @method string            getBody()             Returns the current record's "body" value
 * @method integer           getLimitI()           Returns the current record's "limit_i" value
 * @method integer           getOffsetI()          Returns the current record's "offset_i" value
 * @method integer           getRecipientsCount()  Returns the current record's "recipients_count" value
 * @method integer           getSentCount()        Returns the current record's "sent_count" value
 * @method boolean           getIsActive()         Returns the current record's "is_active" value
 * @method NewsletterMessage setFromEmail()        Sets the current record's "from_email" value
 * @method NewsletterMessage setFromName()         Sets the current record's "from_name" value
 * @method NewsletterMessage setSubject()          Sets the current record's "subject" value
 * @method NewsletterMessage setBody()             Sets the current record's "body" value
 * @method NewsletterMessage setLimitI()           Sets the current record's "limit_i" value
 * @method NewsletterMessage setOffsetI()          Sets the current record's "offset_i" value
 * @method NewsletterMessage setRecipientsCount()  Sets the current record's "recipients_count" value
 * @method NewsletterMessage setSentCount()        Sets the current record's "sent_count" value
 * @method NewsletterMessage setIsActive()         Sets the current record's "is_active" value
 * 
 * @package    mendozaoferta
 * @subpackage model
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseNewsletterMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('newsletter_message');
        $this->hasColumn('from_email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('from_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('subject', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('body', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '4000',
             ));
        $this->hasColumn('limit_i', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('offset_i', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('recipients_count', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('sent_count', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}