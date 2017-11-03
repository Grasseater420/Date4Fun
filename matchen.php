<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
  <h1>Date4Fun</h1>
  <h1>Logo</h1>
  <h2>Welkom bij de Date4Fun Matchpagina!</h2>

<?php
  include "config.php";
  function laatProfielZien($id){
    //Connectie met Database
    include "config.php";

    //De query om profielen te verkrijgen
    $query = "SELECT gebruikers.voornaam, profielen.foto, profielen.overmij FROM `gebruikers` INNER JOIN profielen ON gebruikers.gebruiker_id=profielen.gebruikers_id WHERE gebruikers.gebruiker_id = '".$id."'";
    $result = mysqli_query($db, $query);

    //Resulaten naar het scherm
    while($row = mysqli_fetch_assoc($result)){
      echo "
      <div class='profiel'>
        <img src='./profielpics".$row['foto']."' height='100' width='100'>
        <h3>".$row['voornaam']."</h3>
        <p>".$row['overmij']."</p>
      </div>
      ";
    }
  }

  //Aantal profielen die bestaan
  $query = "SELECT COUNT(gebruiker_id) FROM gebruikers";
  $result = mysqli_query($db, $query);

  $row = mysqli_fetch_array($result);

  $total = $row[0];

  //Random getal om profiel op te roepen
  $id = RAND(1,$total);
  laatProfielZien($id);
 ?>

 <form action="http://localhost/PHP1/Date4Fun%20Project%20files/matchen.php">
     <input type="submit" value="Dislike"/>
 </form>

 <a href="profiel.php?id=<?php echo $id; ?>">Profiel bezoeken</a>
</body>
</html>
