<?php

  // Error message in Modal als gebruikersnaam en of wachtwoord verkeer zijn.

  $error_msg = "<div class=\"loginModal\">Username or password is incorrect</div>";
  $script =  "<script> $(document).ready(function(){ $('#loginModal').modal('show'); }); </script>";

 ?>

 SELECT IFNULL(events.titel, membership.omschrijving) as titel, producten.prijs
 FROM producten
 	LEFT JOIN events ON events.event_id=producten.event_id
     LEFT JOIN membership ON membership.membership_id=producten.membership_id WHERE producten.product_id = 1;

     
     
      SELECT IFNULL(events.titel, membership.omschrijving) as titel, producten.prijs
 FROM producten
 	LEFT JOIN events ON events.event_id=producten.event_id
     LEFT JOIN membership ON membership.membership_id=producten.membership_id WHERE producten.product_id = 1,2,3;
