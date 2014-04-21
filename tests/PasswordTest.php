<?php

require_once("src/password/Password.php");

use password\Password;

class PasswordTest extends PHPUnit_Framework_TestCase {



	public function test__toString() {
		$input = "SomeÅÄÖpassword";
		$expected = "$input";

		$sut = new Password($input);
		$this->assertEquals($expected, $sut->__toString());
	}

	public function testCountLetters() {
		$input = "1234567890";
		$expected = 10;

		$sut = new Password($input);
		$this->assertEquals($expected, $sut->countLetters());
	}

 	/**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Password must be longer than 0 letters
     */
	public function testConstructorWithZeroInput() {
		$input = "";
		$sut = new Password($input);
	}

	/**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Password must be of string type
     */
	public function testConstructorWithNumberInput() {
		$input = 0;
		$sut = new Password($input);
	}

	/**
     * @expectedException        PHPUnit_Framework_Error
     */
	public function testConstructorWithNoInput() {
		$sut = new Password();
	}
	
}