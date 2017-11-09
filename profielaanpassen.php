<?php
session_start();
include "config.php";

$query = "SELECT * FROM profielen WHERE gebruikers_id = '".$_SESSION['gebruikers_id']."';";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_assoc($result);
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
  $oudEtni = $row['etniciteit'];
  $oudLichaam = $row['lichaam'];
  $etni = $_POST['etniAanpassen'];
  $lichaam = $_POST['lichaamAanpassen'];


  if(empty($etni) && !empty($lichaam)){
    $query = "UPDATE profielen SET etniciteit='".$oudEtni."', lichaam='".$lichaam."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }
  elseif(empty($lichaam && !empty($etni))){
    $query = "UPDATE profielen SET etniciteit='".$etni."', lichaam='".$oudLichaam."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }
  elseif(empty($lichaam) && empty($etni)){
    echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
    header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
  }
  elseif(!empty($lichaam) && !empty($etni)){
    $query = "UPDATE profielen SET etniciteit='".$etni."', lichaam='".$lichaam."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }
  
  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
}

elseif(isset($_POST['gewoonsubmit'])){
  $oudRoken = $_POST['roken'];
  $oudDrinken = $_POST['drinken'];
  $roken = $_POST['rookAanpassen'];
  $drinken = $_POST['drinkAanpassen'];

  if(empty($roken) && !empty($drinken)){
    $query = "UPDATE profielen SET roken='".$oudRoken."', drinken='".$drinken."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }
  elseif(empty($drinken && !empty($roken))){
    $query = "UPDATE profielen SET roken='".$roken."', drinken='".$oudDrinken."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }
  elseif(empty($roken) && empty($drinken)){
    echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
    header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
  }
  else{
    $query = "UPDATE profielen SET roken='".$roken."', drinken='".$drinken."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
    $result = mysqli_query($db, $query);
  }

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

  if(empty($overmij)){
    echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
    header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
  }
  else{
  $query = "UPDATE profielen SET overmij='".$overmij."' WHERE gebruikers_id='".$_SESSION['gebruikers_id']."'";
  $result = mysqli_query($db, $query);

  echo "Je profiel is aangepast! Je keer terug naar je profiel over 2 seconden.";
  header( "refresh:2;url=./profiel.php?id=".$_SESSION['gebruikers_id']."" );
  }
}


 ?>
