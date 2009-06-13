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
        Zend_Paginator::setDefaultScrollingStyle('Sliding');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('/index/paginator.phtml');

        $q = Doctrine_Query::create()
            ->from('Worklog w')
            ->leftJoin('w.Entries e');

        $adapter = new Parables_Paginator_Adapter_Doctrine($q);

        $paginator = new Zend_Paginator($adapter);
        $paginator->setCurrentPageNumber($this->_getParam('page',1))
            ->setItemCountPerPage(5)
            ->setView($this->view);

        $this->view->paginator = $paginator;
    }
}
