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


  //maak een array met alle gebruikers_id's
  $query = "SELECT gebruikers_id FROM profielen";
  $result = mysqli_query($db, $query);

    $nummers = array();
	
	while ($row = mysqli_fetch_assoc ($result))
	{
		array_push($nummers, $row['gebruikers_id']);

	}
	


  //kiest 2 willekeurige id's uit de array en laat die zien
  $rand_id = array_rand ($nummers, 2);
  $id = $nummers[$rand_id[0]];
  $id2 = $nummers[$rand_id[1]];

  laatProfielZien($id);
  laatProfielZien($id2);
 ?>

 <form action="http://localhost/Date4Fun/matchen.php">
     <input type="submit" value="Nieuwe vrijgezelen bekijken"/>
 </form>

 <a href="profiel.php?id=<?php echo $id; ?>">Profiel1 bezoeken</a>
 <a href="profiel.php?id=<?php echo $id2; ?>">Profiel2 bezoeken</a>
</body>
</html>
