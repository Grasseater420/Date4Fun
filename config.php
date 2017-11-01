<?php
	$dbhost = "86.91.11.157";
	$dbuser = "root";
	$dbpass = "@Project2017!";
	$dbname = "project";
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {
		die("De verbinding met de database is mislukt: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	}
?>
