<?php

use Biceps\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class ArrayHasKeysTest extends TestCase {

	public function testSuccess() {
		BicepsAssert::assertArrayHasKeys(array('a', 'b'), array('a' => 'c', 'b' => 'c'));
	}

	public function testFail() {
		$this->expectException(PHPUnit_Framework_ExpectationFailedException::class);
		BicepsAssert::assertArrayHasKeys(array('a', 'b', 'c'), array('a' => 'c', 'b' => 'c'));
	}
}