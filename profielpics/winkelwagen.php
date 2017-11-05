<?php

include 'functions_gebruikersessie.php';

if (isIngelogd())
{
    if (empty($_SESSION['cart']))
    {
        $_SESSION['winkelwagen'] = array();
    }
    
}


function toevoegenAanWinkelWagen($productid)
{
    
if (in_array($productid, $_SESSION['winkelwagen']))
{
    echo "Je kunt"
}
else {
    
}

