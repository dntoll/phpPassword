<?php

	require_once("src/password/Password.php");
	require_once("src/password/Analysis.php");
	require_once("src/password/AnalysisView.php");

function showPW($password) {
	$p = new \password\Password($password);
	$a = new \password\Analysis($p);
	$v = new \password\AnalysisView($a);
	echo $v->show();
}


?><!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Password analysis</title>
    </head>
    <body>
        <?php
        	showPW("qwertyåäö098ABCÅÄÖ%/()");
        	showPW("abc123");
        	showPW("qwerty");
        ?>
    </body>
</html>
	