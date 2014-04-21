php_password
============

A password analyser library for PHP, this is really intended as a simple example of PHP-code.
Maybe to be used in 1dv408.


	//Example
	<?php
		$p = new \password\Password("qwerty");
		$a = new \password\Analysis($p);
		$v = new \password\AnalysisView($a);
		echo $v->show();
