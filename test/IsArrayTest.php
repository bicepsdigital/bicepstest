<?php

use PHPUnit\Framework\TestCase;

class IsArrayTest extends TestCase {

	public function testWhenArrayIsPassed_shouldNotThrowException() {
		$assert = new BicepsAssertIsArray();
		$assert->evaluate(array());
	}

	public function testWhenNullIsPassed_shouldThrowException() {
		$this->expectException(PHPUnit_Framework_ExpectationFailedException::class);
		$assert = new BicepsAssertIsArray();
		$assert->evaluate(null);
	}


	public function testWhenNumberIsPassed_shouldThrowException() {
		$this->expectException(PHPUnit_Framework_ExpectationFailedException::class);
		$assert = new BicepsAssertIsArray();
		$assert->evaluate(5);
	}

	public function testWhenStringIsPassed_shouldThrowException() {
		$this->expectException(PHPUnit_Framework_ExpectationFailedException::class);
		$assert = new BicepsAssertIsArray();
		$assert->evaluate("string");
	}

	public function testOnBicepsAssert_true() {
		\Biceps\Test\BicepsAssert::assertIsArray(array());
	}

	public function testOnBicepsAssert_throw() {
		$this->expectException(PHPUnit_Framework_ExpectationFailedException::class);
		\Biceps\Test\BicepsAssert::assertIsArray(true);
	}


}