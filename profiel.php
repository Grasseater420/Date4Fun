
<?php

include "config.php";


if(isset($_GET['id']))
{

    $gebruiker_id = $_GET['id'];

}
else{
    $gebruiker_id = 1;
}

$query = "SELECT * FROM profielen WHERE gebruikers_id=$gebruiker_id";


$result = mysqli_query($db, $query);

if (!$result) {
    die("<br> Database query mislukt.");
}

while($profiel = mysqli_fetch_assoc($result)) {
    ?>


    <h2>Profiel</h2>



    <img src="./profielpics<?php echo $profiel['foto']; ?>" height="100" width="100">
    <p>Naam</p>
    <p>status</p>
    <button type="button">Stuur bericht</button>


    <hr>

    <h2>Informatie</h2>
    <p>Geintresseerd in:</p>
    <p>Ethniciteit: <?php echo $profiel['etniciteit']; ?></p>
    <p>Roken: <?php echo $profiel['roken']; ?></p>
    <p>Drinken: <?php echo $profiel['drinken']; ?></p>
    <p>Lichaamsbouw: <?php echo $profiel['lichaam']; ?></p>
    <button type="button">Aanpassen</button>

    <hr>

    <h2>Over mij</h2>
    <p><?php echo $profiel['overmij']; ?></p>
    <button type="button">Aanpassen</button>

    <hr>

    <h2>Favorieten</h2>
    <p>Film</p>
    <p>Movie</p>
    <button type="button">Aanpassen</button>

<?php } ?>