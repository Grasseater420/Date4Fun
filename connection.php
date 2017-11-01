<?php
	//Database connectie met localhost
	$dbhost = "86.91.11.157";
	$dbuser = "root";
	$dbpass = "@Project2017!";
	$dbname = "project";
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//Test of de verbinding werkt
	if(mysqli_connect_errno()){
		die("De verbinding met de databse is mislukt: ".
			mysqli_connect_error()."(".
				mysqli_connect_errno(). ")");
	}
?>