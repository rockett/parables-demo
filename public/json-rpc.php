<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? 
    getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/models'),
    realpath(APPLICATION_PATH . '/models/generated'),
    realpath(APPLICATION_PATH . '/services'),
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';  

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap();

$server = new Zend_Json_Server();
$server->setClass('WorklogService');

if ('GET' == $_SERVER['REQUEST_METHOD']) {
    $server->setTarget('/json-rpc.php')
        ->setEnvelope(Zend_Json_Server_Smd::ENV_JSONRPC_2)
        ->setDojoCompatible(true);

    $smd = $server->getServiceMap();
    header('Content-Type: application/json');
    echo $smd;
    return;
}

// Handle the request:
$server->handle();
