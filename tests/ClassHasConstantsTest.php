<?php

use BicepsDigital\Test\AssertIsArray;
use BicepsDigital\Test\BicepsAssert;
use PHPUnit\Framework\TestCase;

class TestClassConstants {

	const EXISTING = 'a';
}

class ClassHasConstantsTest extends TestCase {

	public function testSuccess() {
		BicepsAssert::assertClassHasConstants( TestClassConstants::class, array( 'EXISTING' => 'a' ) );
	}

	public function testFailBadValue() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertClassHasConstants( TestClassConstants::class, array( 'EXISTING' => 'b' ) );
	}

	public function testFailBadConstantName() {
		$this->expectException( PHPUnit_Framework_ExpectationFailedException::class );
		BicepsAssert::assertClassHasConstants( TestClassConstants::class, array( 'NON_EXISTING' => 'a' ) );
	}

}