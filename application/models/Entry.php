<?php
/**
 * Worklog Demo
 *
 * @category   Models
 * @package    Entry
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: Entry.php 6 2009-05-21 21:46:14Z mlurz $
 */

/**
 * @see BaseEntry
 */
// require_once './generated/BaseEntry.php';

/**
 * @category   Models
 * @package    Entry
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 */
class Entry extends BaseEntry implements Zend_Acl_Resource_Interface
{
    /**
     * Retrieve resource identifier for Zend_Acl
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'entry';
    }

    /**
     * Return calculated the difference in seconds between closed and opened 
     * times
     *
     * @return int
     */
    public function getTotal()
    {
        if ($this->isOpen()) {
            return 0;
        }

        $opened = new Zend_Date($this->opened);
        $closed = new Zend_Date($this->closed);
        return $closed->sub($opened);
    }

    /**
     * Determine whether the entry is open
     *
     * @return bool
     */
    public function isOpen()
    {
        $opened = new Zend_Date($this->opened);
        $closed = new Zend_Date($this->closed);

        if ($closed->equals($opened)) {
            return true;
        }

        return false;
    }
}
