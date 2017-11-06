<?php

  include 'config.php';

  ////
  // expirimenteel
  ////
  $query      = "SELECT * FROM gebruikers WHERE gebruikersnaam ='" . $_GET['gebruiker'] . "'";
  $result     = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

  while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
  }
  ////

  $to       = $email;
  $subject  = "This is subject";
  $message  = "This is simple text message.";
  $header   = "From:date4fun2017@gmail.com\r\n";
  $retval   = mail ($to,$subject,$message,$header);
  if( $retval == true )
  {
    echo "Message sent successfully...";
    if (isset($_SERVER["HTTP_REFERER"])) {
      $adres = $_SERVER["HTTP_REFERER"] . "?mail=succes";
        header("Location: " . $adres);
    }
  }
  else
  {
    echo "Message could not be sent...";
  }

?>
