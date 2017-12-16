<?php

use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class ArrayHasValuesTest extends TestCase {

	public function testSuccess() {
		BicepsAssert::assertArrayHasValues( array( 'a' ), array( 'a', 'b' ) );
	}

	public function testSuccessFlatValues() {
		BicepsAssert::assertArrayHasValues( 'a', array( 'a', 'b' ) );
	}

	public function testFail() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertArrayHasValues( array( 'c' ), array( 'a', 'b' ) );
	}

	public function testShouldTrowException_whenArrayIsNotArray() {
		$this->expectException( PHPUnit_Framework_Exception::class );
		BicepsAssert::assertArrayHasValues( 'a', 'a' );
	}

}