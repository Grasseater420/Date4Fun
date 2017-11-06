<?php

include 'functions_gebruikersessie.php';

if (!isIngelogd()) // moet niet ingelogd
    
{
    if (empty($_SESSION['winkelwagen']))
    {
        $_SESSION['winkelwagen'] = array();
    }
    
    winkelWagenOverzicht();
    
}

if(isset($_GET['del']))
{
    verwijderUitWinkelWagen($_GET['del']);
    
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


function verwijderUitWinkelWagen($productid)
{
    
    if (($product = array_search($productid, $_SESSION['winkelwagen'])) !== false)
    {
        unset($_SESSION['winkelwagen'][$product]);
        var_dump($_SESSION[ 'winkelwagen']);
    }
    else
    {
        echo "Product komt niet voor in winkelwagen";
    }
    
}

function winkelWagenOverzicht()
{
    if (count($_SESSION['winkelwagen']) >= 1)
    {
        var_dump($_SESSION['winkelwagen']);
    $str =  implode(',', $_SESSION['winkelwagen']) ;
    echo "<hr>";
    echo $str;
    }
 else {
     echo "Lege winkelwagen...";
        
    }
    
    
}

