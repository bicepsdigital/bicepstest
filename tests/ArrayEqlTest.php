<?php

use BicepsDigital\Test\AssertIsArray;
use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class ArrayEqlTest extends TestCase {

	public function testSuccess() {
		BicepsAssert::assertArrayEql(array('a'), array('a'));
	}

	public function testFail() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertArrayEql(array('a'), array('a', 'b'));
	}


}