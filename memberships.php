<!DOCTYPE HTML>
<html>
<head>
  <title>Date4Fun</title>
</head>
<body>
  <h1>Date4Fun</h1>
  <h1>Logo</h1>
  <h2>Welkom bij Date4Fun Memberships!</h2>

  <?php
  include "connection.php";
  function laatMemZien(){
    //Connectie met de database
    //Functie om membership_prijs te verkrijgen MOET NOG KOMEN
    include "connection.php";

    //De Query om titel en omschrijving te verkijgen
    $query = "SELECT membership.membership_id, membership.titel, membership.omschrijving, producten.prijs FROM membership INNER JOIN producten ON producten.membership_id=membership.membership_id";
    $result = mysqli_query($db, $query);

    //Resultaten naar het scherm
    while($row = mysqli_fetch_assoc($result)){
        echo "
        <div class='membership'>
          <h3>".$row['titel']."</h3>
          <p>".$row['omschrijving']."</p>
          <h2>€".$row['prijs']."</h2>
          <button type='button'>In Winkelwagen</button>
        </div>
      ";
    }
  }
  laatMemZien();
  mysqli_close($db)
   ?>
</body>
</html>
