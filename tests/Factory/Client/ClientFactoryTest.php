<?php

namespace DetailTest\AlgoliaSearch\Factory\Client;

use Zend\ServiceManager\Factory\FactoryInterface;

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Factory\Client\AlgoliaSearchClientFactory;
use Detail\AlgoliaSearch\Options\ModuleOptions;
use DetailTest\AlgoliaSearch\Factory\FactoryTestCase;

class ClientFactoryTest extends FactoryTestCase
{
    public function testCreateService()
    {
        $client = $this->createClient();

        $this->assertInstanceOf(Client::CLASS, $client);
    }

    protected function createClient(): Client
    {
        $moduleOptions = $this->prophesize(ModuleOptions::CLASS);
        $moduleOptions->getApplicationId()->willReturn('test-id');
        $moduleOptions->getApiKey()->willReturn('test-key');
        $moduleOptions->getHosts()->willReturn(null);
        $moduleOptions->getOptions()->willReturn([]);

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
