<?php
session_start();
include "config.php";
if(isset($_POST['man'])){
  $query = "UPDATE profielen SET geintereseerd='Man' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['vrouw'])){
  $query = "UPDATE profielen SET geintereseerd='Vrouw' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['uiterlijksubmit'])){
  $etni = $_POST['etniAanpassen'];
  $lichaam = $_POST['lichaamAanpassen'];
  $query = "UPDATE profielen SET etniciteit='".$etni."', lichaam='".$lichaam."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['gewoonsubmit'])){
  $roken = $_POST['rookAanpassen'];
  $drinken = $_POST['drinkAanpassen'];
  $query = "UPDATE profielen SET roken='".$roken."', drinken='".$drinken."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['filmmuzieksubmit'])){
  $film = $_POST['filmAanpassen'];
  $muziek = $_POST['muziekAanpassen'];
  $query = "UPDATE profielen SET favorietefilm='".$film."', favorietemuziek='".$muziek."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";

  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['overmijsubmit'])){
  $overmij = $_POST['overmij'];
  $query = "UPDATE profielen SET overmij='".$overmij."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";

  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}


 ?>
