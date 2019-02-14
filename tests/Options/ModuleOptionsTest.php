<?php

namespace DetailTest\AlgoliaSearch\Options;

use Detail\AlgoliaSearch\Options\ModuleOptions;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            ModuleOptions::CLASS,
            [
                'getApplicationId',
                'setApplicationId',
                'getApiKey',
                'setApiKey',
                'getHosts',
                'setHosts',
                'getOptions',
                'setOptions',
            ]
        );
    }

    public function testOptionsExist(): void
    {
        $this->assertInstanceOf(ModuleOptions::CLASS, $this->options);
    }

    public function testApplicationIdCanBeSet()
    {
        $applicationId = 'test-id';

        $this->assertNull($this->options->getApplicationId());

        $this->options->setApplicationId($applicationId);

        $this->assertEquals($applicationId, $this->options->getApplicationId());
    }

    public function testApiKeyCanBeSet(): void
    {
        $key = 'some-api-key';

        $this->assertNull($this->options->getApiKey());

        $this->options->setApiKey($key);

        $this->assertEquals($key, $this->options->getApiKey());
    }

    public function testHostsCanBeSet(): void
    {
        $hosts = ['some-host'];

        $this->assertNull($this->options->getHosts());

        $this->options->setHosts($hosts);

        $this->assertEquals($hosts, $this->options->getHosts());
    }

    public function testOptionsCanBeSet(): void
    {
        $options = ['timeout' => 30];

        $this->assertEmpty($this->options->getOptions());

        $this->options->setOptions($options);

        $this->assertEquals($options, $this->options->getOptions());
    }

    /**
     * Helper to get all public and abstract methods of a class.
     * This includes methods of parent classes.
     *
     * @param string $class
     * @param boolean $autoload
     * @return array
     * @throws \ReflectionException
     */
    protected function getMethods($class, $autoload = true)
    {
        $methods = [];

        if (class_exists($class, $autoload) || interface_exists($class, $autoload)) {
            $reflector = new \ReflectionClass($class);

            foreach ($reflector->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_ABSTRACT) as $method) {
                $methods[] = $method->getName();
            }
        }

        return $methods;
    }
}
