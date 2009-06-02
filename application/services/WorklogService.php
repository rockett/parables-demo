<?php
/**
 * Worklog service
 *
 * @category   Services
 * @package    WorklogService
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: WorklogService.php 6 2009-05-21 21:46:14Z mlurz $
 */

/**
 * @category   Services
 * @package    WorklogService
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 */
class WorklogService
{
    /**
     * Retrieve all worklogs
     *
     * @return array
     */
    public function getAll()
    {
        $q = Doctrine_Query::create()
            ->select('name')
            ->from('Worklog w');

        return $q->execute(array(), Doctrine::HYDRATE_ARRAY);
    }
}
