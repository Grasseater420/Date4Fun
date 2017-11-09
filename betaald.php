<?php
  include "config.php";

  session_start();
  
  
  if(isset($_SESSION['winkelwagen']) && count($_SESSION["winkelwagen"]) >= 1)
  {
      
      
      $gebruiker_id = $_SESSION["gebruikers_id"];
      
      
      $producten = $_SESSION["winkelwagen"];
      
      $datum = date('Y-m-d');
      
      
      
      
      $expires = date('Y-m-d', strtotime("+30 days"));
      
      
      foreach ($producten as $product)
      {
          
          $query = "INSERT INTO `bestellingen`(`gebruiker_id`, `product_id`, `besteldatum`) VALUES ('$gebruiker_id','$product','$datum')";
          
          var_dump($query);
          $result = mysqli_query($db, $query);
          
          
            $query = "SELECT titel
                        FROM membership
                        LEFT JOIN producten ON producten.membership_id=membership.membership_id
                        WHERE producten.product_id = $product";
            $result = mysqli_query($db, $query);
  
            $isMembership = !empty(mysqli_fetch_assoc($result));
            
            if ($isMembership)
            {
                $query = "INSERT INTO `members`(`membership_id`, `gebruiker_id`, `datum`, `expires`) VALUES ('$product','$gebruiker_id','$datum','$expires')";
          
                $result = mysqli_query($db, $query);
          
          
          
      }
  
  
  
      $gebruikersid_sessie = $_SESSION['gebruikers_id'];

        $query = "
          SELECT omschrijving, expires
          FROM membership
          LEFT JOIN members ON membership.membership_id = members.membership_id
          LEFT JOIN gebruikers ON gebruikers.gebruiker_id = members.gebruiker_id
          WHERE gebruikers.gebruiker_id = $gebruikersid_sessie
        ";
        
      
        $result = mysqli_query($db, $query);
        $membership = mysqli_fetch_assoc($result);


        if (empty($membership['omschrijving']))
        {
            $_SESSION['membership'] = "Gratis";
        }
        else {
            $_SESSION['membership'] = $membership['omschrijving'];
            $_SESSION['membership_expires'] = $membership['expires'];
        }

        $_SESSION['isAdmin'] = false;
        
        echo "<h1>Bedankt voor uw bestelling!</h1>";
        echo "U word binnen 3 seconden, geredirect naar uw profiel";
        
        header('Refresh: 3; url=./index.php');
        exit();
      

 

  
  
  
      }
  }
            
  
  ?>