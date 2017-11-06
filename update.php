<?php
include "config.php";
$titel = $_POST['titel'];
$prijs = $_POST['prijs'];
$omschrijving = $_POST['omschrijving'];
$korting = $_POST['korting'];
if(isset($_POST['aanpassenMem'])){
  $membership_id = $_POST['membership_id'];
  $query = "UPDATE membership SET titel = '$titel', omschrijving = '$omschrijving', korting = '$korting' WHERE membership.membership_id = $membership_id";
  $result = mysqli_query($db, $query);

  $query = "UPDATE producten SET prijs = '$prijs' WHERE producten.membership_id = $membership_id";
  $result = mysqli_query($db, $query);

  echo "Het membership is aangepast!";
  echo "<a href='http://localhost/Date4Fun/testmem.php'>Terug naar admin</a>";
}

elseif(isset($_POST['toevoegenMem'])){
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


else{
  echo "Doei.";
}
 ?>
