<?php

namespace DetailTest\AlgoliaSearch\Factory\Options;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\ServiceManager\ServiceManager;

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Factory\Client\AlgoliaSearchClientFactory;
use Detail\AlgoliaSearch\Options\ModuleOptions;

class AlgoliaSearchClientFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $client = $this->createClient();

        $this->assertInstanceOf(Client::CLASS, $client);
    }

    /**
     * @return Client
     */
    protected function createClient()
    {
        $moduleOptions = $this->getMock(ModuleOptions::CLASS);
        $moduleOptions
            ->expects($this->any())
            ->method('getApplicationId')
            ->will($this->returnValue('test-id'));
        $moduleOptions->expects($this->any())
            ->method('getApiKey')
            ->will($this->returnValue('test-key'));
        $moduleOptions->expects($this->any())
            ->method('getHosts')
            ->will($this->returnValue(null));
        $moduleOptions->expects($this->any())
            ->method('getOptions')
            ->will($this->returnValue(array()));

        $serviceManager = new ServiceManager();
        $serviceManager->setService(ModuleOptions::CLASS, $moduleOptions);

        $factory = new AlgoliaSearchClientFactory();

        return $factory->createService($serviceManager);
    }
}
