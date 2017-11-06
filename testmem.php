<!DOCTYPE HTML>
<html>
<head>
  <!--<link rel="stylesheet" type="text/css" href="stylesheet.css">-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Date4Fun Admin</title>
  <link rel="stylesheet" type="text/css" href="css.css">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
  function searchq(){
    var searchTxt = $("input[name='search']").val();

    $.post("search.php", {searchVal: searchTxt}, function (output){
      $("#output").html(output);


    });
  }
  </script>
</head>
<body>
  <?php
  include "header.php";
  include "connection.php";
  function laatMemZien(){
    //Connectie met de database
    //Functie om membership_prijs te verkrijgen MOET NOG KOMEN
    include "connection.php";

    //De Query om titel en omschrijving te verkijgen
    $query = "SELECT membership.membership_id, membership.titel, membership.omschrijving, membership.korting, producten.prijs FROM membership INNER JOIN producten ON producten.membership_id=membership.membership_id";
    $result = mysqli_query($db, $query);

    //Resultaten naar het scherm
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='col-sm-3'>
      <div class='card' style='width: 40rem;'>
      <div class='card-body'>
      <h4 class='card-title'>".$row['titel']."</h4>
      <h6 class='card-subtitle mb-2 text-muted'>€".$row['prijs']."</h6>
      <h6 class='card-subtitle mb-2 text-muted'>".$row['korting']."% korting</h6>
      <p class='card-text'>".$row['omschrijving']."</p>
      <h7 class='card-text'>ID = ".$row['membership_id']."</h7>
      <p>
      <button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#".$row['titel']."Collapse' aria-expanded='false' aria-control='".$row['titel']."Collapse'>
      Aanpassen
      </button>
      </p>
      <div class='collapse' id='".$row['titel']."Collapse'>
      <div class='card card-body'>
      <form action='update.php' method='post'>
      <table>
      <tr><td>Membership ID:</td><td> <input type='number' name='membership_id' value='".$row['membership_id']."'></td></tr>
      <tr><td>Titel van membership:</td><td> <input type='text' name='titel'></td></tr>
      <tr><td>Omschrijving van membership:</td><td> <input type='text' name='omschrijving'></td></tr>
      <tr><td>Prijs van membership in euros:</td><td> <input type='number' name='prijs' step='.01'></td></tr>
      <tr><td>Korting van membership in procenten:</td><td> <input type='number' name='korting'></td></tr>
      <tr><td><input type='submit' name='aanpassenMem' value='Pas aan'></td></tr>
      </table>
      </form>
      </div>
      </div>
      </div>
      </div>
      </div>
      ";
    }
  }

  function laatEventZien(){
    //Connectie met de database
    //Functie om membership_prijs te verkrijgen MOET NOG KOMEN
    include "connection.php";

    //De Query om titel en omschrijving te verkijgen
    $query = "SELECT * FROM events INNER JOIN producten ON producten.event_id=events.event_id";
    $result = mysqli_query($db, $query);

    //Resultaten naar het scherm
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='col-sm-6'>
      <div class='card' style='width: 40rem;'>
      <div class='card-body'>
      <h4 class='card-title'>".$row['titel']."</h4>
      <h6 class='card-subtitle mb-2 text-muted'>€".$row['prijs']."</h6>
      <h6 class='card-subtitle mb-2'>".$row['locatie']."</h6>
      <h6 class='card-subtitle mb-2'>".$row['datum']."</h6>
      <p class='card-text'>".$row['omschrijving']."</p>
      <p>
      <button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#".$row['event_id']."Collapse' aria-expanded='false' aria-control='".$row['event_id']."Collapse'>
      Aanpassen
      </button>
      </p>
      <div class='collapse' id='".$row['event_id']."Collapse'>
      <div class='card card-body'>
      <form>
      <table>
      <tr><td>Titel van event:</td><td> <input type='text' name='titel'></td></tr>
      <tr><td>Beschrijving van event:</td><td> <input type='text' name='beschrijving'></td></tr>
      <tr><td>Prijs van event in euros:</td><td> <input type='number' name='prijs' step='.01'></td></tr>
      <tr><td>Locatie van event:</td><td> <input type='text' name='locatie'></td></tr>
      <tr><td>Datum van event:</td><td> <input type='date' name='datum'></td></tr>
      <tr><td><input type='submit' name='aanpassen' value='Pas aan'></td></tr>
      </table>
      </form>
      </div>
      </div>
      </div>
      </div>
      </div>
      ";
    }
  }

  function laatGebZien(){
    include "config.php";

    $query = "SELECT gebruikers.voornaam, gebruikers.tussenv, gebruikers.achternaam, gebruikers.gebruikersnaam, gebruikers.email, gebruikers.geboortedatum FROM gebruikers INNER JOIN profielen ON profielen.gebruikers_id=gebruikers.gebruiker_id";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)){
      echo "Naam: ".$row['voornaam']." ".$row['tussenv']." ".$row['achternaam']."<br>Gebruikersnaam: ".$row['gebruikersnaam']."<br>E-mail: ".$row['email']."<br>Geboortedatum: ".$row['geboortedatum']."<br><button type='button' class='btn btn-default' class='btn btn-primary'>Profiel</button> <button type='button' class='btn btn-default' class='btn btn-primary'>Verwijderen</button><hr>";
    }
  }

  function laatBestelMemberZien(){
    include "config.php";

    $query = "SELECT gebruikers.gebruikersnaam, gebruikers.voornaam, gebruikers.tussenv, gebruikers.achternaam, bestellingen.product_id, bestellingen.besteldatum, membership.titel FROM gebruikers INNER JOIN bestellingen ON gebruikers.gebruiker_id=bestellingen.gebruiker_id INNER JOIN producten ON producten.product_id=bestellingen.product_id INNER JOIN membership ON producten.membership_id=membership.membership_id";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)){
      echo "Naam: ".$row['voornaam']." ".$row['tussenv']." ".$row['achternaam']."<br>Gebruikersnaam: ".$row['gebruikersnaam']."<br>Product-ID: ".$row['product_id']."<br>Besteldatum: ".$row['besteldatum']."<br>Titel: ".$row['titel']."<hr>";
    }
  }

  function laatBestelEventsZien(){
    include "config.php";

    $query = "SELECT gebruikers.gebruikersnaam, gebruikers.voornaam, gebruikers.tussenv, gebruikers.achternaam, bestellingen.product_id, bestellingen.besteldatum, events.titel FROM gebruikers INNER JOIN bestellingen ON gebruikers.gebruiker_id=bestellingen.gebruiker_id INNER JOIN producten ON producten.product_id=bestellingen.product_id INNER JOIN events ON producten.event_id=events.event_id";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)){
      echo "Naam: ".$row['voornaam']." ".$row['tussenv']." ".$row['achternaam']."<br>Gebruikersnaam: ".$row['gebruikersnaam']."<br>Product-ID: ".$row['product_id']."<br>Besteldatum: ".$row['besteldatum']."<br>Titel: ".$row['titel']."<hr>";
    }
  }

  renderNavbar();
  renderJumbotron();
  ?>

  <h2>Welkom Admin <!--naam--></h2>

  <!--Memberships gedeelte-->
  <div class="container">
    <h3>Memberships:</h3>
    <?php laatMemZien();?>
    <div class="col-sm-3">
      <h4>Membership toevoegen:</h4>
        <p>
          <button type="button" class="btn btn-default btn-lg" class="btn btn-primary" data-toggle="collapse" data-target="#toevoegenCollapse" aria-expanded="false" aria-control="toevoegenCollapse">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Toevoegen
          </button>
        </p>
        <div class="collapse" id="toevoegenCollapse">
        <div class="card card-body">
        <form action="update.php" method="post">
        <table>
        <tr><td>Titel van membership:</td><td> <input type="text" name="titel"></td></tr>
        <tr><td>Beschrijving van membership:</td><td> <input type="text" name="omschrijving"></td></tr>
        <tr><td>Prijs van membership in euros:</td><td> <input type="number" name="prijs" step=".01"></td></tr>
        <tr><td>Korting van membership in procenten:</td><td> <input type="number" name="korting"></td></tr>
        <tr><td><input type="submit" name="toevoegenMem" value="Toevoegen"></td></tr>
        </table>
        </form>
        </div>
        </div>
  </div>
