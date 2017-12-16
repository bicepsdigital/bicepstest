<?php

namespace BicepsDigital\Test;

use Prophecy\Exception\InvalidArgumentException;

class StringUtils {

	/**
	 * @param int $length
	 *
	 * @return bool|string
	 */
	public static function random( $length = 10 ) {

		if ( $length <= 0 ) {
			throw new InvalidArgumentException( 'Length must be greater or equals than 1' );
		} else if ( $length > 40 ) {
			throw new InvalidArgumentException( 'Length must be lower or equals than 40' );
		}

		$randomHash = sha1( mktime() . rand( 1, 100000 ) );

		return substr( $randomHash, 0, $length );
	}

}