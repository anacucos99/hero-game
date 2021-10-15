<?php

namespace Traits;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

/**
 * Trait TestTrait
 */
trait TestTrait
{
    /**
     * @param int $value
     * @param int $min
     * @param int $max
     */
    protected function assertIsInRange(int $value, int $min, int $max): void
    {
        $this->assertLessThanOrEqual($max, $value);
        $this->assertGreaterThanOrEqual($min, $value);
    }

    /**
     * @param string $name
     * @param string $class
     *
     * @return ReflectionMethod
     *
     * @throws ReflectionException|\ReflectionException
     */
    protected static function getMethod(string $name, string $class): ReflectionMethod
    {
        $class = new ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
