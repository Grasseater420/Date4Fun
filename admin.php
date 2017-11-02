<!DOCTYPE HTML>
<html>
<head>
<title>Date4Fun Admin</title>
<link rel="stylesheet" type="text/css" href="css.css">
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
</body>
</html>
