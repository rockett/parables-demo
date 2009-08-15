<?php
/**
 * Rpc controller
 *
 * @category   Controllers
 * @package    RpcController
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 * @version    $Id: RpcController.php 7 2009-05-28 11:11:18Z mlurz $
 */

/**
 * @see Zend_Controller_Action
 */
// require_once 'Zend/Controller/Action.php';

/**
 * @category   Controllers
 * @package    RpcController
 * @copyright  Copyright (c) 2009-2012 Forward Software Inc. (http://www.forward-compatible.com)
 */
class RpcController extends Zend_Controller_Action
{
    /**
     * JSON-RPC controller
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_helper->layout->disableLayout();

        $server = new Zend_Json_Server();
        $server->setClass('WorklogService');

        if ('GET' == $_SERVER['REQUEST_METHOD']) {
            $server->setTarget('/rpc/index')
                ->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2)
                ->setDojoCompatible(true);

            $smd = $server->getServiceMap();
            header('Content-Type: application/json');
            echo $smd;
            return;
        }

        // Handle the request:
        $server->handle();
    }
}

