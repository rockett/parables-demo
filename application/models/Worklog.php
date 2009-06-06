<?php
class Worklog extends BaseWorklog implements Zend_Acl_Resource_Interface
{
    /**
     * Retrieve resource identifier
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
