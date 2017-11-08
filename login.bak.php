<?php

  include 'config.php';
  include 'functions_gebruikersessie.php';

  if (!empty($_POST['login'])) {
    $gebruiker  = mysqli_real_escape_string($db, $_POST['gebruikersnaam']);
    $wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);

    $query  = "
      SELECT *
      FROM gebruikers
      WHERE gebruikersnaam ='" . $_POST["gebruikersnaam"] ."'
    ";

    $result = mysqli_query($db, $query) or die("FOUT: " . mysqli_error());
    $row    = mysqli_fetch_assoc($result);
    $hash   = $row['wachtwoord'];

      if(password_verify($wachtwoord, $hash)) {

        if (mysqli_num_rows($result) > 0) {
    			$_SESSION["gebruiker"] = $gebruiker;

          while ($row = mysqli_fetch_assoc($result)) {
            $isAdmin = $row['admin'];
          }

          if ($isAdmin == true) {

            header("Location:admin_page.php");

            // $_SESSION['isAdmin'] = true;
            exit();
          }
          else {
      			$query  = "
              SELECT gebruiker_id
              FROM gebruikers
              WHERE gebruikersnaam = '". $gebruiker ."'
            ";
      			$result = mysqli_query($db, $query);
      			$row    = mysqli_fetch_array($result);
      		  $total  = $row[0];

            logInSessieGebruiker($total);

            $_SESSION['isAdmin'] = false;

            header("Location:profiel.php?id=".$total."");

            exit();
          }
        }
    }
    else {

      $error_msg  = "
        De combinatie van gebruikersnaam en wachtwoord is <b>onjuist</b>.<br><br>
        <button type=\"submit\" class=\"btn btn-default\">Login</button>
        <a class=\"btn btn-default\" href=\"./registreren.php\">Registreren</a>
        <a class=\"btn btn-default pull-right\" href=\"./wachtwoordvergeten.php?gebruiker=" . $gebruiker . "\">Wachtwoord vergeten?</a>
      ";

      $script     = "<script> $(document).ready(function(){ $('#loginModal').modal('show'); }); </script>";
    }
  }
?>
