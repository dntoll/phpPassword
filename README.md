php_password
============

A password analyser library for PHP


	//Example
	<?php
		$p = new \password\Password("qwerty");
		$a = new \password\Analysis($p);
		$v = new \password\AnalysisView($a);
		echo $v->show();
