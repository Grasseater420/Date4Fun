<?php

  session_start();
  error_reporting(0);
  
          if ($_SESSION['gebruikers_id'] == NULL)
        {
            
             header("Location:index.php");
        }
               if ($_SESSION['membership'] == "Gratis")
{
    header("Location: memberships.php");
}
        
        

  include "config.php";
  include "getImage.php";
  // var_dump($_SERVER['PHP_SELF']);
  function renderMatch() {

    include 'config.php';

    // Eerst moeten we onze eigen interesse weten.
    $query  = "
      SELECT profielen.geintereseerd, gebruikers.geslacht
      FROM gebruikers
      INNER JOIN profielen
      ON gebruikers.gebruiker_id=profielen.gebruikers_id
      WHERE gebruikers.gebruiker_id = '" . $_SESSION['gebruikers_id'] . "'
      ";
    $result = mysqli_query($db, $query) or die("FOUT: " . mysqli_error());

    while ($row = mysqli_fetch_assoc($result)) {
      $geintereseerd  = $row['geintereseerd'];
      $geslacht       = $row['geslacht'];
    }

    // Nu hebben we kandidaten nodig.
    $query2  = "
      SELECT profielen.gebruikers_id, gebruikers.voornaam, profielen.foto, profielen.overmij
      FROM `gebruikers`
      INNER JOIN profielen
      ON gebruikers.gebruiker_id=profielen.gebruikers_id
      WHERE gebruikers.geslacht='" . $geintereseerd . "'
      AND profielen.geintereseerd='" . $geslacht . "'
      ";
    $result2 = mysqli_query($db, $query2) or die("FOUT: " . mysqli_error());

    while ($row = mysqli_fetch_assoc($result2)) {
      $test[] = array(
          'id'            => $row['gebruikers_id'],
          'voornaam'      => $row['voornaam'],
          'foto'          => $row['foto'],
          'overmij'       => $row['overmij']
      );
    }

    // Genereer random shit.
    $rand_id = array_rand ($test, 2);
    // echo $test[$rand_id[0]]['id'] . "<br>";
    // echo $test[$rand_id[1]]['id'];
    $i = 0;
    echo "<div class=\"container\"><div class=\"row equal\">";
    while ($i < 2) {
      echo "
        <div class='col-sm-6'>
          <div class=\"container-fluid\">
            <div class=\"panel panel-default\">
              <div class=\"panel-heading\">
                <h3>" . $test[$rand_id[$i]]['voornaam'] . "<a class=\"btn btn-default pull-right\" href=\"./profiel.php?id=" . $test[$rand_id[$i]]['id'] . "\">Profiel</a></h3>
              </div>
              <div class=\"panel-body\" style=\"min-height: 230px; text-align: center;\">
                " . showProfielFoto($test[$rand_id[$i]]['id'], 'matchen') . "
              </div>
              <div class=\"panel-footer\">
                <p>" . $test[$rand_id[$i]]['overmij'] . "</p>
              </div>
            </div>
          </div>
        </div>
        ";

      $i++;
    }
    echo "</div></div>";
  }

?>


<html>
<head>
  <?php

    include "header.php";

    renderHead('Date4Fun Matchen');
    renderNavbar();
    renderJumbotron();

  ?>
  <link rel="stylesheet" href="./stylesheet.css">
</head>
  <body>
    <?php

      renderMatch();

    ?>
    <script>

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close0")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    </script>
  </body>
</html>
