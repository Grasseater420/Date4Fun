<!DOCTYPE HTML>
<head>
  <title>Date4Fun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 
  
	<script type="text/javascript">
		$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
	</script>
	<style type="text/css">
            /* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
	</style>
</head>
  
  
  <?php include 'header.php'; renderNavbar(); renderJumbotron()?>
</head>
<body>


<?php
	if (!isset($_POST["submit"])){
?>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-0">
		<form role="form">
			<h2>Registeren</h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Voornaam" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Achternaam" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Gebruikersnaam" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Wachtwoord" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Bevestig wachtwoord" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">Ik ga akkoord</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">en</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registeren" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a data-toggle="modal" class="btn btn-success btn-block btn-lg" href="#loginModal">Inloggen</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
