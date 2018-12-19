<?php

namespace DetailTest\AlgoliaSearch;

use PHPUnit\Framework\TestCase;

use Zend\Loader\StandardAutoloader;

use Detail\AlgoliaSearch\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesAutoloaderConfig()
    {
        $config = $this->module->getAutoloaderConfig();

        $this->assertTrue(is_array($config));

        $this->assertArrayHasKey(StandardAutoloader::CLASS, $config);
        $this->assertArrayHasKey('namespaces', $config[StandardAutoloader::CLASS]);
        $this->assertArrayHasKey('Detail\AlgoliaSearch', $config[StandardAutoloader::CLASS]['namespaces']);
    }

    public function testModuleProvidesConfig()
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('algoliasearch', $config);
        $this->assertTrue(is_array($config['algoliasearch']));
    }
}
