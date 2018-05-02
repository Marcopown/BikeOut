<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<html lang="it">

<?php 	
	include("config.php");
	include("connessione_db.php");

	session_start();
	mysql_select_db("$db_name",$connessione); 

	$visit=$_GET['x'];
	if($visit!=NULL)
		$username=$visit;
	else{
			$username= $_SESSION['username'];
		}		
	$query = "SELECT * , SUBSTRING(BikeOuter_da, 1, 10) AS BikeOuter FROM biker WHERE username = '$username'";
 	$ris = mysql_query($query, $connessione) or die (mysql_error());
 	$riga=mysql_fetch_array($ris); 

 	$sesso=$riga['Sesso'];
	$nome=$riga['Nome'];
	$cognome=$riga['Cognome'];
	$mail=$riga['Mail'];
	$data_di_nascita=$riga['Data_di_nascita'];
	$citta=$riga['Citta'];
	$provincia=$riga['Provincia'];
	$bikeouter_da=$riga['BikeOuter'];	
	$ultima_sessione=$riga['ID_ultima_sessione']; 
	$prenotazione=$riga['ID_prenotazione']; 
	$img=$riga['Img'];
	$ID_biker= $riga['ID'];
	$preferitaa= $riga['ID_bici_preferita'];

	 $query5 = "SELECT * FROM bicicletta WHERE ID_bici = '$preferitaa'";
      $ris5 = mysql_query($query5, $connessione) or die (mysql_error());
      $riga5=mysql_fetch_array($ris5);
      $nome_bici_preferita= $riga5['Nome_bici'];

   	$query7 = "SELECT * FROM prenotazioni WHERE ID = '$prenotazione'";
    $ris7 = mysql_query($query7, $connessione) or die (mysql_error());
    $riga7=mysql_fetch_array($ris7);
    $bici_attuale= $riga7['ID_bici'];
    $_SESSION['bici_in_uso']= $riga7['ID_bici'];

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
                                    <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue">Log In</a></li>
                        <?php    }   
                            if(($_SESSION["autorizzato"])==1) { ?>
                                    <li><a href="/biciclette.php" data-toggle="modal" class="btn btn-blue">Biciclette</a></li>
                                    <li><a href="/utenti.php" data-toggle="modal" class="btn btn-blue">Utenti</a></li>
                                   <?php if($username!= $_SESSION['username'])	{ ?>
                                     <li><a href="/profilo.php" data-toggle="modal" class="btn btn-blue">Profilo</a></li>
                                    <?php } ?>
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
		<header id="profilo">
			<div>		
				<?php 
						echo '<div class="dati">';
							echo '<h3 class="prof_name" style="color:#3366ff";>';
							echo $username; 
							echo '</h3>';
							if ($img == X)
							{
								echo '<img class="avatar M" src="img/avatar/';
								echo $username; 
								echo '.jpg">';
							}else
								echo '<img class="avatar M" src="img/avatar/avatar.png">';
							if($username==$_SESSION['username']) {?>			
								<div class='upload1'>

									<a href="/profilo.php?mod=1" class="btn btn-blue"> Modifica </a>
								<?php	
									$mod =$_GET['mod'];
									if ($mod==1) {?>

									<form action="upload.php" method="post" enctype="multipart/form-data"><br/>
										<input class="btn btn-blue" name="upload" type="submit" value="Salva" /> <br/><br>
									<input name="image" type="file" size="40" />				
									
									
									 
									<?php } ?>
								</div>
				<?php   	}
						echo '</div>';
						echo '<div class="dati_personali">';	
							echo '<h4 class="white">';
							echo $nome; 
							echo ' ';
							echo $cognome;
							echo '</h4>';

							if ($mod==1) 
							{
								echo '<h4><span class="M">Email: '; 
							 ?>
									<input type="text" name="mail" id="mail" class="form-control-utente form-white" placeholder=<?php echo $mail;?> >
								
								<?php echo'</span></h4>';	
							}
							else
							{
							echo '<h4><span class="M">Email: </span><span class="white">';
							echo $mail;
							echo '</span></h4>';
							}
							echo '<h4> <span class="M">Nato il: </span><span class="white">';
							echo $data_di_nascita;
							echo '</span></h4>';

							if ($mod==1) 
							{
								echo '<h4><span class="M">Residenza: '; 
							 ?>
								<input type="text" name="citta" id="citta" class="form-control-utente-citta form-white" placeholder=<?php echo $citta;?> >
								<input type="text" name="provincia" id="provincia" class="form-control-utente-provincia form-white" placeholder=<?php echo $provincia;?> >
								
								<?php echo'</span></h4>'; 

							}
							else
							{
							echo '<h4><span class="M">Residenza: </span><span class="white">';
							echo $citta;
							echo ' (';
							echo $provincia;
							echo ') </span></h4>';
							}
							echo '<h4> <span class="M">BikeOuter dal: </span><span class="white">';
							echo $bikeouter_da;
							echo '</span></h4>';

							echo '<h4> <span class="M">Bici preferita: </span><span class="white">';
							echo "&nbsp;";
							echo'<a class="white" href="bici.php?ID=';
							echo $preferitaa;
							echo '"> ';
							echo $nome_bici_preferita;
							echo '</a></span></h4>';
						echo '</div>';	

						echo '<div class="statistiche_personali">';	

							$query3 = "SELECT SUM(Km), SUM(Cal), SUM(tempo), SUM(Co2) FROM sessione WHERE ID_biker = $ID_biker";
 							$ris3 = mysql_query($query3, $connessione) or die (mysql_error());
 							$riga3=mysql_fetch_array($ris3); 
 							$km=$riga3['SUM(Km)'];
 							$cal=$riga3['SUM(Cal)'];
 							$tempo_in_sella=$riga3['SUM(tempo)'];
 							$co2=$riga3['SUM(Co2)'];

 							if($km==NULL) $km=0;
 							if($cal==NULL) $cal=0;
 							if($tempo_in_sella==NULL) $tempo_in_sella=0;
 							if($co2==NULL) $co2=0;

 							$query4 = "SELECT COUNT(Km) AS uscite FROM sessione WHERE ID_biker = $ID_biker";
 							$ris4 = mysql_query($query4, $connessione) or die (mysql_error());
 							$riga4=mysql_fetch_array($ris4); 
 							$uscite=$riga4['uscite'];


							echo '<br/><h3 style="color:#3366ff; margin-left:35%;"> STATISTICHE </h3>';																			
							echo '<h4><span class="M">Km percorsi: </span><span class="white">';
							echo $km;
							echo ' Km</span>';
							echo ' <span style="margin-left:3%;" class="M"> Calorie bruciate: </span><span class="white">';
							echo substr($cal, 0, 6);
							echo ' KCal</span>';			
							echo '<span style="margin-left:3%;" class="M">Co2 risparmiato: </span><span class="white">';
							echo substr($co2, 0, 4);
							echo ' Kg</span></h4><h4><span class="M">Tempo in sella: </span><span class="white">';
							echo $tempo_in_sella;
							echo ' h</span>';
							echo '<span style="margin-left:3%;" class="M">Uscite totali: </span><span class="white">';
							echo $uscite;
							echo '</h4> </span>';
						echo '</div>';	
						?>
				

			</div>
			<div class="bike">
				<?php	
					if($prenotazione ==-1)
					{	
						if($username==$_SESSION['username']) 
							{
								echo '<br/><h5  class ="center M" > Prenota la tua bici asesso!<br></br>';
								echo '<a href="/biciclette.php?prenota=1" data-toggle="modal" class="btn btn-blue">Prenota</a></h5>';
							}
						else 
							echo '<br/><h5 class ="center M spazio_laterale" > In questo momento non sto usando alcuna bici </h5>';	

					}
					else
					{
						$query1 = "SELECT *  FROM bicicletta WHERE ID_bici = '$bici_attuale'";
					 	$ris1 = mysql_query($query1, $connessione) or die (mysql_error());
					 	$riga1=mysql_fetch_array($ris1);
						$piace=$riga1['Mi_piace'];
						$disponibili=$riga1['Numero_disponibili'];
						$nome_bici=$riga1['Nome_bici'];
						$img_bici=$riga1['Foto'];
						$_SESSION['bici_preferita']=$bici_attuale;

						if ($mod==1)
							{
								echo'</br><div class="center"><a href="/biciclette.php?cambio=1&prenota=1" data-toggle="modal" class="btn btn-blue">Cambia Bicicletta</a><br/>';
							}
							else									
								echo '<br/><h5  class ="center M" > <B>In questo momento sto usando</B> </h5>';
						
						echo'<a class="white" href="bici.php?ID='; echo $bici_attuale; echo '">';
						echo '<div class =" desrciption center" class="description M" style="margin-top: -13%;"><h4 class="M">';  echo $nome_bici;	echo '</h4>';									echo '<img class="avatar fixed_bp M';
								echo '" src="img/bikes/';
									if ($img_bici==X)
									{
										echo $nome_bici; 
										echo '.jpg">';
									}
									else
									{
										echo 'avatar.png">';
									}	
									echo'</a>';								
			 					echo "<br/>";
			 					if ($mod==1)
			 					{	
			 						if($nome_bici==$nome_bici_preferita)
									echo'<img src="img/icons/Like.png" class=" bike_pref ">';
								else
									echo '<input type="checkbox" name="preferita" id="preferita" ><label class="preferita" for="preferita"></label>'; 

			 						
							 ?>

								
								<?php 
 										// $query6 = "SELECT * FROM prenotazioni WHERE ID_biker = '$ID_biker' AND ID_bici = '$bici_attuale'";
								   		//	$ris6 = mysql_query($query6, $connessione) or die (mysql_error());
								   		//	$riga6=mysql_fetch_array($ris6);
							}	
							else{
								if($nome_bici==$nome_bici_preferita)
									echo'<img src="img/icons/Like.png" class=" bike_pref" title="Preferita">';
								else
									echo'<img src="img/icons/Like.png" class=" preferita" title="Preferita">';
							}	 					
		 					echo'</div>';	
		 					
		 				
					
						/*if ($ultima_sessione == 0)
						{
							if ($mod==1) 
							{
								echo '<h5><span class="M center">Città: '; 
							 ?>
									<input type="text" name="citta_ultima" id="citta_ultima" class="form-control-utente-citta form-white" placeholder= >
								
								<?php echo'</span></h5>';

								echo '<h5><span class="M">Km percorsi: '; 
							 ?>
									<input type="text" name="km" id="km" class="form-control-utente-km form-white" placeholder= >
								
								<?php echo'</span></h5>';

								echo '<h5><span class="M">Tempo impiegato: '; 
							 ?>
									<input type="text" name="tempo" id="tempo" class="form-control-utente-tempo form-white" placeholder= >
								
								<?php echo' h</span></h5>';
							}else
							echo '<br/><h4  class ="center M" > Ancora non ho fatto nemmeno un giro! </h4><br/><br/>';
						}
						else
						{*/
						echo '<br/><h4  class ="center M" > Statistiche ultima sessione </h4>';
						$query2 = "SELECT *  FROM sessione WHERE ID_sessione = '$ultima_sessione'";
					 	$ris2 = mysql_query($query2, $connessione) or die (mysql_error());
					 	$riga2=mysql_fetch_array($ris2);
					 	$citta_ultima=$riga2['Citta'];
					 	$km_2=$riga2['Km'];
					 	$cal_2=$riga2['Cal'];
					 	$tempo=$riga2['tempo'];
					 	$data=$riga2['data'];
					 	$co2_2=$riga2['Co2'];

					 		if ($mod==1) 
							{
								echo '<h5><span class="M center">Citta: '; 
							 ?>
									<input type="text" name="citta_ultima" id="citta_ultima" class="form-control-utente-citta form-white" placeholder= >
								
								<?php echo'</span></h5>';

								echo '<h5><span class="M">Km percorsi: '; 
							 ?>
									<input type="text" name="km" id="km" class="form-control-utente-km form-white" placeholder=km >
								
								<?php echo' Km</span></h5>';

								echo '<h5><span class="M">Tempo impiegato: '; 
							 ?>
									<input type="text" name="tempo" id="tempo" class="form-control-utente-tempo form-white" placeholder=h.m >
								
								<?php echo' h</span></h5>';
								echo'</br><div class="center"><input class="btn btn-blue " name="upload" type="submit" value="Salva" /></div> <br/><br>';
							}

							else
							{
								echo '<h5 class="center"><span class="M">Città: </span><span class="white">';
								echo $citta_ultima;
								echo '</br><span class="M">Km percorsi: </span><span class="white">';
								echo $km_2;
								echo ' Km</span>';
								echo '</br> <span class="M"> Calorie bruciate: </span><span class="white">';
								echo $cal_2;
								echo ' KCal</span>';			
								echo '</br><span class="M">Co2 risparmiato: </span><span class="white">';
								echo $co2_2;
								echo ' Kg</span></br><span class="M">Tempo in sella: </span><span class="white">';
								echo substr($tempo, 6, 11);
								echo ' h</span>';						
								echo ' </span></h5>';
							}				 		
						//}
					}
				?>
			</div>
		</header>
			
	</div>
</form>

</body>


	<footer >  
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
    </form>
</html>