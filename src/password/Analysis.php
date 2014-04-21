<?php

namespace password;

require_once("src/password/Password.php");


//To make AnalysisTest::testCountOthers work...
//NOTE!!! Sideeffects are not nice...
//TODO: actually not sure on how to handle this...
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');



/**
* Uses info from: http://www.passwordmeter.com/
*/
class Analysis {

	/**
	* @var Password $analysed
	*/
	private $analysed;

	public function __construct(Password $password) {
		$this->analysed = $password;
	}

	public function getPassword() {
		return $this->analysed;
	}

	public function countLowerCase() {
		$pattern = '/(*UTF8)[a-zåäö]/';
		preg_match_all($pattern, $this->analysed, $matches);
		return count($matches[0]);
	}

	public function countUpperCase() {
		$pattern = '/(*UTF8)[A-ZÅÄÖ]/';
		preg_match_all($pattern, $this->analysed, $matches);
		return count($matches[0]);
	}

	public function countNumbers() {
		$pattern = '/(*UTF8)[\d]/';
		preg_match_all($pattern, $this->analysed, $matches);
		return count($matches[0]);
	}

	public function countOthers() {
		return $this->analysed->countLetters() - $this->countNumbers() - $this->countUpperCase() - $this->countLowerCase();
	}

	public function countUnique() {
		$unique = array();
		$lowerCaseArray = preg_split('//u', $this->analysed, -1);
		
		foreach ($lowerCaseArray as $key => $letter) {
			if ($letter == "") {
			} else if (isset($unique[$letter]) === false) {
				$unique[$letter] = 1;
			} else {
				$unique[$letter]++;
			}
		}

		return count($unique);
	}

	public function countClasses() {
		$ret = 0;
		if ($this->countNumbers() > 0) {
			$ret++;
		}
		if ($this->countUpperCase() > 0) {
			$ret++;
		}
		if ($this->countLowerCase() > 0) {
			$ret++;
		}
		if ($this->countOthers() > 0) {
			$ret++;
		}
		return $ret;
	}

}