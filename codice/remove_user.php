<?php
    //elimina un utente
	require "libreria.php";
	session_start();
	$id_login= $_POST['indice'];
	$dbconn = connessione();
	$sql = $dbconn->prepare("DELETE FROM UTENTI
							WHERE Login = '$id_login'");
	$sql->execute();
	header("Location:" . $_SERVER['HTTP_REFERER']);
?>
