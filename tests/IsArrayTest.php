<?php

use BicepsDigital\Test\AssertIsArray;
use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class IsArrayTest extends TestCase {

	public function testWhenArrayIsPassed_shouldNotThrowException() {
		$assert = new AssertIsArray();
		$assert->evaluate( array() );
	}

	public function testWhenNullIsPassed_shouldThrowException() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		$assert = new AssertIsArray();
		$assert->evaluate( null );
	}

	public function testWhenNumberIsPassed_shouldThrowException() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		$assert = new AssertIsArray();
		$assert->evaluate( 5 );
	}

	public function testWhenStringIsPassed_shouldThrowException() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		$assert = new AssertIsArray();
		$assert->evaluate( "string" );
	}

	public function testOnBicepsAssert_true() {
		BicepsAssert::assertIsArray( array() );
	}

	public function testOnBicepsAssert_throw() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertIsArray( true );
	}

}