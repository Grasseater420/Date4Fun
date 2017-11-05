<?php

include 'functions_gebruikersessie.php';

if (!isIngelogd())
{
    if (empty($_SESSION['winkelwagen']))
    {
        $_SESSION['winkelwagen'] = array();
    }
    
}


if(isset($_GET['add']))
{
    toevoegenAanWinkelWagen($_GET['add']);
    
}


function toevoegenAanWinkelWagen($productid)
{
    
if (in_array($productid, $_SESSION['winkelwagen']))
{
    echo "Je hebt dit product al in de winkelwagen";
}
else {
    array_push($_SESSION[ 'winkelwagen'], $productid);
    var_dump($_SESSION[ 'winkelwagen']);
}
    
}

