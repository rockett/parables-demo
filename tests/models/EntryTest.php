<?php
class EntryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $manager = Doctrine_Manager::getInstance();
        foreach ($manager as $conn) {
            $modelsPath = APPLICATION_PATH . '/models';
            $fixturesPath = APPLICATION_PATH . '/../doctrine/data/fixtures';
            $name = array($conn->getName());
            Doctrine::dropDatabases($name);
            Doctrine::createDatabases($name);
            Doctrine::createTablesFromModels($modelsPath);
            Doctrine::loadData($fixturesPath, true);
        }
    }

    public function tearDown()
    {
    }

    public function testEntryIsClosed()
    {
        $entry = Doctrine::getTable('Entry')->find(1);
        $this->assertFalse($entry->isOpen());
    }

    public function testEntryIsOpen()
    {
        $entry = Doctrine::getTable('Entry')->find(10);
        $this->assertTrue($entry->isOpen());
    }

    public function testEntryTotalIsValid()
    {
        $entry = Doctrine::getTable('Entry')->find(1);
        $this->assertEquals(3600, $entry->getTotal());
    }
}
