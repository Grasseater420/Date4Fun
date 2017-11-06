<!DOCTYPE HTML>
<head>
  <title>Date4Fun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
      $(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

  </script>
  <style>
   body {
    padding-top: 90px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}
  </style>
  <?php include 'header.php'; renderNavbar(); renderJumbotron()?>
</head>
<body>


<?php
	if (!isset($_POST["submit"])){
?>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Aanmelden</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Gebruikersnaam" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Wachtwoord">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Particuliere computer</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Wachtwoord vergeten?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Gebruikersnaam" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Wachtwoord">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Aanmelden">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	}

	else{

		if (!empty($_POST["voornaam"]) && !empty($_POST["achternaam"]) && !empty($_POST["gebruikersnaam"]) && !empty($_POST["wachtwoord"]) && !empty($_POST["email"]) && !empty($_POST["geboortedatum"]) && isset($_POST["voorwaarden"])){
			include "config.php";

			$voornaam = $_POST["voornaam"];
			$tussenvoegsel = $_POST["tussenvoegsel"];
			$achternaam = $_POST["achternaam"];
			$gebruikersnaam = $_POST["gebruikersnaam"];
			$wachtwoord = $_POST["wachtwoord"];
			$email = $_POST["email"];
			$geboortedatum = $_POST["geboortedatum"];

			$query = "SELECT * FROM gebruikers WHERE gebruikersnaam = '".$gebruikersnaam."'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) >= 1){
				echo "De gebruikersnaam bestaat al.";
			}

			else {

			$query = "INSERT INTO `gebruikers` (`gebruiker_id`, `admin`, `voornaam`, `tussenv`, `achternaam`, `gebruikersnaam`, `wachtwoord`, `email`, `geboortedatum`)
						VALUES (NULL, '0', '$voornaam', '$tussenvoegsel', '$achternaam', '$gebruikersnaam', '$wachtwoord', '$email', '$geboortedatum')";

			$result = mysqli_query($db, $query);

			echo "<h3>De volgende gegevens zijn ingevuld:</h3>";
			echo "Naam: <b>$voornaam $tussenvoegsel $achternaam</b><br>";
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
			$query = "INSERT INTO `profielen` (`gebruikers_id`) VALUES ('$total');";
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

		if (empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["gebruikersnaam"]) || empty($_POST["wachtwoord"]) || empty($_POST["email"]) || empty($_POST["geboortedatum"]) || !isset($_POST["voorwaarden"])){
			echo "Sorry! De gebruiker kan niet geregistreerd worden.<br /><br />";//Check of alles goed is ingevuld, zo niet, dan bericht, zo ja, post naar database en redirect naar welkom.php
		}

		if (empty($_POST["voornaam"])){
			echo "Voornaam is niet ingevuld.<br />";
		}

		if (empty($_POST["achternaam"])){
			echo "Achternaam is niet ingevuld.<br />";
		}

		if (empty($_POST["gebruikersnaam"])){
			echo "Gebruikersnaam is niet ingevuld.<br />";
		}

		if (empty($_POST["wachtwoord"])){
			echo "Wachtwoord is niet ingevuld.<br />";
		}

		if (empty($_POST["email"])){
			echo "E-mailadres is niet ingevuld.<br />";
		}

		if (empty($_POST["geboortedatum"])){
			echo "Geboortedatum is niet ingevuld.<br />";
		}

		if (!isset($_POST["voorwaarden"])){
			echo "De algemene voorwaarden zijn niet geaccepteerd.";
		}

	}
?>
</body>
</html>
