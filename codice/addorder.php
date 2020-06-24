<?php 
    /*Questa pagina php aggiunge un ordine nel database nella tabella ORDINI riceve i dati dalla pagina conferma.php.
    Questa pagina conclude l'ordine e indicizza l'utente nella home page.*/

    require "libreria.php"; //rende disponibili le funzioni implementate nel file libreria.php
    session_start(); //permette al php di accedere alle variabili di sessione

	//variabili passate con il metodo POST
    $login= $_SESSION['nome_utente']; //nome univoco per ogni utente
    $arraygiochi=$_SESSION['id_array']; //array dei giochi presenti nel carrello
    $lunghezza=count($arraygiochi); //numero giochi nel carrello
    $dbconn = connessione(); //connessione al database
    $metodo=$_POST['metodo']; //metodo di pagamento

    //corpo della query SQL
    $sql =$dbconn->prepare("INSERT INTO ORDINI (`Data`, `Pagamento`, `Login`)
				VALUES (NOW(), '$metodo', '$login')");
    $sql->execute(); //esecuzione della query
    $id_order= $dbconn->insert_id; //indice dell'ordine appena creato
    
    for($x = 0; $x < $lunghezza; $x++){ //carica tutti i prodotti del carrello
		//creazione del corpo delle query
        $sql =$dbconn->prepare("INSERT INTO `Ordini_Videogiochi`(`IDOrdine`, `IDGioco`, `Quantita`)
					VALUES ($id_order, {$arraygiochi[$x]}, 1)");
        $sql->execute();
    }
    unset($_SESSION['id_array']); //svuota il carrello
    header("Location: index.php"); //ritorna alla home del sito
 ?>