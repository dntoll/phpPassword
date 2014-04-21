<?php

namespace password;

class Password {

	/**
	* @param string $stringPassword
	*/
	public function __construct($stringPassword) {
		if (is_string($stringPassword) === FALSE) {
			throw new \InvalidArgumentException("Password must be of string type");
		}
		if (mb_strlen($stringPassword) === 0) {
			throw new \InvalidArgumentException("Password must be longer than 0 letters");
		}
		$this->stringPassword = $stringPassword;
	}

	public function countLetters() {
		return mb_strlen($this->stringPassword);
	}

	public function __toString() {
		return $this->stringPassword;
		
	}

}