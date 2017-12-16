<?php

namespace BicepsDigital\Test;

use ArrayAccess;
use PHPUnit\Framework\TestCase;
use PHPUnit_Util_InvalidArgumentHelper;
use ReflectionClass;

class BicepsAssert extends TestCase {

	public static function assertIsArray( $array, $message = '' ) {
		$constraint = new AssertIsArray();

		static::assertThat( $array, $constraint, $message );
	}

	public static function assertArrayHasKeys( $keys, $array, $message = '' ) {
		if ( ! ( is_array( $keys ) || $keys instanceof ArrayAccess ) ) {
			throw PHPUnit_Util_InvalidArgumentHelper::factory(
				1,
				'array or ArrayAccess'
			);
		}

		if ( ! ( is_array( $array ) || $array instanceof ArrayAccess ) ) {
			throw PHPUnit_Util_InvalidArgumentHelper::factory(
				2,
				'array or ArrayAccess'
			);
		}

		$constraint = new AssertArrayHasKeys( $keys );

		static::assertThat( $array, $constraint, $message );
	}

	public static function assertArrayHasValues( $values, $array, $message = '' ) {
		if ( ! ( is_array( $values ) || $array instanceof ArrayAccess ) ) {
			$values = array( $values );
		}

		if ( ! ( is_array( $array ) || $array instanceof ArrayAccess ) ) {
			throw PHPUnit_Util_InvalidArgumentHelper::factory(
				2,
				'array or ArrayAccess'
			);
		}

		$constraint = new AssertArrayHasValues( $values );

		static::assertThat( $array, $constraint, $message );
	}

	public static function assertArrayHasNoDuplicates( $array, $message = '' ) {

		if ( ! ( is_array( $array ) || $array instanceof ArrayAccess ) ) {
			throw PHPUnit_Util_InvalidArgumentHelper::factory(
				1,
				'array or ArrayAccess'
			);
		}

		$constraint = new AssertArrayHasNoDuplicates();

		static::assertThat( $array, $constraint, $message );
	}

	public static function assertClassHasConstants( $className, $constants ) {
		$reflectObject = new ReflectionClass( $className );
		foreach ( $constants as $constantName => $constantValue ) {
			static::assertEquals( $constantValue, $reflectObject->getConstant( $constantName ), 'Constant: ' . $constantName );
		}
	}

	public static function assertArrayHasExactlyKeys( $array, $keys, $message = 'exactly has keys' ) {
		self::assertArrayEql( array_keys( $array ), array_values( $keys ), $message );
	}

	public static function assertArrayEql( $expected, $actual, $message = "exactly same keys" ) {
		self::assertEquals( $expected, $actual, $message, $delta = 0.0, $maxDepth = 10, $canonicalize = true );
	}

	/*public static function getClassProperties( $className ) {
		$reflectionClass      = new ReflectionClass( $className );
		$reflectionProperties = $reflectionClass->getProperties();

		$objectProperties = array();

		foreach ( $reflectionProperties as $containerProperty ) {
			$objectProperties[ $containerProperty->name ] = $containerProperty->class;
		}

		return $objectProperties;
	}*/
}