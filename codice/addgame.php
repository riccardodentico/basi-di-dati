<?php 
    /*Questa pagina php aggiunge un gioco ricevuto dal $_POST['titolo'] ricevuto dalla pagina dashboard_videogiochi.php nel 
    database nella tabella VIDEOGIOCHI tramite un insert */


    require "libreria.php"; //rende disponibili le funzioni implementate nel file libreria.php
    session_start(); //permette al php di accedere alle variabili di sessione
	
    //variabili passate con il metodo POST
    $titolo=$_POST['titolo'];  //titolo del gioco
    $piattaforma=$_POST['piattaforma']; //titolo della piattaforma
    $prezzo=$_POST['prezzo'];  //prezzo del gioco
    $quan_magazzino=$_POST['quan']; //quantità in magazzino del gioco

    $dbconn = connessione(); //connessione al database
        
    //corpo della query SQL
	$sql =$dbconn->prepare("INSERT INTO VIDEOGIOCHI (`Titolo`, `Piattaforma`,`Prezzo`, `Quan_magazzino`)
				VALUES ('$titolo','$piattaforma', '$prezzo','$quan_magazzino')");
    $sql->execute(); //esegue la query
    header("Location:" . $_SERVER['HTTP_REFERER']); //ritorno alla pagina visualizzata precedentemente. 
 ?>