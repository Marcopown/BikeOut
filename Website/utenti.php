<?php 	
	include("config.php");
	include("connessione_db.php");

	session_start();
	mysql_select_db("$db_name",$connessione); 

	$query1 = "SELECT MAX(ID) AS ID FROM biker";
	$ris1 = mysql_query($query1, $connessione) or die (mysql_error());
 	$riga1=mysql_fetch_array($ris1);
 	$NUM_UTENTI=$riga1['ID'];
?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<html lang="it">

<head >
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bike Out</title>
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/favicon.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/favicon.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.png">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="css/cardio.css">
</head>

<body class="bk">
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/index.php"><img src="img/logo.png" data-active-url="img/logo.png" alt="" height="100" width="100"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav navbar-right main-nav">
    					<li><a href="/index.php#iniziamo">Iniziamo</a></li>
    					<li><a href="/index.php#bikeout">Cos e' Bikeout</a></li>
    					<li><a href="/index.php#statistiche">Statistiche</a></li>
                        <li><a href="/index.php#dovesiamo">Dove siamo</a></li>
 
                        <?php 
                            session_start();
                            if(($_SESSION["autorizzato"])==0){ ?>
                                    <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue">Log In</a></li>
                        <?php    }   
                            if(($_SESSION["autorizzato"])==1) { ?>
                                    <li><a href="/biciclette.php" data-toggle="modal" class="btn btn-blue">Biciclette</a></li>
                                    <li><a href="/profilo.php" data-toggle="modal" class="btn btn-blue">Profilo</a></li>                                
                                   <li>
                                        <form class="popup-form logout" id="login" action="logout.php" method="post">
                                            <input class="btn btn-blue" type="submit" id="submit" value="Logout">
                                        </form>
                                    </li>
                        <?php } ?>
                        		
    			    </ul>
    			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header  id="iniziamo" style="height:auto; margin-bottom:500px">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div style="margin-top:10%;" class="row">
						<div class="col-md-12 text-center">
							
						<?php
						
						for($i=0; $i<=$NUM_UTENTI; $i++)
							{
							$query2 = "SELECT * FROM biker WHERE ID = '$i'";
 							$ris2 = mysql_query($query2, $connessione) or die (mysql_error());
 							$riga2=mysql_fetch_array($ris2); 
 							$username2=$riga2['Username'];
 							$nome2=$riga2['Nome'];
 							$cognome2=$riga2['Cognome'];

 								if($username2!=NULL)
 								{
		 							$sesso2=$riga2['Sesso'];
		 							$img2=$riga2['Img'];
		 													
		 								
			 								echo '<div class="user_service">';
			 									echo '<div class="icon-holder">';
													echo'<a href="profilo.php?x=';
													echo $username2;
													echo '">';
													echo '<img class="avatar fixed ';
													echo $sesso2;
													echo '" src="img/avatar/';

													if ($img2==X)
													{
														echo $username2; 
														echo '.jpg">';
													}
													else
													{
														echo 'avatar.png">';
													}
													echo "<br/>";
						 							echo "<br/>";
						 							echo '<p class="description M ">';
						 							echo $username2;
						 							echo '</p>';
						 							echo '<p style="font-size: 12px; " class="description white">';
						 							echo $nome2;
						 							echo ' ';
						 							echo $cognome2;
						 							echo '</p>';
						 							echo'</a>';	
						 						echo '</div>';
						 						echo '</div>';
	 							
 								}
 							}
 							echo '</div>';
						?>
					</div>
				</div>
			</div>
		</div>
		
	</header>
	
	<footer>  
		<div class="container">
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2016 All Rights Reserved. Created by <b>Marco Farina</b></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="https://www.facebook.com/BikeOutCT/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/Bike_OutCT"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/u/0/109007264113326642936/about"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
   
	</footer>
	
   
	
     
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>

	<!-- Scripts -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
</html>