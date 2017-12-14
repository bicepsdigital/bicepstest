<?php



/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 18.01.2017
 * Time: 20:07
 */
class BicepsAssertIsArray extends PHPUnit_Framework_Constraint {


    protected function matches($other) {
        return is_array($other);
    }

    public function toString() {
        return '';
    }

    protected function failureDescription($other) {
        return 'this variable is array ' . $this->toString();
    }
}