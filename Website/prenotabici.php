<?php
session_start(); //inizio la sessione
//includo i file necessari a collegarmi al db con relativo script di accesso
include("connessione_db.php");
include("config.php");

//mi collego
mysql_select_db("$db_name",$connessione); 
$user=$_SESSION['ID_utente'];
$ID_bici_da_prenotare=$_SESSION['ID_bici_prenota'];
$sprenota=$_GET['sprenota'];

      $query2 = "SELECT ID_prenotazione FROM biker WHERE ID = '$user' ";
      $ris2 = mysql_query($query2, $connessione) or die (mysql_error());
      $riga2=mysql_fetch_array($ris2);

      $verifica_pren=$riga2['ID_prenotazione'];

      if($sprenota==1)
      {
            $today = date("Y-m-d H:i:s");
            $query4 = "UPDATE prenotazioni SET scaduta=1 AND data_restituzione='$today' WHERE ID_biker = '$user' AND ID_bici = '$ID_bici_da_prenotare' AND scaduta=0 ";
            $ris4 = mysql_query($query4, $connessione) or die (mysql_error());

            $query6 = "UPDATE biker SET ID_prenotazione=-1 WHERE ID = '$user' ";
            $ris6 = mysql_query($query6, $connessione) or die (mysql_error());
      }else
      {
            if ($verifica_pren!=-1) //faccio scadere la vecchia prenotazione
            {     
                  //setta la prenotazione scaduta
                  $query3 = "UPDATE prenotazioni SET scaduta=1 WHERE ID_biker = '$user' AND ID_bici = '$ID_bici_da_prenotare' AND scaduta=0 ";
                  $ris3 = mysql_query($query3, $connessione) or die (mysql_error());

                  //resetta l'ID_prenotazione in biker
                  $query7 = "UPDATE biker SET ID_prenotazione=-1 WHERE ID = '$user'";
                  $ris7 = mysql_query($query7, $connessione) or die (mysql_error());
            }      

                  $query = "INSERT INTO prenotazioni (ID_biker, ID_bici) VALUES ('$user', '$ID_bici_da_prenotare')";
                  $ris = mysql_query($query, $connessione) or die (mysql_error());
                  $riga=mysql_fetch_array($ris);

                  $query5 = "SELECT MAX(ID) AS ID FROM prenotazioni";
                  $ris5 = mysql_query($query5, $connessione) or die (mysql_error());
                  $riga5=mysql_fetch_array($ris5);
                  $ID_prenot=$riga5['ID'];

                  $query3 = "UPDATE biker SET ID_prenotazione='$ID_prenot' WHERE ID = '$user' ";
                  $ris3 = mysql_query($query3, $connessione) or die (mysql_error());
            }

            echo '<script language=javascript>document.location.href="profilo.php"</script>'; 
      
?>