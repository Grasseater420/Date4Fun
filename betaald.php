<?php
  include "config.php";

  session_start();

  $gebruiker_id = $_POST['gebruiker_id'];
  $product_id = $_POST['product_id'];

  $query = "INSERT INTO bestellingen (gebruiker_id, product_id, besteldatum) VALUES ('$gebruiker_id', '$product_id', '".date('Y-m-d')."')";
  $result = mysqli_query($db, $query);

  $_SESSION['winkelwagen'] = 0;

  echo "U heeft betaald! Bedankt voor de bestelling.";
  echo "<a href='http://localhost/Date4Fun/profiel.php?id=".$gebruiker_id."'>Terug naar je profiel.</a>";
 ?>