</div>

  <hr>

  <!--Event gedeelte-->
  <div class="container">
    <h3>Events:</h3>
    <?php  laatEventZien(); mysqli_close($db);?>
  </div>


  <hr>

  <div class="container">
    <div class="col-sm-6">
      <h3>Gebruiker zoeken:</h3>
      <div class="card" style="width: 40rem;">
        <div class="card-body">
          <h4 class="card-title">Vul de gebruikersnaam in:</h4>
          <p><form action="testmem.php" method="post">
            <input type="text" name="search" placeholder="Vul de gebruikersnaam in.." onkeydown="searchq();"/>
          </form></p>

          <p><button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#zoekenCollapse' aria-expanded='false' aria-control='zoekenCollapse'>
            Zoeken
          </button></p>

          <div class="collapse" id="zoekenCollapse">
            <div class="card card-body" id="output">
            </div>
          </div>
        </div>
      </div>
    </div>

    <h3>Alle gebruikers:</h3>
    <div class="col-sm-6">
      <div class="pre-scrollable">
        <?php laatGebZien(); ?>
      </div>
    </div>
  </div>

  <hr>

  <div class="container">
    <h3>Bestellingen:</h3>
    <div class="col-sm-6">
      <h4>Memberships:</h4>
      <div class="pre-scrollable">
        <?php laatBestelMemberZien(); ?>
      </div>
    </div>

    <div class="col-sm-6">
      <h4>Events:</h4>
      <div class="pre-scrollable">
        <?php laatBestelEventsZien(); ?>
      </div>
    </div>




  </body>
  </html>
