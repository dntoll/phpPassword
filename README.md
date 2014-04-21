phpPassword
============

A password analyser library for PHP, this is really intended as a simple example of PHP-code.
Maybe to be used in 1dv408.


#Example
	<?php
		$p = new \password\Password("qwerty");
		$a = new \password\Analysis($p);
		$v = new \password\AnalysisView($a);
		echo $v->show();


#Sideeffect 
Please note that the Analysis does this

	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
