
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

    <?php } ?>






    <h2>Favorieten</h2>

<?php

$query = "SELECT favorietefilm.titel FROM favorietefilm INNER JOIN profielen ON favorietefilm.film_id=profielen.favorietefilm WHERE profielen.gebruikers_id = $gebruiker_id";


$result = mysqli_query($db, $query);

if (!$result) {
    die("<br> Database query mislukt.");
}

while($film = mysqli_fetch_assoc($result)) {
    ?>

    <p>Film <?php echo $film['titel']; ?></p>
<?php } ?>
<?php

$query = "SELECT favorietemuziek.titel FROM favorietemuziek INNER JOIN profielen ON favorietemuziek.muziek_id=profielen.favorietemuziek WHERE profielen.gebruikers_id = $gebruiker_id";


$result = mysqli_query($db, $query);

if (!$result) {
    die("<br> Database query mislukt.");
}

while($muziek = mysqli_fetch_assoc($result)) {
    ?>

    <p>Muziek <?php echo $muziek['titel']; ?></p>
<?php } ?>
    <button type="button">Aanpassen</button>
