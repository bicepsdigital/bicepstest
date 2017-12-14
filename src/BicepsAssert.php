<?php

namespace Biceps\Test;

use ArrayAccess;
use BicepsAssertArrayHasKeys;
use BicepsAssertArrayHasNoDuplicates;
use BicepsAssertArrayHasValues;
use BicepsAssertIsArray;
use PHPUnit\Framework\TestCase;
use PHPUnit_Util_InvalidArgumentHelper;
use ReflectionClass;

/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 18.01.2017
 * Time: 19:58
 */
class BicepsAssert extends TestCase {

    public static function assertIsArray($array, $message = '') {
        $constraint = new BicepsAssertIsArray();

        static::assertThat($array, $constraint, $message);
    }

    public static function assertArrayHasKeys($keys, $array, $message = '') {
        if (!(is_array($keys) || $keys instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'array or ArrayAccess'
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $constraint = new BicepsAssertArrayHasKeys($keys);

        static::assertThat($array, $constraint, $message);
    }

    public static function assertArrayHasValues($values, $array, $message = '') {
        if (!(is_array($values) || $array instanceof ArrayAccess)) {
            $values = array($values);
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $constraint = new BicepsAssertArrayHasValues($values);

        static::assertThat($array, $constraint, $message);
    }

    public static function assertArrayHasNoDuplicates($array, $message = '') {

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'array or ArrayAccess'
            );
        }

        $constraint = new BicepsAssertArrayHasNoDuplicates();

        static::assertThat($array, $constraint, $message);
    }

    public static function assertClassHasConstants($className, $constants) {
        $reflectObject = new ReflectionClass($className);
        foreach ($constants as $constantName => $constantValue) {
            static::assertEquals($constantValue, $reflectObject->getConstant($constantName), 'Constant: ' . $constantName);
        }
    }

    public static function assertArrayHasExactlyKeys($from, $to, $message = 'exactly has keys'){
        self::assertArrayEql(array_keys($from), array_keys($to), $message);
    }

    public static function assertArrayEql($expected, $actual, $message = "exactly same keys"){
        self::assertEquals($expected, $actual, $message, $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    public static function getClassProperties($className) {
        $reflectionClass = new ReflectionClass($className);
        $reflectionProperties = $reflectionClass->getProperties();

        $objectProperties = array();

        foreach ($reflectionProperties as $containerProperty) {
            $objectProperties[$containerProperty->name] = $containerProperty->class;
        }
        return $objectProperties;
    }
}