<?php

/**
 * BaseEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property timestamp $opened
 * @property timestamp $closed
 * @property clob $notes
 * @property integer $worklog_id
 * @property Worklog $Worklog
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
abstract class BaseEntry extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('entry');
        $this->hasColumn('opened', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('closed', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('notes', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('worklog_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));


        $this->setAttribute(Doctrine::ATTR_EXPORT, Doctrine::EXPORT_ALL);
        $this->setAttribute(Doctrine::ATTR_VALIDATE, true);
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('Worklog', array(
             'local' => 'worklog_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));
    }
}