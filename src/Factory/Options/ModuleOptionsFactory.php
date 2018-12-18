<?php

namespace Detail\AlgoliaSearch\Factory\Options;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\AlgoliaSearch\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ModuleOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
{
    $config = $container->get('Config');

    if (!isset($config['algoliasearch'])) {
        throw new ServiceNotCreatedException('Config for AlgoliaSearch is not set');
    }

    return new ModuleOptions($config['algoliasearch']);
}
}
