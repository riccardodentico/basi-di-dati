<?php
    //elimina un gioco dal database
	require "libreria.php";
	session_start();
	$id_game= $_POST['indice'];
	$dbconn = connessione();
	$sql = $dbconn->prepare("DELETE FROM VIDEOGIOCHI
								WHERE IDGioco = $id_game");
	$sql->execute();

	header("Location:" . $_SERVER['HTTP_REFERER']);
?>
