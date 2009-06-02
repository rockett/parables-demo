<?php
/**
 * Worklog Demo
 *
 * @category   Models
 * @package    Entry
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: ErrorController.php 6 2009-05-21 21:46:14Z mlurz $
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
class ErrorController extends Zend_Controller_Action
{
    /**
     * Error action
     *
     * @return void
     */
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        
        switch ($errors->type) { 
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        
                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->message = 'Page not found';
                break;
            default:
                // application error 
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->message = 'Application error';
                break;
        }
        
        $this->view->exception = $errors->exception;
        $this->view->request   = $errors->request;
    }
}
