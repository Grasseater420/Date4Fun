<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'functions_gebruikersessie.php';

if (isIngelogd())
{
    logUitSessieGebruiker();
    header("Location:./index.php");
    exit();
}
else {
    echo "<h1> Dude WTF! ga eerst inloggen ofzo</h1>";
}
