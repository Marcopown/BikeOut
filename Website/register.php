<?php

	session_start();
	include("connessione_db.php");
	include("config.php");

	mysql_select_db("$db_name",$connessione);

//	$variabile locale=mysql_real....(prendilo dal form);
	$username=mysql_real_escape_string($_POST["username"]);
	$nome=mysql_real_escape_string($_POST["nome"]); 
	$cognome=mysql_real_escape_string($_POST["cognome"]);
	$data_di_nascita=mysql_real_escape_string($_POST["data_di_nascita"]);
	$citta=mysql_real_escape_string($_POST["citta"]);
	$provincia=mysql_real_escape_string($_POST["provincia"]);
	$password=mysql_real_escape_string($_POST["password"]);
	$c_password=mysql_real_escape_string($_POST["c_password"]);
	$mail=mysql_real_escape_string($_POST["mail"]);

	if ($_POST["F"] == 'F')
		$sesso= "F";
	else 
		$sesso= "M";

	//controllo password c_password
	if($password!= $c_password)
	{
		$_SESSION["error_n"] = 2;
		echo '<script lnguage=javascript> document.location.href="redirect.php" </script>';
		mysql_close($connessione);
	}

	//controllo integrità username
	$query1="SELECT * FROM biker WHERE Username='$username'";
	$ris1 =mysql_query($query1, $connessione) or die (mysql_error());
	$riga1= mysql_fetch_array($ris1);

	//salvo in cod1 l'username della query1
	$cod1=$riga1['Username'];
	
	//se cod1 != NULL vuol dire che l'username è gia presente nel DB
	if($cod1 != NULL)	
	{	
		$_SESSION["error_n"] = 1;
		$_SESSION["error"] = $cod1;
		echo '<script lnguage=javascript> document.location.href="redirect.php" </script>';
	}
	else
	{
		//inserisco nel DB il nuovo utente
		$query2="INSERT INTO biker(Username, Nome, Cognome, Data_di_nascita, Citta, Provincia, Password, Mail, Sesso)
						VALUES ('$username','$nome','$cognome','$data_di_nascita','$citta','$provincia','$password','$mail', '$sesso')";
		$ris2 =mysql_query($query2, $connessione) or die (mysql_error());

		$ID= $username;
		$_SESSION['ID'] = $ID;
		$_SESSION["autorizzato"]=1;

		 $_SESSION["error_n"] = 0;
 		echo '<script lnguage=javascript> document.location.href="redirect.php" </script>';
	}
	mysql_close($connessione);

	
?>

