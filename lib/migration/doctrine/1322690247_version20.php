<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version20 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('deal', 'newsletter_title', 'string', '50', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('deal', 'newsletter_title');
    }
}