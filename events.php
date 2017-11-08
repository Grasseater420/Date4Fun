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

  include "config.php";

  function renderEvents() {

    include "config.php";
    include "getImage.php";

    $query  = "
      SELECT events.event_id, events.titel, events.omschrijving, events.locatie, events.foto, producten.prijs, producten.product_id
      FROM events
      INNER JOIN producten ON events.event_id=producten.event_id
      WHERE NOT events.event_id IN
        (SELECT events.event_id
        FROM events
        LEFT JOIN producten
          ON events.event_id=producten.event_id
        LEFT JOIN bestellingen
          ON events.event_id=bestellingen.product_id
        LEFT JOIN gebruikers
          ON bestellingen.gebruiker_id=gebruikers.gebruiker_id
        WHERE gebruikers.gebruiker_id='" . $_SESSION['gebruikers_id'] . "')
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
