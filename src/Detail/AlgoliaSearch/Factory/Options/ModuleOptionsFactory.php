<?php

namespace Detail\AlgoliaSearch\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\AlgoliaSearch\Exception\ConfigException;
use Detail\AlgoliaSearch\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['algoliasearch'])) {
            throw new ConfigException('Config for AlgoliaSearch is not set');
        }

        return new ModuleOptions($config['algoliasearch']);
    }
}
