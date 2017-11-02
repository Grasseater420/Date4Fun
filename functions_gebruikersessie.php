<?php
/**
 * Created by PhpStorm.
 * User: Jim
 * Date: 1-11-2017
 * Time: 11:50
 */


// Hieronder de functies die gebruikt worden tijdens de het inloggen

function logInSessieGebruiker($id)
{
    //Check of er al een sessie bestaat
    //Zoja terminate en laat fout zien
    if (isIngelogd()) {
        die("Bestaat al een sessie!!!!! Functie:LoginGeruiker");
    }
    else {

        session_start();
        //koppel variabelen hier aan sessie
    }

}

function logUitSessieGebruiker()
{
    //Check of er daadwerkelijk een sessie bestaat
    //Als dit zo is word de sessie gestopt en verwijderd
    if (isIngelogd()) {
        session_unset();
        session_destroy();
    }
    else {

        die("Er bestaat geen sessie!!!!! Functie:LoginGeruiker");
    }}

    function isIngelogd()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            return true;

        } else {
            return false;
        }
    }


    if (isIngelogd(){})