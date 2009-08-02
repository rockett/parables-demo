<?php
/**
 * Index controller
 *
 * @category   Controllers
 * @package    IndexController
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: IndexController.php 7 2009-05-28 11:11:18Z mlurz $
 */

/**
 * @see Zend_Controller_Action
 */
// require_once 'Zend/Controller/Action.php';

/**
 * @category   Controllers
 * @package    IndexController
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 */
class IndexController extends Zend_Controller_Action
{
    /**
     * Index action
     *
     * @return void
     */
    public function indexAction()
    {
        $q = Doctrine_Query::create()
            ->from('Worklog w')
            ->leftJoin('w.Entries e');

        $this->view->worklogs = $q->fetchArray();
    }
}
