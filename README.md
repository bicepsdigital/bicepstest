# BicepsTest - Assert Extension of PHPUnit's test case


[![Build Status](https://travis-ci.org/bicepsdigital/bicepstest.svg?branch=master)](https://travis-ci.org/bicepsdigital/bicepstest)
[![Coverage Status](https://coveralls.io/repos/github/bicepsdigital/bicepstest/badge.svg?branch=master)](https://coveralls.io/github/bicepsdigital/bicepstest?branch=master)
[![CodeCov](https://codecov.io/gh/bicepsdigital/bicepstest/branch/master/graph/badge.svg)](https://codecov.io/gh/bicepsdigital/bicepstest)
[![Packagist](https://img.shields.io/packagist/v/bicepsdigital/bicepstest.svg)](https://packagist.org/packages/bicepsdigital/bicepstest)


This library provides addition asserts for PHPUnit library

These asserts are:
+ assertArrayHasKeys
+ assertArrayHasNoDuplicates
+ assertArrayHasValues
+ assertIsArray
+ assertArrayEql
+ assertClassHasConstants
+ assertArrayHasExactlyKeys

for usage please look into tests directory


## Instalation

```
composer require --dev bicepsdigital/bicepstest
```

## Usage

Just use BicepsDigital\Test\TestCase as TestCase in your unit tests.

#### Example
``` php

use BicepsDigital\Test\TestCase;

class SomeUnitTest extends TestCase {

	public function testSuccess() {
		$this->assertTrue( true );
	}

}

```