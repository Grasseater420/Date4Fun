<?php
  session_start();
  // sessie beginnen
  include ('config.php');

  if (!empty($_POST)){
  // controleren of pagina correct is aangeroepen.
    $gebruiker = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $query = "SELECT * FROM gebruikers WHERE gebruikersnaam ='" . $_POST["gebruikersnaam"] ."'AND wachtwoord='" . $_POST["wachtwoord"] ."'";
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

    if (mysqli_num_rows($result) > 0){
  // gebruikersnaam gevonden, registreer gegevens in session
      $_SESSION["auth"]=true;
  //auth controleert of een klant is ingelogd
      $_SESSION["timeout"]=time() + 120;
			$_SESSION["gebruiker"]=$gebruiker;
		  while($row = mysqli_fetch_assoc($result)) {
        $rol = $row['admin'];
      }
  // Doorsturen naar beveiligde pagina
      if(($rol) == "1") {
        // header("Location: admin.php");
        echo "Je bent Admin";
        exit();
      }
      elseif(($rol =="0")) {
        // header("Location: medewerker.php");
        echo "Je bent Gebruiker";
        exit();
      }
    }
    else{
	// geen e-mail adres gevonden, of ongeldig wachtwoord.
      $tekst = "U hebt geen geldige combinatie van e-mailadres en wachtwoord opgegeven.<br>
      Maak een keuze: <br>
      <a href=\"loginForm.php\">Opnieuw inloggen</a><br>
      <a href=\"registreerForm.php\">Hier registreren</a><br>";
      die($tekst);
    }
  }
  else{
	// pagina was incorrect aangeroepen, direct doorsturen naar login.php
    header("Location:http://poki.nl/my-little-pony ");
  }
?>
