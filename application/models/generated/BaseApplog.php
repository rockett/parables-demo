<?php

/**
 * BaseApplog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $message
 * @property int $priority
 * @property string $priority_name
 * @property timestamp $timestamp
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
abstract class BaseApplog extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('applog');
        $this->hasColumn('message', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('priority', 'int', 1, array(
             'type' => 'int',
             'notnull' => true,
             'length' => '1',
             ));
        $this->hasColumn('priority_name', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '32',
             ));
        $this->hasColumn('timestamp', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));


        $this->setAttribute(Doctrine::ATTR_EXPORT, Doctrine::EXPORT_ALL);
        $this->setAttribute(Doctrine::ATTR_VALIDATE, true);
    }

    public function setUp()
    {
        parent::setUp();
    
    }
}