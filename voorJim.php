  <?php

    function VervalDatum($id) {

      include "config.php";

      $query = "
        SELECT bestellingen.besteldatum
        FROM bestellingen
        LEFT JOIN gebruikers ON bestellingen.gebruiker_id=gebruikers.gebruiker_id
        LEFT JOIN producten ON bestellingen.product_id=producten.product_id
        WHERE producten.event_id IS NULL
        AND gebruikers.`gebruiker_id`='" . $id . "'
      ";

      $result = mysqli_query($db, $query) or die("FOUT: " . mysqli_error());

      while ($row = mysqli_fetch_assoc($result)) {
        echo $row['besteldatum'] . "<br>";
      }
    }

    VervalDatum(29)

  ?>
