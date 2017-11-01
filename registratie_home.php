<!DOCTYPE HTML>
<html>
<head>
<title>Date4Fun</title>
</head>
<body>
<h1>Date4Fun</h1>
<h1>Logo</h1>
<h2>Welkom bij Date4Fun! Zin in een spannende date? Registreer dan nu!</h2>

<?php
	if (!isset($_POST["submit"])){
?>
<form action="registratie_home.php" method="post">
<fieldset>
<table>
<tr>Naam*</tr>
<tr><td><input type="text" name="voornaam"></td><td><input type="text" name="tussenvoegsel"></td><td><input type="text" name="achternaam"></td></tr>
<tr><td><i>Voornaam</i></td><td><i>tussenvoegsel</i></td><td><i>Achternaam</i></td></tr>
</table>

<p>Gebruikersnaam*
<br>
<input type="text" name="gebruikersnaam">
</p>

<p>Wachtwoord*
<br>
<input type="password" name="wachtwoord">
</p>

<p>E-mailadres*
<br>
<input type="email" name="email">
</p>

<p>Geboortedatum*
<br>
<input type="date" name="geboortedatum">
</p>

<p>
<input type="checkbox" name="voorwaarden" value="1">Ik accepteer de algemene voorwaarden van Date4Fun.</input>
</p>

<p>
<input type="submit" name="submit" value="Registreer">
</p>

<br>
<br>
<br>

<p>
Velden met het * zijn verplicht
</p>
</fieldset>
</form>
<?php
	}
	
	else{	
		
		if (!empty($_POST["voornaam"]) && !empty($_POST["achternaam"]) && !empty($_POST["gebruikersnaam"]) && !empty($_POST["wachtwoord"]) && !empty($_POST["email"]) && !empty($_POST["geboortedatum"]) && isset($_POST["voorwaarden"])){
			include "connection.php";
			
			$voornaam = $_POST["voornaam"];
			$tussenvoegsel = $_POST["tussenvoegsel"];
			$achternaam = $_POST["achternaam"];
			$gebruikersnaam = $_POST["gebruikersnaam"];
			$wachtwoord = $_POST["wachtwoord"];
			$email = $_POST["email"];
			$geboortedatum = $_POST["geboortedatum"];
			
			$query = "SELECT * FROM gebruikers WHERE gebruikersnaam = '".$gebruikersnaam."'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) >= 1){
				echo "De gebruikersnaam bestaat al.";
			}
	
			else {
				
			$query = "INSERT INTO `gebruikers` (`ID`, `voornaam`, `tussenvoegsel`, `achternaam`, `gebruikersnaam`, `wachtwoord`, `email`, `geboortedatum`) 
						VALUES (NULL, '$voornaam', '$tussenvoegsel', '$achternaam', '$gebruikersnaam', '$wachtwoord', '$email', '$geboortedatum')";
	
			$result = mysqli_query($db, $query);
	
			echo "<h3>De volgende gegevens zijn ingevuld:</h3>";
			echo "Naam: <b>$voornaam $tussenvoegsel $achternaam</b><br>";
			echo "Gebruikersnaam: <b>$gebruikersnaam</b><br>";
			echo "Wachtwoord: <b>$wachtwoord</b><br>";
			echo "E-mailadres: <b>$email</b><br>";
			echo "Geboortedatum: <b>$geboortedatum</b>";
			}
			mysqli_close($db); 
					//sessiestart
					//header("location: /welkom.php");
		}
		
		if (empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"]) || empty($_POST["email"]) || empty($_POST["geboortedatum"]) || !isset($_POST["voorwaarden"])){
			echo "Sorry! De gebruiker kan niet geregistreerd worden.<br /><br />";//Check of alles goed is ingevuld, zo niet, dan bericht, zo ja, post naar database en redirect naar welkom.php
		}
		
		if (empty($_POST["voornaam"])){
			echo "Voornaam is niet ingevuld.<br />";
		}

		if (empty($_POST["achternaam"])){
			echo "Achternaam is niet ingevuld.<br />";
		}
		
		if (empty($_POST["gebruikersnaam"])){
			echo "Gebruikersnaam is niet ingevuld.<br />";
		}
		
		if (empty($_POST["wachtwoord"])){
			echo "Wachtwoord is niet ingevuld.<br />";
		}
		
		if (empty($_POST["email"])){
			echo "E-mailadres is niet ingevuld.<br />";
		}
		
		if (empty($_POST["geboortedatum"])){
			echo "Geboortedatum is niet ingevuld.<br />";
		}
		
		if (!isset($_POST["voorwaarden"])){
			echo "De algemene voorwaarden zijn niet geaccepteerd.";
		}
	
	}
?>
</body>
</html>