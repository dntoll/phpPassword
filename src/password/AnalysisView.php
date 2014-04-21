<?php

namespace password;

class AnalysisView {

	public function __construct(Analysis $analysis) {
		$this->analysis = $analysis;
	}

	public function show() {

		$pw = $this->analysis->getPassword();
		$letters = $pw->countLetters();
		$lower = $this->analysis->countLowerCase();
		$upper = $this->analysis->countUpperCase();
		$numbers = $this->analysis->countNumbers();
		$others = $this->analysis->countOthers();
		$unique = $this->analysis->countUnique();
		$classes = $this->analysis->countClasses();


		return "
		<div>
			<h1>Password analysis for '$pw'</h1>
			<ul>
				<li>Number of letters $letters</li>
				<li>Number of lower case $lower</li>
				<li>Number of upper case $upper</li>
				<li>Number of numbers $numbers</li>
				<li>Number of symbols $others</li>
				<li>Number of unique characters $unique</li>
				<li>Number of number of classes $classes</li>
			</ul>

		</div>";
	}
}