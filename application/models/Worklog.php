<?php
/**
 * Worklog Demo
 *
 * @category   Models
 * @package    Worklog
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: Worklog.php 6 2009-05-21 21:46:14Z mlurz $
 */

/**
 * @see BaseWorklog
 */
// require_once './generated/BaseWorklog.php';

/**
 * @category   Models
 * @package    Worklog
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 */
class Worklog extends BaseWorklog implements Zend_Acl_Resource_Interface
{
    /**
     * Retrieve resource identifier for Forward_Acl
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'worklog';
    }

    /**
     * Return sum of all entry totals in seconds
     *
     * @return int
     */
    public function getTotal()
    {
        $total = 0;

        foreach ($this->Entries as $entry) {
            if (!$entry->isOpen()) {
                $total += $entry->getTotal();
            }
        }

        return $total;
    }

    /**
     * Determine whether the worklog is open
     *
     * @return bool
     */
    public function isOpen()
    {
        $lastEntry = $this->Entries->getLast();

        if ($lastEntry->isOpen()) {
            return true;
        }

        return false;
    }
}
