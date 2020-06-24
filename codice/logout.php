<?php // Al logout di un utente, chiude la sessione
    require "libreria.php";
    if (!isset($_SESSION))
        session_start();
    session_unset();
    session_destroy();
    if (isset( $_SESSION['id_array'])){
    	unset( $_SESSION['id_array']);
     }
    $_SESSION['id_array']=array();  //resetto l'array del carrello
    header('Location:index.php');
    exit();
?>