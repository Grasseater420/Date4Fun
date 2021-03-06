<?php

//include 'functions_gebruikersessie.php';

include "header.php";
include "config.php";


if (1 ==1) // moet niet ingelogd
    
{
    session_start();

    
    if (empty($_SESSION['winkelwagen']))
    {
        $_SESSION['winkelwagen'] = array();
    }
    
    
    
?>


<html>
  <head>
    <!--<link rel="stylesheet" type="text/css" href="stylesheet.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Date4Fun Events</title>
    
    <style>

    </style>


<?php

    renderNavbar();
    

    
}

if(isset($_GET['del']))
{
    verwijderUitWinkelWagen($_GET['del']);
    winkelWagenOverzicht($db);
    
}

if(isset($_GET['add']))
{
    toevoegenAanWinkelWagen($_GET['add']);
    winkelWagenOverzicht($db);
    
}

if(isset($_GET['overzicht']))
{
    winkelWagenOverzicht($db);
}


function toevoegenAanWinkelWagen($productid)
{
    
if (in_array($productid, $_SESSION['winkelwagen']))
{
    //echo "Je hebt dit product al in de winkelwagen";
}
else {
    array_push($_SESSION[ 'winkelwagen'], $productid);
}
    
}


function verwijderUitWinkelWagen($productid)
{
    
    if (($product = array_search($productid, $_SESSION['winkelwagen'])) !== false)
    {
        unset($_SESSION['winkelwagen'][$product]);
    }
    else
    {
        echo "Product komt niet voor in winkelwagen";
        exit();
    }
    
}

function winkelWagenOverzicht($db)
{
    ?>
    
    

<div class="panel-body">


<?php
    if (count($_SESSION['winkelwagen']) >= 1)
    {
    $str =  implode(',', $_SESSION['winkelwagen']) ;
    echo "<hr>";
    echo $str;
    
    
    
    $sql = "SELECT IFNULL(events.titel, membership.omschrijving) as titel, producten.prijs, producten.product_id
 FROM producten
 	LEFT JOIN events ON events.event_id=producten.event_id
     LEFT JOIN membership ON membership.membership_id=producten.membership_id WHERE producten.product_id IN ($str)";
    
    
    
    $result = mysqli_query($db, $sql);
    
    
    
    ?>
    
     <div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Winkelwagen</h5>
							</div>
							<div class="col-xs-6">
                           <a href="./events.php"><button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Verder winkelen
								</button><a/>
							</div>
						</div>
					</div>
				</div>
                            
                          
    
    <?php
    
    while($product = mysqli_fetch_assoc($result))
    {
        ?>


					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo $product['titel']; ?> </strong></h4><h4><small></small></h4>
						</div>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6><strong><?php echo $product['prijs']; ?> <span class="text-muted"></span></strong></h6>
							</div>
							<div class="col-xs-4">
							</div>
							<div class="col-xs-2">
                                                            <a href="./winkelwagen2.php?del=<?php echo $product['product_id']; ?>" <button type="button" class="btn btn-link btn-xs">
                                                                    
                                                                    
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
                                                        </a>
							</div>
						</div>
					</div>
                            
                            <hr>

  
        
        <?php
    }
    ?>
    
    
    				</div>

                                                    				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Totaal <strong>50.00</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Afrekenen
							</button>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    }
 else {
     ?>
    
    
    

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-6">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Winkelwagen</h5>
							</div>
							<div class="col-xs-6">

							</div>
						</div>
					</div>
				</div>
                            <div class="panel-body">
					<div class="row">
						
						<div class="text-center">
						<h4>U heeft geen producten in de winkelwagen</h4>
						</div>
						
					</div>
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
						</div>
						<div class="col-xs-3">
                                                    <a href="./events.php"><button type="button" class="btn btn-primary btn-sm btn-block">
									<span class="glyphicon glyphicon-share-alt"></span> Verder winkelen
								</button><a/>
						</div>


<?php
        
    }
    
    ?>
    
    
    
    
    <?php
    
    
}

