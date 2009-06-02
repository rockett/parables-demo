<?php

/**
 * BaseApplog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $lvl
 * @property string $msg
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5441 2009-01-30 22:58:43Z jwage $
 */
abstract class BaseApplog extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('applog');
        $this->hasColumn('lvl', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
        $this->hasColumn('msg', 'string', null, array('type' => 'string', 'notnull' => true));


        $this->setAttribute(Doctrine::ATTR_EXPORT, Doctrine::EXPORT_ALL);
        $this->setAttribute(Doctrine::ATTR_VALIDATE, true);
    }

    public function setUp()
    {
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}