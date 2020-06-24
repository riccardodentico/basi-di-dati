<?php
    /*Questa pagina stampa i dettagli del profilo dell'utente, inoltre da questa pagina si possono modificare i dati relativi al proprio profilo*/
  require "libreria.php";
  session_start();
    if(!isset($_SESSION['nome_utente'])){
            header("Location: login.php");
    }
?>
    <!-- Pagina dedicata alla gestione del profilo personale di cada utente -->
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/product/product.css">
        <link rel="stylesheet" href="./bootstrap-4.1.0/search.css">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/carousel/carousel.css">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">
        <!------ Include the above in your HEAD tag ---------->
        <title>Il mio profilo</title>
    </head>

    <body style="background-color: whitesmoke">
        <?php nav();
         // Prelievo da utenti il nome i dati dell'utente che corrispondono all'id
         $dbconn = connessione();
         $id= $_SESSION['nome_utente'];
         $sql =$dbconn->prepare("SELECT * FROM UTENTI WHERE UTENTI.Login='$id'");
         $sql->execute();
        //salvo i valori ricevuti dal risultato della query
         $row = $sql->fetch(PDO::FETCH_ASSOC);
         $nome=$row['Nome'];  
         $cognome=$row['Cognome'];
         $indirizzo=$row['Indirizzo'];
         $telefono=$row['Telefono'];
        // stampo un form che oltre a permettere la rappresentazione dei dati dell'utente permette di modificarli.    
        echo" <br><br><br><br> 
            <h1 class='text-center'>Il mio profilo:</h1><br>
            <div class='col-sm-3' style='margin: 0 auto'>
            <form class='form-signin' method='post' action='sett_user.php' >
                <h6>Nome: $nome</h6>
                 <div class='form-label-group'>
                    <input type='text' id='nome' name='nome' class='form-control' placeholder='Modifica nome utente'>
                 </div>
                 <h6>Cognome: $cognome</h6>
                 <div class='form-label-group'>
                    <input type='text' id='cognome' name='cognome' class='form-control' placeholder='Modifica cognome utente'>
                 </div>
                 <h6>Indirizzo: $indirizzo</h6>
                 <div class='form-label-group'>
                    <input type='text' id='indirizzo' name='indirizzo' class='form-control' placeholder='Modifica indirizzo utente'>
                 </div>
                 <h6>Telefono: $telefono</h6>
                 <div class='form-label-group'>
                    <input type='phone' id='telefono' name='telefono' class='form-control' placeholder='Modifica telefono utente'>
                 </div>
                 <h6>Modifica Password:</h6>
                 <div class='form-label-group'>
                    <input type='password' id='password' name='password' class='form-control' placeholder='Modifica Password'>
                 </div>
               
            <button class='btn btn-lg btn-primary btn-block' type='submit'>Salva</button>
            </form></div> ";
      ?>
        <!-- Footer -->
        <div class="" style="position: absolute; width: 100%; top:80%">
             <?php footer(); ?>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>
    </body>
    </html>
