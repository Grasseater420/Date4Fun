<?php
//Connectie met database
include "config.php";

//Functie om foutieve data goed te zetten
function test_data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//If statetement als membership wordt aangepast
if(isset($_POST['aanpassenMem'])){

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['membership_id'])){
    echo "Membership ID moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, test of het een int is
  else{
    $membership_id = test_data($_POST['membership_id']);
    $membership_id = (int)$membership_id;
    //Controleren of hij allen bestaat uit letters en spaties
    if (!is_int($membership_id)) {
      echo "Membership ID moet een heel getal zijn!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['titel'])){
    echo "Titel moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $titel = test_data($_POST['titel']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$titel)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['omschrijving'])){
    echo "Omschrijving moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $omschrijving = test_data($_POST['omschrijving']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$omschrijving)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['prijs'])){
    echo "Prijs moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, test of prijs een kommagetal is
  else{
    $prijs = test_data($_POST['prijs']);
    $prijs = (float)$prijs;
    //Controleren of hij allen bestaat uit letters en spaties
    if (!is_float($prijs)) {
      echo "Prijs moet een getal zijn!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

    //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
    if(empty($_POST['korting'])){
      echo "Korting moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $korting = ($_POST['korting']);
      $korting = (int)$korting;
      //Controleren of hij allen bestaat uit letters en spaties
      if (!is_int($korting)) {
        echo "Korting moet een heel getal zijn, zonder % teken!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
      }
    }

    if(!empty($_POST['membership_id']) && !empty($_POST['titel']) && !empty($_POST['omschrijving']) && !empty($_POST['prijs']) && !empty($_POST['korting'])){
      $query = "UPDATE membership SET titel = '$titel', omschrijving = '$omschrijving', korting = '$korting' WHERE membership.membership_id = $membership_id";
      $result = mysqli_query($db, $query);

      $query = "UPDATE producten SET prijs = '$prijs' WHERE producten.membership_id = $membership_id";
      $result = mysqli_query($db, $query);

      echo "Het membership is aangepast!";
      echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
    }
  }

elseif(isset($_POST['aanpassenEve'])){
  var_dump($_POST['foto']); die();
  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['titel'])){
    echo "Titel moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $titel = test_data($_POST['titel']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$titel)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['omschrijving'])){
    echo "Omschrijving moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $omschrijving = test_data($_POST['omschrijving']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$omschrijving)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['prijs'])){
    echo "Prijs moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, test of prijs een kommagetal is
  else{
    $prijs = test_data($_POST['prijs']);
    $prijs = (float)$prijs;
    //Controleren of hij allen bestaat uit letters en spaties
    if (!is_float($prijs)) {
      echo "Prijs moet een getal zijn!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

    //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
    if(empty($_POST['locatie'])){
      echo "Locatie moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $locatie = test_data($_POST['locatie']);
      //Controleren of hij allen bestaat uit letters en spaties
      if (!preg_match("/^[a-zA-Z ]*$/",$locatie)) {
        echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
      }
    }

    if(empty($_POST['datum'])){
      echo "Datum moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $datum = test_data($_POST['datum']);
    }

    if(!empty($_POST['event_id']) && !empty($_POST['titel']) && !empty($_POST['omschrijving']) && !empty($_POST['prijs']) && !empty($_POST['locatie']) && !empty($_POST['datum'])){
      $query = "UPDATE events SET titel = '$titel', omschrijving = '$omschrijving', locatie = '$locatie', datum = '$datum' WHERE events.event_id = $event_id";
      $result = mysqli_query($db, $query);

      $query = "UPDATE producten SET prijs = '$prijs' WHERE producten.event_id = $event_id";
      $result = mysqli_query($db, $query);

      echo "Het event is aangepast!";
      echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
    }
}

elseif(isset($_POST['toevoegenMem'])){
  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['titel'])){
    echo "Titel moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $titel = test_data($_POST['titel']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$titel)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['omschrijving'])){
    echo "Omschrijving moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $omschrijving = test_data($_POST['omschrijving']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$omschrijving)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['prijs'])){
    echo "Prijs moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, test of prijs een kommagetal is
  else{
    $prijs = test_data($_POST['prijs']);
    $prijs = (float)$prijs;
    //Controleren of hij allen bestaat uit letters en spaties
    if (!is_float($prijs)) {
      echo "Prijs moet een getal zijn!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

    //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
    if(empty($_POST['korting'])){
      echo "Korting moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $korting = ($_POST['korting']);
      $korting = (int)$korting;
      //Controleren of hij allen bestaat uit letters en spaties
      if (!is_int($korting)) {
        echo "Korting moet een heel getal zijn, zonder % teken!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
      }
    }

    if(!empty($_POST['titel']) && !empty($_POST['omschrijving']) && !empty($_POST['prijs']) && !empty($_POST['korting'])){
      $query = "INSERT INTO membership (membership_id, titel, omschrijving, korting) VALUES (NULL, '$titel', '$omschrijving', '$korting')";
      $result = mysqli_query($db, $query);

      $query = "SELECT membership_id FROM membership WHERE titel = '$titel'";
      $result = mysqli_query($db, $query);

      $row = mysqli_fetch_array($result);

      $id = $row['membership_id'];

      $query = "INSERT INTO producten (product_id, prijs, event_id, membership_id) VALUES (NULL, '$prijs', NULL, '$id')";
      $result = mysqli_query($db, $query);

      echo "Het membership is toegevoegd!";
      echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
    }
}

elseif(isset($_POST['toevoegenEve'])){

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['titel'])){
    echo "Titel moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $titel = test_data($_POST['titel']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$titel)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['omschrijving'])){
    echo "Omschrijving moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, via functie test_data foutieve data omzetten tot correcte database
  else{
    $omschrijving = test_data($_POST['omschrijving']);
    //Controleren of hij allen bestaat uit letters en spaties
    if (!preg_match("/^[a-zA-Z ]*$/",$omschrijving)) {
      echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

  //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
  if(empty($_POST['prijs'])){
    echo "Prijs moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
  }
  //Waarde is niet leeg, test of prijs een kommagetal is
  else{
    $prijs = test_data($_POST['prijs']);
    $prijs = (float)$prijs;
    //Controleren of hij allen bestaat uit letters en spaties
    if (!is_float($prijs)) {
      echo "Prijs moet een getal zijn!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
  }

    //Per ingevulde waarde controleren of deze leeg is, zo ja dan error sturen
    if(empty($_POST['locatie'])){
      echo "Locatie moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $locatie = test_data($_POST['locatie']);
      //Controleren of hij allen bestaat uit letters en spaties
      if (!preg_match("/^[a-zA-Z ]*$/",$locatie)) {
        echo "Alleen letters en spaties zijn toegestaan!</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
      }
    }

    if(empty($_POST['datum'])){
      echo "Datum moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }
    //Waarde is niet leeg, test of prijs een kommagetal is
    else{
      $datum = test_data($_POST['datum']);
    }

    if(!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])){
      echo "Foto moet een waarde hebben.</br><a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a><br>";
    }

    if(!empty($_POST['titel']) && !empty($_POST['omschrijving']) && !empty($_POST['prijs']) && !empty($_POST['locatie']) && !empty($_POST['datum']) && file_exists($_FILES['foto']['tmp_name'])){
      $foto = addslashes (file_get_contents($_FILES["foto"]["tmp_name"]));

      $query = "INSERT INTO events (event_id, titel, omschrijving, locatie, datum, foto) VALUES (NULL, '$titel', '$omschrijving', '$locatie', '$datum', '$foto')";
      $result = mysqli_query($db, $query);

      $query = "SELECT event_id FROM events WHERE titel = '$titel'";
      $result = mysqli_query($db, $query);

      $row = mysqli_fetch_array($result);

      $id = $row['event_id'];

      $query = "INSERT INTO producten (product_id, prijs, event_id, membership_id) VALUES (NULL, '$prijs', '$id', NULL)";
      $result = mysqli_query($db, $query);

      echo "Het event is toegevoegd!";
      echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
    }


}

elseif(isset($_POST['verwijderMem'])){
  $membership_id = $_POST['membership_id'];
  $query = "DELETE FROM membership WHERE membership.membership_id = $membership_id";

  $result = mysqli_query($db, $query);

  echo "Het membership is verwijderd!";
  echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
}

elseif(isset($_POST['verwijderEve'])){
  $event_id = $_POST['event_id'];
  $query = "DELETE FROM events WHERE events.event_id = $event_id";

  $result = mysqli_query($db, $query);

  echo "Het event is verwijderd!";
  echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
}

elseif(isset($_POST['verwijderen'])){
  $gebruiker_id = $_POST['gebruiker_id'];
  $query = "SELECT gebruikers.gebruiker_id, gebruikers.voornaam FROM gebruikers WHERE gebruikers.gebruiker_id = $gebruiker_id";
  $result = mysqli_query($db, $query);

  $row = mysqli_fetch_array($result);

  $naam = $row['voornaam'];

  echo "
  <h3>Weet je zeker dat je gebruiker ".$naam." wil verwijderen?</h3>
  <form action='update.php' method='post'>
  <input type='hidden' name='gebruiker_id' value='".$gebruiker_id."'>
  <input type='submit' name='ja' value='Ja'>
  <a href='http://localhost/Date4Fun/testmem.php'>Nee</a>
  </form>";

  echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
}

elseif(isset($_POST['ja'])){
  $id = $_POST['gebruiker_id'];

  $query = "DELETE FROM gebruikers WHERE gebruikers.gebruiker_id = $id";
  $result = mysqli_query($db, $query);

  echo "De gebruiker is verwijderd!";
  echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
}


else{
  echo "Doei.";
}
?>
