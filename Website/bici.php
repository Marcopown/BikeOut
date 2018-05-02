<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<html lang="it">

<?php 	
	include("config.php");
	include("connessione_db.php");

	session_start();
	mysql_select_db("$db_name",$connessione); 

	$ID=$_GET['ID'];
	$_SESSION['ID_bici_prenota']=$ID;
		
	$query = "SELECT *  FROM bicicletta WHERE ID_bici = '$ID'";
 	$ris = mysql_query($query, $connessione) or die (mysql_error());
 	$riga=mysql_fetch_array($ris); 

 	$descrizione=$riga['Descrizione'];
	$disponibili=$riga['Numero_disponibili'];
	$nome=$riga['Nome_bici'];
	$img=$riga['Foto'];


	$query1 = "SELECT COUNT(ID) AS numero_bici FROM prenotazioni WHERE ID_bici = '$ID' AND scaduta = 0";
 	$ris1 = mysql_query($query1, $connessione) or die (mysql_error());
 	$riga1=mysql_fetch_array($ris1);
	$NUM = $riga1['numero_bici'];
	
	$query2 = "SELECT COUNT(ID_bici) as in_uso FROM prenotazioni WHERE ID_bici = '$ID' AND scaduta = 0 ";
 	$ris2 = mysql_query($query2, $connessione) or die (mysql_error());
 	$riga2=mysql_fetch_array($ris2); 
 	$in_uso=$riga2['in_uso'];

 	$query3 = "SELECT COUNT(ID) AS preferita FROM biker WHERE ID_bici_preferita = '$ID' ";
 	$ris3 = mysql_query($query3, $connessione) or die (mysql_error());
 	$riga3=mysql_fetch_array($ris3);
	$preferita= $riga3['preferita'];



?>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bike Out</title>


	    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
	    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
	    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
	    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
	    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
	    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
	    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
	    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	    <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
	    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
	    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	    <link rel="manifest" href="img/favicons/manifest.json">
	    <link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	    <meta name="msapplication-TileColor" content="#da532c">
	    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
	    <meta name="theme-color" content="#ffffff">


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

<body>
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
                            if(($_SESSION["autorizzato"])==0){ ?>
                            		<li><a href="/biciclette.php" data-toggle="modal" class="btn btn-blue">Biciclette</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue">Log In</a></li>
                        <?php    }   
                            if(($_SESSION["autorizzato"])==1) { ?> 
                            		<li><a href="/biciclette.php" data-toggle="modal" class="btn btn-blue">Biciclette</a></li>                         
                                    <li><a href="/utenti.php" data-toggle="modal" class="btn btn-blue">Utenti</a></li>
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


	
	<div class="bk">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div  class="row">
						<div class="col-md-12 text-center"> 
							<div class="dati_bici" style="height:auto;">
								<h3 class="bic_name;" style="color:#3366ff";> <?php echo $nome; ?> </h3>
								<div>
								<?php
									if ($img == X)
									{
										echo '<img class="avatar bikevatar M" src="img/Bikes/';
										echo $nome; 
										echo '.jpg">';
									}else
										echo'<img class="avatar bikevatar M" src="img/avatar/avatar.png">';
								?>
								<div>
								<img src="img/icons/Like.png" class="heart_bike" title="Preferita">	
    								<h4 class="num heart_numb"><?php echo $preferita; ?></h4>
								 <img src="img/icons/In_use.png" class="star_bike" title="Attaulmente in uso">	
                                    <h4 class="num star_numb"><?php echo $in_uso; ?></h4>
                                									
    								
    							</div>
    							</div>

								<div class="descr_bici">
								<br/><br/>	
									<h4>
										<span class="M"> Modello: </span>
										<span class="white"> <?php echo $nome; ?> </span>
									</h4>

									<h4>
										<span class="M">Disponibili: </span>
										<span class="white"> <?php echo $disponibili-$NUM; ?></span>
									</h4>
									<h4>
										<span class="M">Attualmente in uso: </span>
										<span class="white"> <?php echo $NUM; ?> </span>
									</h4>
								<?php
									if(($_SESSION["autorizzato"])==1) 
									{
									echo'	<form action="prenotabici.php" method="post" enctype="multipart/form-data"><br/>';
									echo'		<input class="btn btn-blue" name="upload" type="submit" value="Prenota" /> <br/><br>';
									echo'	</form>';
									}  ?>

								</div>

								<div class="descr_bici2">

									<br/><br/><br/><h3 style="color:#3366ff; text-align:center;"> DESCRIZIONE E SPECIFICHE </h3>		
									 <h4>	<span class="white"><?php echo $descrizione; ?></span>	</h4>		
								</div>
							</div>
						</div>
					</div>										
				</div>
			</div>
		</div>
	
	

	</div>
	

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

	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<h3 class="white">Sign Up</h3>
				<form action="register.php" class="popup-form" method="post">
					<input type="text" name="username" id="username" class="form-control form-white" placeholder="Username" required>
					<input type="text" name="nome" id="nome" class="form-control form-white" placeholder="Nome" required>
                    <input type="text" name="cognome" id="cognome" class="form-control form-white" placeholder="Cognome" required>
                    <input type="text" name="data_di_nascita" id="data_di_nascita" class="form-control form-white" placeholder="Data di nascita (YY-MM-DD)" required>
					<input type="text" name="citta" id="citta" class="form-control form-white" placeholder="Città" required>
					<input type="text" name="provincia" id="provincia" class="form-control form-white" placeholder="Provincia" required>
					<input type="password" name="password" id="password" class="form-control form-white" placeholder="Password" required>
                    <input type="password" name="c_password" id="c_password" class="form-control form-white" placeholder="Conferma password" required>
					<input type="text" name="mail" id="mail" class="form-control form-white" placeholder="E-mail" required>

						<body ng-app="app" ng-controller="appc">
							<div>
							    <input type="checkbox" name="M" id="M" ng-checked="selected=='M'" ng-true-value="'M'" ng-model="selected">Uomo
							    <input type="checkbox" name="F" id="F" ng-checked="selected=='F'" ng-true-value="'F'" ng-model="selected">Donna
							</div>
						</body>

					<input class="btn btn-submit" type="submit" id="submit" placeholder="submit">
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<h3 class="white">Log In</h3>				
                    <form class="popup-form" id="login" action="verifica.php" method="post">
                        <fieldset id="inputs">
                            <input class="form-control form-white" id="username" name="username" type="text" placeholder="Username" required>
                            <input class="form-control form-white" id="password" name="password" type="password" placeholder="Password" required>
                        </fieldset>
                        <fieldset id="actions">
                            <input class="btn btn-submit" type="submit" id="submit" value="Collegati">
                        </fieldset>
                </form>
			</div>
		</div>
	</div>
</body>
	
   
	
     
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
	
	<script> 
		$(document).load(function () {
			$("#iniziamo").removeAttr("style");
			$("#iniziamo").css("height", "2000px");
   		});
   	 </script>

	 </body>
</html>