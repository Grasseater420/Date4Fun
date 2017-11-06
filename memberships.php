  <?php
  // include "config.php";
  // function laatMemZien(){
  //   //Connectie met de database
  //   //Functie om membership_prijs te verkrijgen MOET NOG KOMEN
  //   include "config.php";
  //
  //   //De Query om titel en omschrijving te verkijgen
  //   $query = "SELECT membership.membership_id, membership.titel, membership.omschrijving, producten.prijs FROM membership INNER JOIN producten ON producten.membership_id=membership.membership_id";
  //   $result = mysqli_query($db, $query);
  //
  //   //Resultaten naar het scherm
  //   while($row = mysqli_fetch_assoc($result)){
  //       echo "
  //       <div class='membership'>
  //         <h3>".$row['titel']."</h3>
  //         <p>".$row['omschrijving']."</p>
  //         <h2>€".$row['prijs']."</h2>
  //         <button type='button'>In Winkelwagen</button>
  //       </div>
  //     ";
  //   }
  // }
  // laatMemZien();
  // mysqli_close($db)
  ?>
<?php

  include "config.php";

  function renderMemberships() {

    include "config.php";

    $query  = "
      SELECT membership.membership_id, membership.titel, membership.omschrijving, producten.prijs, producten.product_id
      FROM membership
      INNER JOIN producten
      ON producten.membership_id=membership.membership_id
      ";
    $result = mysqli_query($db, $query);

    //Resultaten naar het scherm
    echo "<div class=\"container\"><div class='row'>";
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='col-sm-4'>
        <div class=\"container-fluid\">
          <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
              <h3>" . $row['titel'] . "</h3>
            </div>
            <div class=\"panel-body\" style=\"min-height: 100;\">
              <p>" . $row['omschrijving'] . "</p>
            </div>
            <div class=\"panel-body\" style=\"max-height: 40;\">
              <h4 class=\"text-center\">€" . $row['prijs'] . "</h4>
            </div>
            <div class=\"panel-body\" style=\"min-height: 50;\">
              <div class=\"text-center\">
                <a class=\"btn btn-default\" href=\"./winkelwagen.php?add=" . $row['product_id'] . "\">Winkelmandje</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      ";
    }
    echo "</div></div>";
  }

  mysqli_close($db);

?>
<html>
  <head>
    <?php

      include "header.php";

      renderHead('Date4Fun Memberships');
      renderNavbar();
      renderJumbotron();

    ?>
  </head>
  <body>
    <?php renderMemberships() ?>
  </body>
</html>
