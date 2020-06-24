<?php
    //elimina un ordine 
	require "libreria.php";
	session_start();
	$id_ordine= $_POST['indice'];
	$dbconn = connessione();
	$sql = $dbconn->prepare("DELETE FROM ORDINI
								WHERE IDOrdine = $id_ordine");
	$sql->execute();
	header("Location:" . $_SERVER['HTTP_REFERER']);
?>
