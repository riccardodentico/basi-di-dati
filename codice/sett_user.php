<?php 
//Questa pagina serve a modificare i dati nella pagina il mioprofilo.php dell'utente. 

require "libreria.php";
session_start();
if(!isset($_SESSION['nome_utente'])){
            header("Location: login.php");
}
$login=$_SESSION['nome_utente'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$indirizzo=$_POST['indirizzo'];
$telefono=$_POST['telefono'];
$password=$_POST['password'];


  // si controlla la validita' delle credenziali con la funzione definita nel database 
 $dbconn = connessione();
    if($nome!=''){
        set_user($dbconn,$nome,$login,'Nome');
    }
    if($cognome!=''){
        set_user($dbconn,$cognome,$login,'Cognome');
    }
    if($indirizzo!=''){
        set_user($dbconn,$indirizzo,$login,'Indirizzo');
    }
    if($telefono!=''){
        set_user($dbconn,$telefono,$login,'Telefono');
    }
    if($password!=''){
        set_user($dbconn,$password,$login,'Password');
    }

    header("Location: ilmioprofilo.php");
?>



