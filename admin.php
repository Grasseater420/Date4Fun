<!DOCTYPE HTML>
<html>
<head>
	<?php
	 	include 'header.php';
		renderHead('Date4Fun Admin');
		renderNavbar();
	?>
</head>
<body>
	<?php include "lorem.php" ?>
<h3>Welkom Admin <!--naam--></h3>

<!--Memberships gedeelte-->
<h4>Memberships:</h4>
	<div class="box">
		<b>Goud</b>
		<p><?php echo $lorem_kort ?></p>
		<p>Prijs: €7,50</p>
		<button type="button">Aanpassen</button>
	</div>
	<div class="box">
		<b>Zilver</b>
		<p><?php echo $lorem_kort ?></p>
		<p>Prijs: €10,-</p>
		<button type="button">Aanpassen</button>
	</div>
	<div class="box">
		<b>Brons</b>
		<p><?php echo $lorem_kort ?></p>
		<p>Prijs: €12,50</p>
		<button type="button">Aanpassen</button>
	</div>
	<button type="button">Nieuw membership toevoegen</button>

	<!--Events gedeelte-->
	<h4>Events:</h4>
		<div class="box">
			<b>Eenden voeren</b>
			<p><?php echo $lorem_kort ?></p>
			<p>Prijs: €5,-</p>
			<button type="button">Aanpassen</button>
		</div>
		<div class="box">
			<b>Blind Date</b>
			<p><?php echo $lorem_kort ?></p>
			<p>Prijs: €35,-</p>
			<button type="button">Aanpassen</button>
		</div>
		<button type="button">Nieuw event toevoegen</button>

		<!--Gebruikers gedeelte-->
		<h4>Gebruikers: </h4>
			<p>Gebruiker zoeken: <input type="text" name="usersearch"></input></p>
			<button type="button">Zoeken</button>
</body>
</html>
