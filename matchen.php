<?php

  session_start();

  ////// Neireau:
  //
  // Het starten van een sessie genereerd een notice, geen foutmelding dus,
  // maar die willen we natuurlijk niet tonen vandaar onderstaande regel.
  //
  //////

  error_reporting(0);

  ////// Neireau:
  //
  // Als een bezoeker niet is ingelogd werkt de Events pagina niet, dit komt
  // doordat het script de gebruiker identifiseerd vanuit de sessie, om dit te
  // voorkomen is besloten dat de pagina niet zichtbaar is wanneer je niet bent
  // ingelogd, ofwel wanneer er geen sessie is.
  //
  // In het initiële plan haddden memberships nog geen functie, gaandeweg het
  // project is besloten dat de site zonder membershit niet gebruikt kan worden.
  // Het tweede script controleerd dus of de membership-status 'Gratis' is, is
  // dit het geval wordt je verwezen naar de pagina Memberships.
  //
  //////

  if ($_SESSION['gebruikers_id'] == NULL) {
     header("Location:index.php");
  }

  if ($_SESSION['membership'] == "Gratis") {
    header("Location: memberships.php");
  }

  ////// Neireau:
  //
  // De Events pagina maakt gebruik van de functie 'showProfielFoto' welke in
  // 'getImage.php' is uitgewerkt. De functie haalt de afbeeldingen op uit de
  // database en maakt gebruik van de standaard functie base64_encode().
  // In 'config.php' staan de database credentials opgeslagen zodat deze niet
  // constant overgenomen hoeven te worden.
  //
  //////

  include "config.php";
  include "getImage.php";

  ////// Neireau:
  //
  // Onderstaande functie wordt in de body aangeroepen om de content te genereren,
  // ik heb de functie van comments voorzien zodat dit voor ieder leesbaar zou
  // moeten zijn.
  //
  //////

  function renderMatch() {

    include 'config.php';

    ////// Neireau:
    //
    // Eerste poging om te matchen op basis van geslacht en interesse.
    // Deze code is inmiddels obsolete omdat ik alles in één query heb weten te
    // krijgen. Ik heb de code laten staan zodat mijn eigen progressie zichtbaar
    // is.
    //
    //////
    //
    // $query  = "
    //   SELECT profielen.geintereseerd, gebruikers.geslacht
    //   FROM gebruikers
    //   INNER JOIN profielen
    //   ON gebruikers.gebruiker_id=profielen.gebruikers_id
    //   WHERE gebruikers.gebruiker_id = '" . $_SESSION['gebruikers_id'] . "'
    //   ";
    // $result = mysqli_query($db, $query) or die("FOUT: " . mysqli_error());
    //
    // while ($row = mysqli_fetch_assoc($result)) {
    //   $geintereseerd  = $row['geintereseerd'];
    //   $geslacht       = $row['geslacht'];
    // }
    //
    // $query2  = "
    //   SELECT profielen.gebruikers_id, gebruikers.voornaam, profielen.foto, profielen.overmij
    //   FROM `gebruikers`
    //   INNER JOIN profielen
    //   ON gebruikers.gebruiker_id=profielen.gebruikers_id
    //   WHERE gebruikers.geslacht='" . $geintereseerd . "'
    //   AND profielen.geintereseerd='" . $geslacht . "'
    //   ";
    // $result2 = mysqli_query($db, $query2) or die("FOUT: " . mysqli_error());
    //
    //////

    ////// Neireau:
    //
    // Deze query bestaat uit drie componenten; ik moet mijn eigen geslacht uit
    // de tabel gebruikers weten, vervolgens mijn interesse uit de tabel
    // profielen. Wanneer ik deze beide gegevens heb in de sub-query kan ik
    // door gebruikers en profielen te joinen alleen de kandidaten opvragen
    // die geintereseerd zijn in mijn geslacht en waarvan het geslacht overeen
    // komt met mijn interesse.
    //
    //////

    $query = "
      SELECT profielen.gebruikers_id, gebruikers.voornaam, profielen.foto, profielen.overmij
      FROM gebruikers
      INNER JOIN profielen
        ON gebruikers.gebruiker_id=profielen.gebruikers_id
        WHERE profielen.geintereseerd IN
          (SELECT gebruikers.geslacht
          FROM gebruikers
            WHERE gebruikers.gebruiker_id='" . $_SESSION['gebruikers_id'] . "')
        AND gebruikers.geslacht=profielen.geintereseerd IN
          (SELECT profielen.geintereseerd
          FROM gebruikers
          LEFT JOIN profielen
            ON gebruikers.gebruiker_id=profielen.gebruikers_id)
        AND NOT gebruikers.gebruiker_id='" . $_SESSION['gebruikers_id'] . "'
      ";
    $result = mysqli_query($db, $query) or die("FOUT: " . mysqli_error());

    ////// Neireau:
    //
    // Onderstaande functie heb ik in eerste instantie geschreven voor Events,
    // uiteindelijk heb ik hem daar niet gebruikt maar gelukkig had ik hem wel
    // bewaard.
    // De while() loop maakt een associative array waarin de id voor profiel,
    // en voornaam, foto en overmij om te tonen, worden opgeslagen.
    //
    //////

    while ($row = mysqli_fetch_assoc($result)) {
      $test[] = array(
          'id'            => $row['gebruikers_id'],
          'voornaam'      => $row['voornaam'],
          'foto'          => $row['foto'],
          'overmij'       => $row['overmij']
      );
    }

    ////// Neireau:
    //
    // Met de standaard functie rand_id() haal ik uiteindelijk twee geschikte,
    // willekeurige kandidaten op die getoond gaan worden.
    //
    //////

    $rand_id = array_rand ($test, 2);

    ////// Neireau:
    //
    // Onderstaande while() loop genereerd de daadwerkelijke content van de
    // pagina. We hebben besloten twee profielen naast elkaar te tonen, buiten
    // de loop wordt de container gegenereerd, daarbinnen wordt per $i een
    // colom geschreven. $i Start bij nul omdat ik met een array() werk, deze
    // starten altijd bij nul. Aan het einde van de colom wordt $i met één opgehoogd
    // en de loop stopt wanneer $i één is, ofwel wanneer er twee colommen zijn.
    //
    //////

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

    ////// Neireau:
    //
    // 'header.php' Bevat een aantal functie die ik heb geschreven, deze functies
    // worden op elke pagina gebruikt:
    //
    //////

    include "header.php";

    ////// Neireau:
    //
    // De eerste functie, renderHead($titel), genereerd de <head> met daarin de
    // verwijzingen naar Bootstrap en de <title> van de pagina, de titel kan wordt
    // als variable mee gegeven.
    // De daarop volgende functie, renderNavbar(), genereerd de navigatie balk die
    // op elke pagina zichtbaar is, afhankelijk of je bent ingelogd en of je
    // gebruiker danwel admin bent, worden er verschilende versies van de navbar
    // getoond.
    // De laatste functie, renderJumbotronMatchen(), is specifiek voor deze pagina
    // geschreven. De code is grotendeels overgenomen van renderJumbotron(), een
    // andere functie die ik heb geschreven die op andere pagina's aangeroepen
    // kan worden, en bevat een extra knop om twee nieuwe matches te genereren.
    //
    //////

    renderHead('Date4Fun Matchen');
    renderNavbar();
    renderJumbotronMatchen();

  ?>
  <link rel="stylesheet" href="./stylesheet.css">
</head>
  <body>
    <?php

      renderMatch();

    ?>
  </body>
</html>
