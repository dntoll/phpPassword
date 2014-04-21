<?php



require_once("src/password/Analysis.php");

use password\Analysis;
use password\Password;

class AnalysisTest extends PHPUnit_Framework_TestCase {

	public function __construct() {

		$this->emptyPassword = new Password("_");
		$this->emptyAnalysis = new Analysis($this->emptyPassword);

		$this->password = new Password("123åÅbcÄÖ#¤%");
		$this->analysis = new Analysis($this->password);

	}

	public function testGetPassword() {
		$this->assertTrue($this->password === $this->analysis->getPassword());
	}

	public function testLowerCount() {
		$this->assertEquals(3 , $this->analysis->countLowerCase());
		$this->assertEquals(0 , $this->emptyAnalysis->countLowerCase());
	}

	public function testUpperCount() {
		$this->assertEquals(3 , $this->analysis->countUpperCase());
		$this->assertEquals(0 , $this->emptyAnalysis->countUpperCase());
	}

	public function testNumbers() {
		$this->assertEquals(3 , $this->analysis->countNumbers());
		$this->assertEquals(0 , $this->emptyAnalysis->countNumbers());
	}

	public function testCountOthers() {
		$this->assertEquals(3 , $this->analysis->countOthers());
		$this->assertEquals(1 , $this->emptyAnalysis->countOthers());
	}

	public function testCountUnique() {
		$this->assertEquals(12 , $this->analysis->countUnique());
		$this->assertEquals(1 , $this->emptyAnalysis->countUnique());

		$pw = new Password("aaaaaaaaaaaa");
		$a = new Analysis($pw);
		$this->assertEquals(1 , $a->countUnique());

		$pw = new Password("åäö");
		$a = new Analysis($pw);
		$this->assertEquals(3 , $a->countUnique());
	}
	
	public function testCountClasses() {
		$this->assertEquals(4, $this->analysis->countClasses());
		$this->assertEquals(1, $this->emptyAnalysis->countClasses());
	}
	
}