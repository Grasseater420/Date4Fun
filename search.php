<?php
include "config.php";
$output = "";
if(isset ($_POST['searchVal'])){
  $searchq = $_POST['searchVal'];

  $query = "SELECT gebruikers.voornaam, gebruikers.tussenv, gebruikers.achternaam, gebruikers.gebruikersnaam, gebruikers.email, gebruikers.geboortedatum FROM gebruikers INNER JOIN profielen ON profielen.gebruikers_id=gebruikers.gebruiker_id WHERE gebruikers.gebruikersnaam LIKE '%$searchq%'";
  $result = mysqli_query($db, $query);

  $count = mysqli_num_rows($result);
  if ($count == 0){
    $output = "There was no search results!";
  }

  else {
    while ($row = mysqli_fetch_array($result)){
      $fname = $row['voornaam'];
      $tussenv = $row['tussenv'];
      $lname = $row['achternaam'];
      $gebnaam = $row['gebruikersnaam'];
      $email = $row['email'];
      $geboorte = $row['geboortedatum'];

      $output .= "<div>Naam: ".$fname." ".$tussenv." ".$lname."<br>Gebruikersnaam: ".$gebnaam."<br>E-mail: ".$email."<br>Geboortedatum: ".$geboorte."<br><button type='button' class='btn btn-default' class='btn btn-primary'>Profiel</button> <button type='button' class='btn btn-default' class='btn btn-primary'>Verwijderen</button><hr></div>";
    }
  }
}
echo ($output);
?>
