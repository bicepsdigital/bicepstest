<?php

/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 18.01.2017
 * Time: 20:07
 */
class BicepsAssertArrayHasNoDuplicates extends PHPUnit_Framework_Constraint {

    private $numberOfDuplicates = 0;
    private $duplicates = array();

    protected function matches($inspectedArray) {
        $this->duplicates = array_intersect($inspectedArray, array_unique(array_diff_key($inspectedArray, array_unique($inspectedArray)))) ;
        $this->numberOfDuplicates = count($inspectedArray) - count(array_unique($inspectedArray));
        return $this->numberOfDuplicates === 0;
    }

    public function toString() {
        return 'This array has ' . $this->numberOfDuplicates . " duplicates:\n" . $this->exporter->export($this->duplicates);
    }

    protected function failureDescription($other) {
        return 'this array has no duplicates. ' . $this->toString();
    }
}