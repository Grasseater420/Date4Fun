<form action="login.php" method="POST">
  <label><b>Gebruikersnaam</b></label><br>
  <input type="text" maxlength="20" placeholder="gebruikersnaam" name="gebruikersnaam" required><br>

  <label><b>Wachtwoord</b></label><br>
  <input type="password" maxlength="20" placeholder="wachtwoord" name="wachtwoord" required><br>

  <button type="submit">Login</button>
</form>

<?php

  if (!$_GET) {
  }
  elseif ($_GET["poging"] == "fout") {
    echo "De combinatie van gebruikersnaam en wachtwoord is <b>onjuist</b>." . "<br>" . "Nog geen account? Klik " . "<a href=\"registreerForm.php\">hier</a>" . " om te registreren";
  }

?>
