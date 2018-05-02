<!DOCTYPE html>
<html lang="it">

<?php 
	include("config.php"); 
	include("connessione_db.php");
	session_start(); 
	mysql_select_db("$db_name",$connessione); 
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
                        
    					<li><a href="#iniziamo">Iniziamo</a></li>
    					<li><a href="#bikeout">Cos e' Bikeout</a></li>
    					<li><a href="#statistiche">Statistiche</a></li>
                        <li><a href="#dovesiamo">Dove siamo</a></li>
                        <li><a href="/biciclette.php" data-toggle="modal" class="btn btn-blue">Biciclette</a></li>  
 
                        <?php 
                     
                            if(($_SESSION["autorizzato"])==0){ ?>
                                    <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue">Log In</a></li>
                        <?php    }   
                            if(($_SESSION["autorizzato"])==1) { ?>
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
	<header id="iniziamo">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Abbi cura del tuo corpo.</h3>
							<h2 class="light white">E' l'unico posto dove puoi vivere.</h2>
							<h1 class="white typed">Start Bikeouting</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-4">
					<div class="intro-table intro-table-first">
						<h5 class="white heading hide-hover">Prenota una bicicletta</h5>
                        <div class="bottom">
                            <h5 class="white heading small-heading no-margin regular">Se sei indeciso su quale usare, scegli tra le più usate</h5>
                            <h4 class="white heading small-pt">è facile!</h4>
                            <a href="/biciclette.php" class="btn btn-white-fill expand">Scegli</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-second">
						<h5 class="white heading hide-hover">Usa l'app mentre sei in bici oppure registra le tue sessioni tramite il sito</h5>
						<a href="https://play.google.com/store/apps" target=”_blank” class="btnico"><img src="img/logo-active.png" alt="" class="icon" width="150" height="150" style= "margin-left:10px; margin-top:60px;"></a>
						
						<div class="owl-carousel owl-schedule bottom">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-table intro-table-third">
						<h5 class="white heading">Contribuisci a tenere pulita la tua città</h5>
						<h5 class="white heading">rimanendo in forma e divertendoti!</h5>

						
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="bikeout" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Cos'è BIKE OUT?</h2>
				<h4 class="light muted">Bike out è un iniziativa a favore dell'ambiente e della salute che promuove l'uso della bicilcetta come mezzo di locomozione in sostituzione delle automobili e dei motocicli.</h4> 
				<h4 class="light muted">Ciò è utile sia per preservare l'ambiente sia per tenersi in forma.</h4> 
				<h4 class="light muted">E' inoltre possibile tener conto dei propri progressi attraverso un applicazione per smartphone, sul nostro sito potrete avere una visione d'insieme delle vostre attività.</h4> 
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Stay fit...</h4>
						<p class="description">Organizzati con i tuoi amici e tieniti in allenamento pedalando! Esiste modo migliore per perndersi una pausa di fare un giro con la bicicletta? </p>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/planet-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">... and let the planet be fit</h4>
						<p class="description">Usando la bicicletta invece di usare i mezzi motorizzati rendi la tua città e l'ambiente più vivibile e pulito, infatti per ogni Km percorso in bici eviti di ementtere circa 240g di Co2 nell'aria, un favore che fai a tutta l'umanità! </p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="statistiche" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Statistiche</h2>
				<h4 class="light muted">Qui troverai la bicicletta più usata dai nostri utenti, speriamo anche tu possa trovare quella che cerci!</h4>
                <h4 class="light muted">Inoltre a seguire potrai consultare le statistiche globali dei nosti utenti, spero ti sia utile!</h4>
			</div>

			<div class="row">

			<?php
			//seleziono la bici con più prenotazioni
			  	$query2 = "SELECT * from view_pren where NUM=(SELECT MAX(NUM) FROM view_pren)";
 			  	$ris2 = mysql_query($query2, $connessione) or die (mysql_error());
 			  	$riga2=mysql_fetch_array($ris2);
 			  	$idb=$riga2['ID_bike'];

			//prendo i dati della bici con piu prenotazioni	 					
			 	$query1 = "SELECT * FROM bicicletta WHERE ID_bici = '$idb'";
				$ris1 = mysql_query($query1, $connessione) or die (mysql_error());
				$riga1=mysql_fetch_array($ris1); 
				$Nome_bici=$riga1['Nome_bici'];
				$Descrizione=$riga1['Descrizione'];
 			
 			//conto quanti preferiti ha	
				$query3 = "SELECT COUNT(ID) AS preferita FROM biker WHERE ID_bici_preferita = '$idb' ";
				$ris3 = mysql_query($query3, $connessione) or die (mysql_error());
				$riga3=mysql_fetch_array($ris3);
				$preferita= $riga3['preferita'];

			//
				$query4 = "SELECT COUNT(ID_bici) as in_uso FROM prenotazioni WHERE ID_bici = '$idb' AND scaduta = 0 ";
				$ris4 = mysql_query($query4, $connessione) or die (mysql_error());
				$riga4=mysql_fetch_array($ris4);
				$in_uso= $riga4['in_uso'];					
			?>

				<div class="col-md-4">
					<?php
						echo'<a href="bici.php?ID=';
						echo $idb;
						echo '">';
					?>
					
					<div class="team text-center bici_index">	</br>						
						<div class="cover">
							<?php 
								echo '<img class="M bici_main';
								echo '" src="img/bikes/';
								echo $Nome_bici; 
								echo '.jpg">';
							?>
						</div>	
						<div>	
			            	<div>	
							    <img src="img/icons/In_use.png" alt="Team Image" class="star" title="Attualmente in uso">	
			                    <h4 class="num star_num"><?php echo $in_uso; ?></h4>
			                </div>
			                <div>									
			    				<img src="img/icons/Like.png" alt="Team Image" class="heart" title="Preferita">	
			    				<h4 class="num heart_num"><?php echo $preferita; ?></h4>
			                </div>
						</div>
						<div class="title">
							<?php
								echo '<h4>';
								echo $Nome_bici;
								echo '</h4> <p style="font-size: 12px; " class="description main_description">';
						 		echo substr ( $Descrizione, 0 , 200);
						 		echo '...</p>';
							?>
						</div>			
					</div>
				</div>	</a>
			<?php

				$query5 = "SELECT SUM(Km) AS km, SUM(cal) AS cal, SUM(Co2) AS co2, SUM(tempo) AS tempo FROM sessione";
				$ris5 = mysql_query($query5, $connessione) or die (mysql_error());
				$riga5 = mysql_fetch_array($ris5);
				$km = $riga5['km'];
				$cal = $riga5['cal'];
				$co2 = $riga5['co2'];
				$tempo = $riga5['tempo'];

				$query6 = "SELECT COUNT(*) AS uscite FROM sessione";
				$ris6 = mysql_query($query6, $connessione) or die (mysql_error());
				$riga6 = mysql_fetch_array($ris6);
				$uscite = $riga6['uscite'];

				echo '<div style=" background:white; margin-left:33%; margin-top:6.8%"class= "center statistiche_index">';	

							echo '<br/><h3 style="color:#3366ff;" > STATISTICHE GLOBALI DEGLI UTENTI </h3>';
							echo '<h5 class="M">Km percorsi </h5><h5 class="black">';
							echo $km;
							echo ' Km</h5></br>';
							echo '<h5 class="M"> Calorie bruciate </h5><h5 class="black">';
							echo substr($cal, 0, 6);
							echo ' KCal</h5></br>';			
							echo '<h5 class="M">Co2 risparmiato </h5><h5 class="black">';
							echo substr($co2, 0, 4);
							echo ' Kg</h5></br>';
							echo '<h5 class="M">Tempo in sella </h5><h5 class="black">';
							echo $tempo;
							echo ' h</h5></br>';
							echo '<h5 class="M">Uscite totali </h5><h5 class="black">';
							echo $uscite;
							echo '</h5>';
						echo '</div>';
				?>	
			</div>
		</div>
		
	</section>
	
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
							<div class="white">
								UOMO <input type="radio" name="M" id="M" ng-checked="selected=='M'" ng-true-value="'M'" ng-model="selected" value="M"/> </br>
        						DONNA  <input type="radio" name="F" id="F" ng-checked="selected=='F'" ng-true-value="'F'" ng-model="selected" value="F"/>
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

<section id="dovesiamo" class="section gray-bg">
	<footer>  

		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Cosa aspetti?</h3>
					<h5 class="light regular light-white">Unisciti a noi!</h5>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li>
                    <h4 class="light regular light-white"> </h4>
                    <h4 class="light regular light-white">Ci trovi qui</h4>
                    <h5 class="light regular light-white">Via Salerno 4</h5>
                    <h5 class="light regular light-white">Misterbianco (CT)</h5>
                    <h5 class="light regular light-white">TEL: 095 977220</h5>
                    <h5 class="light regular light-white">E-mail: BikeOut@gmail.com</h5>
				</div>	
                <div id="googleMap" style="width:500px;height:380px;"></div>
			</div>
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
	</section>
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
            function initialize() {
              var mapProp = {
                center:new google.maps.LatLng(37.520570, 15.033471),
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
              };
              var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<!--checkbox MaschioFemmina --> 
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script>
    angular.module('app', []).controller('appc', ['$scope',
      function($scope) {
        $scope.selected = 'other';
      }
    ]);
  </script>
</html>

<!-- 
<form action="search.php" class="popup-form" method="post">
					<input type="text" name="ricerca" id="ricerca"  placeholder="ricerca" required>
					<input class="btn btn-submit" type="submit" id="submit" placeholder="submit">
				</form> -->