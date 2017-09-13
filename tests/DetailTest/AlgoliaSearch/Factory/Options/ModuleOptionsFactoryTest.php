<?php

namespace DetailTest\AlgoliaSearch\Factory\Options;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use Detail\AlgoliaSearch\Exception;
use Detail\AlgoliaSearch\Factory\Options\ModuleOptionsFactory;
use Detail\AlgoliaSearch\Options\ModuleOptions;

class ModuleOptionsFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $moduleOptions = $this->createModuleOptions(array('algoliasearch' => array()));

        $this->assertInstanceOf(ModuleOptions::CLASS, $moduleOptions);
    }

    public function testCreateServiceThrowsExceptionForInvalidConfiguration()
    {
        $this->setExpectedException(Exception\ConfigException::CLASS);
        $this->createModuleOptions();
    }

    /**
     * @param array $options
     * @return ModuleOptions
     */
    protected function createModuleOptions(array $options = array())
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', $options);

        $factory = new ModuleOptionsFactory();

        return $factory->createService($serviceManager);
    }
}
