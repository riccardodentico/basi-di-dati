<?php // Rimuove un gioco dal carrello
	require "libreria.php";
	session_start();
	$id_gioco= $_POST['indice'];
	array_splice($_SESSION['id_array'],$id_gioco, 1);
	header("Location: inserisci.php");
?>
