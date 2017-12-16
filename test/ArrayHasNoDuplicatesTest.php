<?php

use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class ArrayHasNoDuplicatesTest extends TestCase {

	public function testSuccess() {
		BicepsAssert::assertArrayHasNoDuplicates( array( 'a', 'b' ) );
	}

	public function testFail() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertArrayHasNoDuplicates( array( 'a', 'b', 'b' ) );
	}
}