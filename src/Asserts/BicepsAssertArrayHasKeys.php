<?php

/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 18.01.2017
 * Time: 20:22
 */
class BicepsAssertArrayHasKeys extends PHPUnit_Framework_Constraint {

    /** @var array */
    private $keys;

    /** @var  array */
    private $missingKeys;

    /**
     * BicepsAssertArrayHasKeys constructor.
     * @param array $keys
     */
    public function __construct($keys) {
        parent::__construct();
        $this->keys = $keys;
    }

    protected function matches($other) {

        foreach ($this->keys as $keyToCheck) {
            if (!array_key_exists($keyToCheck, $other)) {
                $this->missingKeys[] = $keyToCheck;
            }
        }

        return count($this->missingKeys) == 0;
    }

    public function toString() {
        return 'has the keys: ' . $this->serializeArray();
    }

    protected function failureDescription($other) {
        return 'an array ' . $this->toString();
    }

    /**
     * @return string
     */
    private function serializeArray() {
        $buffer = '';
        foreach ($this->missingKeys as $missingKey) {
            $buffer .= $missingKey . ', ';
        }

        $buffer = mb_strcut($buffer, 0, mb_strlen($buffer) - 2);
        return $buffer;
    }
}