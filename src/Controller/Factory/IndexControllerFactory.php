<?php
namespace Agere\Autocomplete\Controller\Factory;

use Agere\Autocomplete\Controller\IndexController;

class IndexControllerFactory
{
    public function __invoke($cm)
    {
        $sm = $cm->getServiceLocator();
        $controller = new IndexController();
        $controller->setServiceManager($sm);

        return $controller;
    }
}