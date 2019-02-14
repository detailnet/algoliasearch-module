<?php

namespace DetailTest\AlgoliaSearch;

use PHPUnit\Framework\TestCase;

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

    public function testModuleProvidesConfig()
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('algoliasearch', $config);
        $this->assertTrue(is_array($config['algoliasearch']));
    }
}
