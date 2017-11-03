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

  function renderEvents() {
    include "config.php";
    $query = "SELECT * FROM events INNER JOIN producten ON producten.event_id=events.event_id";
    $result = mysqli_query($db, $query);

    if (!$result) {
      die("<br> Database query mislukt.");
    }

    $div_id = 1;

    while($row = mysqli_fetch_assoc($result)){
      echo "
        <div class='event" . $div_id . "'>
          <h3>"         . $row['titel']         . "</h3>
          <p>"          . $row['omschrijving']  . "</p>
          <p>"          . $row['locatie']       . "</p>
          <p>"          . $row['prijs']         . "</p>
          <button type=\"button\">Winkelmandje</button><br>
          <img scr=\""  . $row['foto'] . "\" width=\"320px\" height=\"480px\">
        </div>
      ";
      $div_id++;
    }
  }

?>

<html>
  <head>
    <title>Date4Fun Events</title>
  </head>
  <body>
    <h1>Date4Provit</h1>
    <h1>Logo</h1>
    <?php renderEvents() ?>
  </body>
</html>
