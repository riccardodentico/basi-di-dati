<?php 
	/*Questa pagina php controlla se le credenziali inserite nella pagina login.php sono corrette per accedere al sito,
    crea una sessione, se l'utente è un admin viene direzionato alla pagina dashboard.php. Stampa un errore se le 
    credenziali sono errate*/

	require "libreria.php";
    //variabili ricevute dal form login.php
	$user=$_POST['login'];  
	$password=$_POST['password'];


	// si controlla la validita' delle credenziali con la funzione definita nel database
	$dbconn = connessione();
	$sql =$dbconn->prepare("SELECT * FROM UTENTI WHERE UTENTI.Login='$user' AND UTENTI.Password='$password'");
    $sql->execute();
    
	if ($sql->rowCount() > 0) {
        session_start();                            // si crea una nuova sessione
		$_SESSION['nome_utente'] = $_POST['login']; // si inserisce il nome utente
		if (!isset( $_SESSION['id_array']))
			$_SESSION['id_array']=array();
        
        if($user==='admin'){
            header("Location: dashboard.php");   
        }
        else{
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
     }
	else
		echo("Attenzione! Credenziali Sbagliate");
?>



