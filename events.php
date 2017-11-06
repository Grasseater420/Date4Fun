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

  function renderEvents() {
    include "config.php";
    $query    = "SELECT * FROM events INNER JOIN producten ON producten.event_id=events.event_id";
    $result   = mysqli_query($db, $query);

    if (!$result) {
      die("<br> Database query mislukt.");
    }

    ////
    // Genereer Bootstrap
    //
    echo "<div class=\"container\"><div class='row'>";
    //
    // Maakt container aan waar beide events in getoond worden
    //
    while ($row = mysqli_fetch_assoc($result)) {
      //
      // De som van alle kolommen moet twaalf zijn, omdat het twee events
      // zijn gebruiken we 'col-sm-6' (12 / 2 = 6)
      //
      echo "<div class='col-sm-6'>
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
                      <button type=\"button\">Winkelmandje</button><br>
                    </div>
                  </div>
                  <div class=\"container-fluid\">
                    <div class=\"thumbnail\">
                      <a href=\"" . $row['foto'] . "\">
                        <img src=\"" . $row['foto'] . "\" class=\"img-responsive\">
                        <div class=\"caption\">
                          <h5>" . $row['locatie'] . "</h5>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
    }
    echo "</div></div>";
  }

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
