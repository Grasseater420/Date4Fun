<?php
  // functie om table te renderen
  // functie vraagt om een query, aantal colmns en namen.
  function renderTable($query, $aantal, $namen) {

    include "config.php";
    // $query = "SELECT * FROM events";
    $result = mysqli_query($db, $query);

    if (!$result) {
      die("<br> Database query mislukt.");
    }

    $test = array();

    function loopje($loopje) {
      $i = 0;
      while ($i < $loopje) {
        echo $i . ' => $event[$namen[' . $i . ']], ';
        $i++;
      }
    }
echo loopje(count($namen));
    while($event = mysqli_fetch_assoc($result)) {
      $test[] = array(loopje(count($namen))
          // '1'  => $event['titel'],
          // '2'  => $event['omschrijving'],
          // '3'  => $event['locatie']
      );
    }

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

    // Settings
    $width    = 'width="320px"';
    $height   = 'height="480px"';
    $title    = "Events";

    // Temp
    $image1   = 'src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fbasketball.net.au%2Fwp-content%2Fuploads%2F2008%2F04%2Fplaceholder.jpg&f=1"';
    $image2   = 'src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fbasketball.net.au%2Fwp-content%2Fuploads%2F2008%2F04%2Fplaceholder.jpg&f=1"';

    echo "<table $width><tr><th COLSPAN=\"" . count($test) . "\"><br><h2>$title</h2></th></tr>";
    echo " <tr>";

    for ($i=0; $i < count($test); $i++) {
      echo "<th>" . $test[$i]['1'] . "</th>";
    }

    echo "</tr><tr>";

    for ($i=0; $i < count($test); $i++) {
      echo "<td>" . $test[$i]['2'] . "</td>";
    }

    echo "</tr><tr>";

    for ($i=0; $i < count($test); $i++) {
      echo "<td>" . $test[$i]['3'] . "</td>";
    }

    echo "</tr>";

    echo "<tr><td><button type=\"button\">Winkelmandje</button></td><td><button type=\"button\">Winkelmandje</button></td></tr>";
    echo "<tr><td><img $image1 $width $height></td><td><img $image2 $width $height></td></tr></table>";
  }

?>

<html>
  <head>
    <title>Date4Fun Events</title>
  </head>
  <body>
    <h1>Date4Provit</h1>
    <h1>Logo</h1>
    <?php
      $inputQuery = "SELECT * FROM events";
      $inputNamen = array('titel', 'omschrijving', 'locatie');
      $inputAantal = count($inputNamen);

      renderTable($inputQuery, $inputAantal, $inputNamen);
    ?>
  </body>
</html>
