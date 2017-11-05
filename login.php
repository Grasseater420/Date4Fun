<?php

  include('config.php');
  include('functions_gebruikersessie.php'); // Jim's sessie script



  if (!empty($_POST)) {
    $gebruiker  = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
    $query      = "SELECT * FROM gebruikers WHERE gebruikersnaam ='" . $_POST["gebruikersnaam"] ."'AND wachtwoord='" . $_POST["wachtwoord"] ."'";
    $result     = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

    if (mysqli_num_rows($result) > 0) {
      //$_SESSION["auth"]      = true;
      //$_SESSION["timeout"]   = time() + 120;
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
        //GebruikersID verkrijgen
  			$query = "SELECT gebruiker_id FROM `gebruikers` WHERE gebruikersnaam = '".$gebruiker."'";
  			$result = mysqli_query($db, $query);

  			$row = mysqli_fetch_array($result);

  		  $total = $row[0];

        //Sessie starten (zie functions_gebruikersessie.php
        //@Param gebruiker_ID


       logInSessieGebruiker($total);
               var_dump($_SESSION);
        exit();





        header("Location:profiel.php?id=".$total."");
        exit();
      }

    }
    else {
      // die(header("Location:header.php?poging=fout"));
      $error_msg = "<div class=\"loginModal\">
                      De combinatie van gebruikersnaam en wachtwoord is <b>onjuist</b>.<br><br>
                    </div>";
      $script =  "<script> $(document).ready(function(){ $('#loginModal').modal('show'); }); </script>";
    }

  }
  else {
    header("Location:loginForm.php");
  }

?>
