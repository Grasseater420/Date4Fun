<!DOCTYPE HTML>
<html>
<head>
<title>Date4Fun</title>
</head>
<body>
<h1>Date4Fun</h1>
<h1>Logo</h1>
<h2>Welkom bij Date4Fun! Bedankt voor het registreren! Controleer alsjeblieft je gegevens.</h2>

<?php
	include "connection.php";
	
	$voornaam = $_POST["voornaam"];
	$tussenvoegsel = $_POST["tussenvoegsel"];
	$achternaam = $_POST["achternaam"];
	$gebruikersnaam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	$email = $_POST["email"];
	$geboortedatum = $_POST["geboortedatum"];
	
	$query = "INSERT INTO `gebruikers` (`ID`, `voornaam`, `tussenvoegsel`, `achternaam`, `gebruikersnaam`, `wachtwoord`, `email`, `geboortedatum`) 
				VALUES (NULL, '$voornaam', '$tussenvoegsel', '$achternaam', '$gebruikersnaam', '$wachtwoord', '$email', '$geboortedatum')";
	
	$result = mysqli_query($db, $query);
	
	echo "<h3>De volgende gegevens zijn ingevuld:</h3>";
	echo "Naam: <b>$voornaam $tussenvoegsel $achternaam</b><br>";
	echo "Gebruikersnaam: <b>$gebruikersnaam</b><br>";
	echo "Wachtwoord: <b>$wachtwoord</b><br>";
	echo "E-mailadres: <b>$email</b><br>";
	echo "Geboortedatum: <b>$geboortedatum</b>";
	
	mysqli_close($db);
?>

</body>
</html>