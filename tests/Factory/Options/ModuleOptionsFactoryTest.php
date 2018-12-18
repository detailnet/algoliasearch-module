<?php

namespace DetailTest\AlgoliaSearch\Factory\Options;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\AlgoliaSearch\Factory\Options\ModuleOptionsFactory;
use Detail\AlgoliaSearch\Options\ModuleOptions;
use DetailTest\AlgoliaSearch\Factory\FactoryTestCase;

class ModuleOptionsFactoryTest extends FactoryTestCase
{
    public function testCreateService()
    {
        $moduleOptions = $this->createModuleOptions(['algoliasearch' => []]);

        $this->assertInstanceOf(ModuleOptions::CLASS, $moduleOptions);
    }

    public function testCreateServiceThrowsExceptionForInvalidConfiguration()
    {
        $this->expectException(ServiceNotCreatedException::CLASS);
        $this->expectExceptionMessage('Config for AlgoliaSearch is not set');
        $this->createModuleOptions([]);
    }

    protected function createFactory(): FactoryInterface
    {
        return new ModuleOptionsFactory();
    }

    private function createModuleOptions(array $config): ModuleOptions
    {
        $services = $this->getServices();
        $services->get('Config')->willReturn($config);

        /** @var ModuleOptions $options */
        $options = $this->getFactory()->__invoke($services->reveal(), ModuleOptions::CLASS);

        return $options;
    }
}
