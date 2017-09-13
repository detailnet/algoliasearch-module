<?php

namespace DetailTest\AlgoliaSearch\Options;

use PHPUnit_Framework_TestCase as TestCase;

use Detail\AlgoliaSearch\Options\ModuleOptions;

class ModuleOptionsTest extends TestCase
{
    /**
     * @var ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $mockedMethods = array_diff(
            $this->getMethods(ModuleOptions::CLASS),
            array('getApplicationId', 'setApplicationId')
        );

        $this->options = $this->getMock(ModuleOptions::CLASS, $mockedMethods);
    }

    public function testApplicationIdCanBeSet()
    {
        $applicationId = 'test-id';

        $this->assertNull($this->options->getApplicationId());

        $this->options->setApplicationId($applicationId);

        $this->assertEquals($applicationId, $this->options->getApplicationId());
    }

    /**
     * Helper to get all public and abstract methods of a class.
     *
     * This includes methods of parent classes.
     *
     * @param string $class
     * @param boolean $autoload
     * @return array
     */
    protected function getMethods($class, $autoload = true)
    {
        $methods = array();

        if (class_exists($class, $autoload) || interface_exists($class, $autoload)) {
            $reflector = new \ReflectionClass($class);

            foreach ($reflector->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_ABSTRACT) as $method) {
                $methods[] = $method->getName();
            }
        }

        return $methods;
    }
}
