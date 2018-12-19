<?php

namespace DetailTest\AlgoliaSearch\Factory\Client;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Factory\Client\AlgoliaSearchClientFactory;
use Detail\AlgoliaSearch\Options\ModuleOptions;
use DetailTest\AlgoliaSearch\Factory\FactoryTestCase;

class ClientFactoryTest extends FactoryTestCase
{
    public function testCreateService()
    {
        $client = $this->createClient('test-id','test-key');

        $this->assertInstanceOf(Client::CLASS, $client);
    }

    public function testCreateServiceThrowsExceptionForInvalidApplicationId()
    {
        $this->expectException(ServiceNotCreatedException::CLASS);
        $this->expectExceptionMessage('AlgoliaSearch requires an applicationID');
        $this->createClient(null, null);
    }

    protected function createClient(?string $applicationID, ?string $apiKey, ?array $hostsArray = null, ?array $options = []): Client
    {
        $moduleOptions = $this->prophesize(ModuleOptions::CLASS);
        $moduleOptions->getApplicationId()->willReturn($applicationID);
        $moduleOptions->getApiKey()->willReturn($apiKey);
        $moduleOptions->getHosts()->willReturn($hostsArray);
        $moduleOptions->getOptions()->willReturn($options);

        $services = $this->getServices();
        $services->get(ModuleOptions::CLASS)->willReturn($moduleOptions->reveal());

        /** @var Client $client */
        $client = $this->getFactory()->__invoke($services->reveal(), Client::CLASS);

        return $client;
    }

    protected function createFactory(): FactoryInterface
    {
        return new AlgoliaSearchClientFactory();
    }
}
