<?php
class WorklogTest extends PHPUnit_Framework_TestCase
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

    public function testWorklogIsClosed()
    {
        $worklog = Doctrine::getTable('Worklog')->find(1);
        $this->assertFalse($worklog->isOpen());
    }

    public function testWorklogIsOpen()
    {
        $worklog = Doctrine::getTable('Worklog')->find(2);
        $this->assertTrue($worklog->isOpen());
    }

    public function testWorklogTotalIsValid()
    {
        $worklog = Doctrine::getTable('Worklog')->find(1);
        $this->assertEquals(18000, $worklog->getTotal());
    }

    /* @bug doesn't work with sqlite, is there a way to vary the test by db 
     * adapter?
    public function testDeleteWorklogCascadesToEntries()
    {
        $worklog = Doctrine::getTable('Worklog')->find(2);
        $worklog->delete();

        $worklogQuery = Doctrine_Query::create()
            ->select('COUNT(id)')
            ->from('Worklog w')
            ->where('w.id = ?', 2);

        $worklogCount = $worklogQuery->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        $this->assertEquals(0, $worklogCount);

        $entriesQuery = Doctrine_Query::create()
            ->select('COUNT(id)')
            ->from('Entry e')
            ->where('e.worklog_id = ?', 2);

        $entriesCount = $entriesQuery->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        $this->assertEquals(0, $entriesCount);
    }
     */
}
