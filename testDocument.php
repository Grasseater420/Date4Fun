<?php

  function renderEvenementen() {

    include "config.php";
    include "getImage.php";

    $query = "
      SELECT *
      FROM events
      LEFT JOIN producten
      	ON events.event_id=producten.event_id
      LEFT JOIN bestellingen
      	ON events.event_id=bestellingen.product_id
      LEFT JOIN gebruikers
      	ON bestellingen.gebruiker_id=gebruikers.gebruiker_id
      WHERE gebruikers.gebruiker_id='29'
      ";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $evenementen[] = array(
          'id'       => $row['event_id'],
          'titel'    => $row['titel'],
          'datum'    => $row['datum'],
          'foto'     => $row['foto'],
          'locatie'  => $row['locatie']
      );
    }

    static $i = 0;
    // var_dump($evenementen[$i]['id']);
    while ($i < count($evenementen)) {
      echo "
        <div class=\"col-md-4\">
          <div class=\"thumbnail\">
            " . showEventFoto($evenementen[$i]['id'],'profiel') . "
            <div class=\"caption\">
              <h3>
                " . $evenementen[$i]['titel'] . "
              </h3>
              <p>
                " . $evenementen[$i]['locatie'] . "
              </p>
                " . $evenementen[$i]['datum'] . "
              <p>
                Test
              </p>
            </div>
          </div>
        </div>
        ";
      $i++;
    }
    if ($i < 3) {
      while ($i < 3) {
        echo "
          <div class=\"col-md-4\">
            <div class=\"thumbnail\">
              <img alt=\"300x200\" src=\"http://lorempixel.com/600/200/people\">
              <div class=\"caption\">
                <h3>
                  Geen evenementen
                </h3>
                <p>
                  Geen locatie
                </p>
                  Geen datum
                <p>
                  Test
                </p>
              </div>
            </div>
          </div>
          ";
          $i++;
      }
    }
  }

  renderEvenementen();

 ?>
