<?php
  /*Questa pagina stampa i dettagli degli ordini dell'utente, è possibile eliminare gli ordini fatti dall'utente in questa pagina.*/
    require "libreria.php";
    session_start();

?> <!-- Pagina dedicata alla gestione degli ordini degli utenti-->
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
        <!--- Include the above in your HEAD tag -->

        <!--- Include the above in your HEAD tag -->
        <title>I miei ordini</title>
    </head>
    <body style="background-color: white">
        <?php
            //stampo la navbar
            nav();
        ?>
        <div>
         <?php 
            $arrlength=0; 
            $login=$_SESSION['nome_utente'];
            $dbconn = connessione(); // Selezione da ORDINI, di tutti gli ordini fatti da un utente
            $sql =$dbconn->prepare("SELECT * FROM ORDINI WHERE ORDINI.Login = '{$login}'");
            $sql->execute();
            //stampa il numero dei miei ordini
            echo" <br><br><div class='col-md-6 order-md-2 mb-4' style='margin: 0 auto'>
                <h4 class='d-flex justify-content-between align-items-center mb-3'>
                    <span class='text-muted'>I miei ordini:</span>
                    <span class='badge badge-secondary badge-pill'>{$sql->rowCount()}</span>
                </h4>
                <ul class='list-group mb-3'>";
            //prendo i valori ricevuti dalla query
            if ($sql->rowCount() > 0) { 
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $idordine=$row["IDOrdine"];
                    $data=$row["Data"];
                    $pagamento=$row["Pagamento"];
                //stampo una tabella con tutti gli ordini dell'utente
            echo "  
            <li class='list-group-item d-flex justify-content-between lh-condensed'> 
              <div>
                 <h5 class='my-0'>Codice ordine: {$idordine}</h5><br>
                <h6 class='text-muted'>Data: {$data}</h6>
                <h6 class='text-muted'>Pagamento: {$pagamento}</h6>
              </div>
              <span class='text-muted'>"; 
                //bottone che permette l'eliminazione dell'ordine
                echo "<form action='remove_order.php' method='post'>
                    <input type='hidden' name='indice' id='indice' value='{$idordine}'>";
                echo "<button type='submit' class='btn btn-danger btn-sm' style='float: right'>x</button></form>
              </span>
            </li> "; // Rappresentazione grafica dei dati
             }
          }
        echo("   
          </ul>
          </div>");
        ?>
        </div>
            <?php footer(); ?> <!-- Stampa del footer -->
        
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