<?php



function renderHeader()
{
    
}

function showProfielFoto($id)
{
    include "config.php";
    $id = mysqli_real_escape_string($db, $id);
 $query = "SELECT foto FROM `profielen` WHERE gebruikers_id = '".$id."'";
$result = mysqli_query($db, $query);

$row = mysqli_fetch_assoc($result);
$id = $row['foto'];



if ($row["foto"])
{
     echo '<img title="profiel foto" class="img-circle img-responsive" src="data:image/jpeg;base64,'.base64_encode( $row['foto'] ).'"/>';
}
else {
   
}

}








?>

