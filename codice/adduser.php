<?php
    /*Questa pagine php aggiunge un utente nel database nella tabella UTENTI. Viene usato nella pagina registrazione.php
    per inserire i nuovi utenti nel database.*/

	require "libreria.php"; //rende disponibili le funzioni implementate nel file libreria.php
	//variabili passate con il metodo POST
	$login = $_POST['login'];
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$indirizzo = $_POST['indirizzo'];
	$telefono = $_POST['telefono'];
	$password = $_POST['password']; //password
	$r_password= $_POST['cpassword']; //conferma password
	
	if($password===$r_password){ //se la password è uguale alla conferma password aggiungo l'utente
		$dbconn = connessione(); //connessione al database
		//corpo della query SQL
        $sql =$dbconn->prepare("INSERT INTO UTENTI (`Login`, `Nome`, `Cognome`, `Indirizzo`, `Telefono`, `Password`)
				VALUES ('$login', '$nome', '$cognome', '$indirizzo', '$telefono', '$password')");
        $sql->execute(); //esecuzione della query 
	}
	header("Location: registrazione.php"); //in caso di errore l'utente viene redirezionato alla pagina di registrazione
                                           //la pagina registrazione.php con il Javascript penserà a stampare un messaggio
                                           // di errore.
?>
