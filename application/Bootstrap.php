<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        if (!$autoloader->isFallbackAutoloader()) {
            $autoloader->setFallbackAutoloader(true);
        }
        return $autoloader;
    }
}
