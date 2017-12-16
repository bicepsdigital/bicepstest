<?php

namespace BicepsDigital\Test;

use PHPUnit_Framework_Constraint;

class AssertArrayHasValues extends PHPUnit_Framework_Constraint {

	/**
	 * @var array
	 */
	private $values;

	/** @var array */
	private $missingValues;

	/**
	 * BicepsAssertArrayHasValues constructor.
	 *
	 * @param array $values
	 */
	public function __construct( $values ) {
		parent::__construct();
		$this->values = $values;
	}

	protected function matches( $other ) {

		foreach ( $this->values as $valueToCheck ) {
			if ( array_search( $valueToCheck, $other ) === false ) {
				$this->missingValues[] = $valueToCheck;
			}
		}

		return count( $this->missingValues ) == 0;
	}

	public function toString() {
		return 'has the values: ' . $this->serializeArray();
	}

	protected function failureDescription( $other ) {
		return 'an array ' . $this->toString();
	}

	/**
	 * @return string
	 */
	private function serializeArray() {
		$buffer = '';
		foreach ( $this->missingValues as $missingValue ) {
			$buffer .= $missingValue . ', ';
		}

		$buffer = mb_strcut( $buffer, 0, mb_strlen( $buffer ) - 2 );

		return $buffer;
	}
}