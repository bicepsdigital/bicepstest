<?php

namespace BicepsDigital\Test;

use PHPUnit_Framework_Constraint;

class AssertIsArray extends PHPUnit_Framework_Constraint {

	protected function matches( $other ) {
		return is_array( $other );
	}

	public function toString() {
		return '';
	}

	protected function failureDescription( $other ) {
		return 'this variable is array ' . $this->toString();
	}
}