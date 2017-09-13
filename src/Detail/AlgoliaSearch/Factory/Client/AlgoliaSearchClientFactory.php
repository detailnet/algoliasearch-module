<?php

namespace Detail\AlgoliaSearch\Factory\Client;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Options\ModuleOptions;

class AlgoliaSearchClientFactory implements
    FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Client
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get(ModuleOptions::CLASS);

        return new Client(
            $moduleOptions->getApplicationId(),
            $moduleOptions->getApiKey(),
            $moduleOptions->getHosts(),
            $moduleOptions->getOptions()
        );
    }
}
