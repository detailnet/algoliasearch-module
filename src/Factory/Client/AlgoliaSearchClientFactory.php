<?php

namespace Detail\AlgoliaSearch\Factory\Client;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Options\ModuleOptions;

class AlgoliaSearchClientFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Client
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);

        try {
            return new Client(
                $moduleOptions->getApplicationId(),
                $moduleOptions->getApiKey(),
                $moduleOptions->getHosts(),
                $moduleOptions->getOptions()
            );
        } catch (\Exception $e) {
            throw new ServiceNotCreatedException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
