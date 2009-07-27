<?php
class Entry extends BaseEntry implements Zend_Acl_Resource_Interface
{
    /**
     * Retrieve resource identifier
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'entry';
    }

    /**
     * Calculate the difference in seconds between closed and opened
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
