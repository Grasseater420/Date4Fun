<?php

  ////
  // Kyle's eerste poging tot renderEvents()
  //
  // $test = array();
  //
  // while($event = mysqli_fetch_assoc($result)) {
  //   $test[] = array(
  //       'titel'         => $event['titel'],
  //       'omschrijving'  => $event['omschrijving'],
  //       'locatie'       => $event['locatie']
  //   );
  // }
  //
  // echo $test[0]['titel'];
  // echo "<br>";
  // echo $test[0]['omschrijving'];
  // echo "<br>";
  // echo $test[0]['locatie'];
  // echo "<br><br>";
  //
  // echo $test[1]['titel'];
  // echo "<br>";
  // echo $test[1]['omschrijving'];
  // echo "<br>";
  // echo $test[1]['locatie'];
  // echo "<br><br>";
  ////

  ////
  // ░░░░░░░░░░░▄▄▄▄▄
  // ░░░░░░░▄▄█████████▄▄
  // ░░░░▄▀▀▀▀█▀▀▀▀▀▀█████▄
  // ░░▄██████░░░░░░░░░░░▀██
  // ░▐██████▌░░░░░░░░░░░░░▐▌
  // ░███████▌░░░░░░░░░░░░░░█
  // ▐████████░░░░░░░░░░░░░░░█
  // ▐██████▌░░░░░▄▀▀▀▀▀▄░▀░▄▄▌
  // ░█▀▀███▀░░░░░░▄▀█▀░░░▐▄▄▄▌
  // ▐░▌▀▄░░░░░░░░░░▄▄▄▀░░░▌▀░▌
  // ░▌▐░░▌░░░░░░░░░░░▀░░░░▐░▐
  // ░▐░▀▄▐░░░░░░░░░░░▌▌░▄▄░▐░▌
  // ░░▀█░▄▀░░░░░░░░░▐░▐▄▄▄▄▀▐
  // ░░░▌▀░▐░░░░░░░░▄▀░░▀▀▀▀░▌             NiCe!
  // ░░░▐░░░░░░░░░▌░░░▄▀▀▀▀▄▐
  // ░░░▌░░░░░░░░░▐░░░░░▄▄░░▌
  // ░░█▀▄░░░▐░▐░░░░░░░░░░░█
  // ░█░█░▀▀▄░▌░█░░░▀▀▄▄▄▄▀
  // █░░░▀▄░░▀▀▄▄█░░░░░▄▀
  // ░░░░░░▀▄░░░░▀▀▄▄▄▀▐
  // █░░░░░░░▀▄░░░░░▐░▌▐
  // ░█░░░░░░░░▀▄░░░▌░▐▌▐
  // ░░█░░░░░░░░░█░▐░▄▄▌░█▀▄
  // ░░░█░░░░░░░░░█▌▐░▄▐░░▀▄▀▀▄▄
  // ░░░░█░░░░░░░░░▀▄░░▐░░░▀▄░░░▀▀▄▄
  // ░░░░░▀▄░▄▀█░░░░░█░░▌░░░░▀▄░░░░░█
  ////
  error_reporting(0);

  session_start();
  if ($_SESSION['gebruikers_id'] == NULL) {
     header("Location:index.php");
  }

  if ($_SESSION['membership'] == "Gratis") {
    header("Location:memberships.php");
  }

  include "config.php";

  function renderEvents() {

    include "config.php";
    include "getImage.php";

    $query  = "
      SELECT *
      FROM events
      INNER JOIN producten
	      ON events.event_id=producten.event_id
        WHERE NOT events.event_id IN
          (SELECT event_id
          FROM producten
          INNER JOIN bestellingen
            ON bestellingen.product_id=producten.product_id
          WHERE bestellingen.gebruiker_id='". $_SESSION['gebruikers_id'] . "'
          AND producten.event_id IS NOT NULL)
        ";

    $result = mysqli_query($db, $query);

    if (!$result) {
      die("<br> Database query mislukt.");
    }

    echo "<div class=\"container\"><div class='row'>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "
      <div class='col-sm-6'>
        <div class=\"container-fluid\">
          <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
              <h3>" . $row['titel'] . "</h3>
            </div>
            <div class=\"panel-body\" style=\"min-height: 100;\">
              <p>" . $row['omschrijving'] . "</p>
            </div>
            <div class=\"panel-body\" style=\"max-height: 40;\">
              <h4 class=\"text-center\">€ " . $row['prijs'] . "</h4>
            </div>
            <div class=\"panel-body\" style=\"min-height: 50;\">
              <div class=\"text-center\">
                <a class=\"btn btn-default\" href=\"./winkelwagen.php?add=" . $row['product_id'] . "\">Winkelmandje</a>
              </div>
            </div>
            <div class=\"container-fluid\">
              <div class=\"thumbnail\">
                  " . showEventFoto($row['event_id'],'events') . "
                  <div class=\"caption\" style=\"text-align:center;\">
                    <h5>" . $row['locatie'] . "</h5>
                  </div>
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

      renderHead('Date4Fun Events');
      renderNavbar();
      // renderJumbotron();

    ?>
  </head>
  <body>
    <?php renderEvents() ?>
  </body>
</html>
