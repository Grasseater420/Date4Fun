<?php

  session_start();
  include('config.php');

  if (!empty($_POST)) {
    $gebruiker  = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $query      = "SELECT * FROM gebruikers WHERE gebruikersnaam ='" . $_POST["gebruikersnaam"] ."'AND wachtwoord='" . $_POST["wachtwoord"] ."'";
    $result     = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

    if (mysqli_num_rows($result) > 0) {
      $_SESSION["auth"]      = true;
      $_SESSION["timeout"]   = time() + 120;
			$_SESSION["gebruiker"] = $gebruiker;

			//ToDo:
			//Pull gebruiker ID uit database en zet die in sessie

      while ($row = mysqli_fetch_assoc($result)) {
        $isAdmin = $row['admin'];
      }

      if ($isAdmin == true) {
        echo "Je bent Admin";
        exit();
      }
      else {
        echo "Je bent Gebruiker";
        exit();
      }

    }
    else {
      die(header("Location:loginForm.php?poging=fout"));
    }

  }
  else {
    header("Location:loginForm.php");
  }

?>
