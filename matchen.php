<!DOCTYPE HTML>
<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<?php
  include "header.php";
  renderNavbar();?>
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
        <img src='./profielpics".$row['foto']."' height='200' width='200'>
        <h3>".$row['voornaam']."</h3>
        <p>".$row['overmij']."</p>
		
      </div>
      ";
    }
  }


  //Aantal profielen die bestaan
  $query = "SELECT gebruikers_id FROM profielen";
  $result = mysqli_query($db, $query);

    $nummers = array();
	
	while ($row = mysqli_fetch_assoc ($result))
	{
		array_push($nummers, $row['gebruikers_id']);

	}
	


  //Random getal om profiel op te roepen
  $rand_id = array_rand ($nummers, 2);
  $id = $nummers[$rand_id[0]];
  $id2 = $nummers[$rand_id[1]];

  laatProfielZien($id);
 
 ?>
<a href="profiel.php?id=<?php echo $id; ?>">Profiel bezoeken</a>

<?php 
	laatProfielZien($id2);
 ?>

 <a href="profiel.php?id=<?php echo $id2; ?>">Profiel bekijken</a>
 
 <form action="http://localhost/Date4Fun/matchen.php">
     <input type="submit" value="Nieuwe vrijgezelen bekijken"/>
 </form>

</body>
</html>
