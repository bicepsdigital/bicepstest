<?php

use BicepsDigital\Test\StringUtils;
use PHPUnit\Framework\TestCase;

class StringUtilsTest extends TestCase {

	/**
	 * @param int $specificLength
	 *
	 * @return bool|string
	 */
	private function getRandomString( $specificLength = 10 ) {
		return StringUtils::random( $specificLength );
	}

	public function testRandom() {
		$firstString  = $this->getRandomString();
		$secondString = $this->getRandomString();
		self::assertNotEquals( $firstString, $secondString );
	}

	public function testIsString() {
		self::assertTrue( is_string( $this->getRandomString() ) );
	}

	public function testDefaultLength() {
		$randomString = $this->getRandomString();
		self::assertEquals( 10, strlen( $randomString ) );
	}

	public function testSpecificLength() {
		$specificLength = 15;
		$randomString   = $this->getRandomString( $specificLength );
		self::assertEquals( $specificLength, strlen( $randomString ) );
	}

	public function testExceptionOnLengthLowerThan1() {
		$this->expectException( InvalidArgumentException::class );
		$this->getRandomString( 0 );
	}

	public function testExceptionOnLengthGreaterThan40() {
		$this->expectException( InvalidArgumentException::class );
		$this->getRandomString( 41 );
	}

}