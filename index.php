<!DOCTYPE HTML>
<head>
  <title>Date4Fun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 

  <style>
      .jumbotron {
    background-image: url("./header.jpg");
    background-color: #17234E;
    margin-bottom: 0;
    min-height: 50%;
    background-repeat: no-repeat;
    background-position: center;
    -webkit-background-size: cover;
    background-size: cover;
}

</style>
  
  <?php include 'header.php'; renderNavbar(); renderJumbotron()?>
</head>
<body>


<?php
	if (!isset($_POST["registeren"])){
?>

    
    <div class="container">
	<div class="row">
    <div class="col-md-8">
      <section>      
        <h1 class="entry-title"><span>Account registreren</span> </h1>
        <hr>
        <form class="form-horizontal" method="post" name="regisreren" action="index.php" id="signup" enctype="multipart/form-data" >        
        <div class="form-group">
          <label class="control-label col-sm-3">Email  <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
              <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
            </div>
            <small> Je email word gebruikt, voor het herstellen van je wachtwoord </small> </div>
        </div>
                <div class="form-group">
          <label class="control-label col-sm-3">Gebruikersnaam <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam" value="">
           </div>   
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Wachtwoord <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="wachtwoord" id="wachtwoord" placeholder="Wachtwoord" value="">
           </div>   
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Bevestig wachtwoord <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="bwachtwoord" id="bwachtwoord" placeholder="Bevestig je wachtwoord" value="">
            </div>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Voornaam <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <input type="text" class="form-control" name="voornaam" id="voornaam" placeholder="Voornaam" value="">
          </div>
        </div>
                        <div class="form-group">
          <label class="control-label col-sm-3">Achternaam <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Achternaam" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Geboortedatum <span class="text-danger">*</span></label>
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="form-group">
                <select name="dd" class="form-control">
                  <option value="">Dag</option>
                  <option value="1" >1 </option><option value="2" >2 </option><option value="3" >3 </option><option value="4" >4 </option><option value="5" >5 </option><option value="6" >6 </option><option value="7" >7 </option><option value="8" >8 </option><option value="9" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>                </select>
              </div>
              <div class="form-group">
                <select name="mm" class="form-control">
                  <option value="">Maand</option>
                  <option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>                </select>
              </div>
              <div class="form-group" >
                <select name="yyyy" class="form-control">
                  <option value="0">Jaar</option>
                  <option value="1955" >1955 </option><option value="1956" >1956 </option><option value="1957" >1957 </option><option value="1958" >1958 </option><option value="1959" >1959 </option><option value="1960" >1960 </option><option value="1961" >1961 </option><option value="1962" >1962 </option><option value="1963" >1963 </option><option value="1964" >1964 </option><option value="1965" >1965 </option><option value="1966" >1966 </option><option value="1967" >1967 </option><option value="1968" >1968 </option><option value="1969" >1969 </option><option value="1970" >1970 </option><option value="1971" >1971 </option><option value="1972" >1972 </option><option value="1973" >1973 </option><option value="1974" >1974 </option><option value="1975" >1975 </option><option value="1976" >1976 </option><option value="1977" >1977 </option><option value="1978" >1978 </option><option value="1979" >1979 </option><option value="1980" >1980 </option><option value="1981" >1981 </option><option value="1982" >1982 </option><option value="1983" >1983 </option><option value="1984" >1984 </option><option value="1985" >1985 </option><option value="1986" >1986 </option><option value="1987" >1987 </option><option value="1988" >1988 </option><option value="1989" >1989 </option><option value="1990" >1990 </option><option value="1991" >1991 </option><option value="1992" >1992 </option><option value="1993" >1993 </option><option value="1994" >1994 </option><option value="1995" >1995 </option><option value="1996" >1996 </option><option value="1997" >1997 </option><option value="1998" >1998 </option><option value="1999" >1999 </option><option value="2000" >2000 </option><option value="2001" >2001 </option><option value="2002" >2002 </option><option value="2003" >2003 </option><option value="2004" >2004 </option><option value="2005" >2005 </option><option value="2006" >2006 </option>                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Ik ben een <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <label>
            <input name="geslacht" type="radio" value="Man" checked>
            Man </label>
               
            <label>
            <input name="geslacht" type="radio" value="Vrouw" >
            Vrouw </label>
          </div>
        </div>
       
        <div class="form-group">
          <label class="control-label col-sm-3">Profiel foto <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
              <input type="file" name="profielfoto" id="profielfoto" class="form-control upload" placeholder="" aria-describedby="file_upload">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-offset-3 col-md-8 col-sm-9"><span class="text-muted"><span class="label label-danger">LET OP:-</span> Door op registreren te klikken ga je akkoord met onze voorwaarden</span> </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
            <input type="submit" name="registeren" value="registreren" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
</div>
</div>
    
    
<?php
	}

	else{

		if (!empty($_POST["email"]) && !empty($_POST["gebruikersnaam"]) && !empty($_POST["wachtwoord"]) && !empty($_POST["bwachtwoord"]) && !empty($_POST["voornaam"])  
                   && !empty($_POST["achternaam"]) && !empty($_POST["dd"]) && !empty($_POST["mm"]) && !empty($_POST["yyyy"]))
                    {

			include "config.php";
                        
                        $email = $_POST["email"];
			$gebruikersnaam = $_POST["gebruikersnaam"];
			$wachtwoord = $_POST["wachtwoord"];
                        $wachtwoord_hashed = password_hash($wachtwoord, PASSWORD_DEFAULT);
			$voornaam = $_POST["voornaam"];
			$achternaam = $_POST["achternaam"];
			
                        $geslacht = $_POST["geslacht"];
			$Dag = $_POST["dd"];
                        $Maand = $_POST["mm"];
                        $Jaar = $_POST["yyyy"];
                        
                        $geboortedatum_tmp = "$Jaar-$Maand-$Dag";
    
                        $geboortedatum = date('Y-m-d', strtotime($geboortedatum_tmp));
   
              
            
                        $foto = addslashes (file_get_contents($_FILES['profielfoto']['tmp_name']));
                        
      

			$query = "SELECT * FROM gebruikers WHERE gebruikersnaam = '".$gebruikersnaam."'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) >= 1){
				echo "De gebruikersnaam bestaat al.";
			}

			else {

			$query = "INSERT INTO `gebruikers` (`gebruiker_id`, `admin`, `voornaam`,  `tussenv`, `achternaam`, `gebruikersnaam`, `wachtwoord`, `email`, `geboortedatum`, `geslacht`)
						VALUES (NULL, '0', '$voornaam', NULL, '$achternaam', '$gebruikersnaam', '$wachtwoord_hashed', '$email', '$geboortedatum', '$geslacht')";

                        $result = mysqli_query($db, $query);
                   

			echo "<h3>De volgende gegevens zijn ingevuld:</h3>";
			echo "Naam: <b>$voornaam $achternaam</b><br>";
			echo "Gebruikersnaam: <b>$gebruikersnaam</b><br>";
			echo "Wachtwoord: <b>$wachtwoord</b><br>";
			echo "E-mailadres: <b>$email</b><br>";
			echo "Geboortedatum: <b>$geboortedatum</b><br><br>";

			//Aanmaken profiel
			//GebruikersID verkrijgen
			$query = "SELECT gebruiker_id FROM `gebruikers` WHERE gebruikersnaam = '".$gebruikersnaam."'";
			$result = mysqli_query($db, $query);

			$row = mysqli_fetch_array($result);

		  $total = $row[0];

			//Aanmaken profiel met query
			$query = "INSERT INTO `profielen` (`gebruikers_id`, `foto`) VALUES ('".$total."', '".$foto."')";
                        
                        

			$result = mysqli_query($db, $query);

			//Welkom bericht, doorsturen naar Login pagina
			echo "Welkom ".$voornaam.", bedankt voor het registreren.<br>";
			echo "<a href='http://localhost/Date4Fun/loginForm.php'>Login!</a>";

			//function stuurMail($email, $voornaam){
				//$to = $email;
				//$subject = "Welkom ".$voornaam."!";
				//$message = "Hoi ".$voornaam."!\r\nWelkom bij Date4Fun!\r\nBedankt voor het registreren bij onze website.\r\nKlik op onderstaande link om je profiel klaar te maken voor de strijd!";
				//$headers = "From webmaster@date4fun.nl" . "\r\n" . "Reply to: webmaster@date4fun.nl" . "\r\n" . "X-Mailer: PHP/" . phpversion();

				//mail($to, $subject, $message, "From: webmaster@date4fun.nl");
			//}

			//stuurMail($email, $voornaam);

			}
			mysqli_close($db);
					//sessiestart
					//header("location: /welkom.php");
		}

		if (empty($_POST["email"]) || empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"]) || empty($_POST["bwachtwoord"]) || empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || !isset($_POST["dd"]) || !isset($_POST["mm"]) || !isset($_POST["yy"])){
			echo "Sorry! De gebruiker kan niet geregistreerd worden.<br /><br />";//Check of alles goed is ingevuld, zo niet, dan bericht, zo ja, post naar database en redirect naar welkom.php
		}
                
                
                 if ($_FILES['profielfoto']['name'] == "")
                {
                    echo "Geen profielfoto gekozen.<br /";
                }

		if (empty($_POST["gebruikersnaam"])){
			echo "Gebruikersnaam is niet ingevuld.<br />";
		}

		if (empty($_POST["wachtwoord"])){
			echo "Wachtwoord is niet ingevuld.<br />";
		}

		if (empty($_POST["bwachtwoord"])){
			echo "Bevestig wachtwoord is niet ingevuld.<br />";
		}

		if (empty($_POST["voornaam"])){
			echo "Voornaam is niet ingevuld.<br />";
		}

		if (empty($_POST["achternaam"])){
			echo "Achernaam is niet ingevuld.<br />";
		}

		if (empty($_POST["dd"])){
			echo "Geboortedag is niet ingevuld.<br />";
		}

		if (empty($_POST["mm"])){
			echo "Geboortemaand is niet ingevuld.<br /.";
		}
                
                if (empty($_POST["yyyy"])){
                    
		echo "Geboortejaar is niet ingevuld.<br /";
		}
                


	}
?>
</body>
</html>
