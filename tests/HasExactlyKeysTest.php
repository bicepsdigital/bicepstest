<?php

use BicepsDigital\Test\AssertIsArray;
use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class HasExactlyKeysTest extends TestCase {

	public function testSuccess() {
		$first_array = array(
			'a' => 'x',
			'b' => 'x',
		);

		$second_array = array( 'a', 'b' );

		BicepsAssert::assertArrayHasExactlyKeys( $first_array, $second_array );
	}

	public function testFail_WhenMissingKey() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );

		$first_array = array(
			'a' => 'x',
			'b' => 'x',
		);

		$second_array = array( 'a', 'b', 'c' );

		BicepsAssert::assertArrayHasExactlyKeys( $first_array, $second_array );
	}

	public function testFail_WhenMoreKeys() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );

		$first_array = array(
			'a' => 'x',
			'b' => 'x',
			'c' => 'x',
		);

		$second_array = array( 'a', 'b' );

		BicepsAssert::assertArrayHasExactlyKeys( $first_array, $second_array );
	}

}