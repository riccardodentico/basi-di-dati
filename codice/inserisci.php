<?php
    /*Questa pagina contiene il carrello dei giochi che si ordinano. Quando viene chiamata dalla pagina search.php inserisce in coda il gioco che l'utente vuole acquistare. Da questa pagina si arriva a conferma ordine*/

    require "libreria.php";
    session_start();
    if($_POST['indice']){
        $id_gioco= $_POST['indice'];
        if($id_gioco){
            session_start();
            $_SESSION['id_array'][]=$id_gioco;
        }
    }
?>
    <!-- Pagina dedicata alla gestione dell'inserimento di un ordine-->
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
        <title>Carrello</title>
    </head>

    <body style="background-color: white">
        <div>
        <?php
            //stampa della navbar
            nav();
            //controllo se ci sono ordini nel carrello
            if(count($_SESSION['id_array'])>0){
                $totale=0; 
                $arrlength = count($_SESSION['id_array']);
                //stampo il numero degli elementi presenti nel carrello
                echo" <br><br><div class='col-md-6 order-md-2 mb-4' style='margin: 0 auto'>
                <h4 class='d-flex justify-content-between align-items-center mb-3'>
                    <span class='text-muted'>Il tuo carrello:</span>
                    <span class='badge badge-secondary badge-pill'>{$arrlength}</span>
                </h4>
                <ul class='list-group mb-3'>";
                    for($x = 0; $x < $arrlength; $x++) {
                    
                        $dbconn = connessione(); // Selezione da VIDEOGIOCHI, i giochi inseriti con relativa piattaforma e prezzo
						$sql = $dbconn->prepare("SELECT * FROM VIDEOGIOCHI WHERE VIDEOGIOCHI.IDGioco = {$_SESSION['id_array'][$x]}");
						$sql->execute();
                        //prendo i valori ricevuti dalla query
                        if ($sql->rowCount() > 0) { 
                            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                                $idgioco=$row["IDGioco"];
                                $titolo=$row["Titolo"];
                                $piattaforma=$row["Piattaforma"];
                                $prezzo=$row["Prezzo"];
                                $totale=$totale+$prezzo;
                            
                            //stampo una tabella con i dettagli dei videogiochi
                            echo "
                            <li class='list-group-item d-flex justify-content-between lh-condensed'>
                                <div>
                                    <h5 class='my-0'>{$titolo}</h5><br>
                                    <small class='text-muted'>Piattaforma: {$piattaforma}</small>
                                </div>
                                <span class='text-muted'>"; 
                                //bottone che permette di elimare un videogioco dall'ordine
                                echo "<form action='remove.php' method='post'>
                                    <input type='hidden' name='indice' id='indice' value='{$x}'>";
                                echo "<button type='submit' class='btn btn-danger btn-sm' style='float: right'>x</button></form>
                                <br><br>{$prezzo}</span>
                            </li> ";
                            }
                        }
                    }
                    //totale dell'ordine
                    echo(" <li class='list-group-item d-flex justify-content-between'>
                    <span>Totale EUR</span> 
                        <strong>{$totale}</strong>
                    </li>
                </ul>
                <div class='row'>
                        <div class='col-sm-10'>
                        <a href='search.php'type='button' class='btn btn-secondary' >Continua Shopping</a>
                    </div>
                    <div class='col-sm-2'>
                        <a href='conferma.php' type='button' class='btn btn-primary'>Ordina ora</a>
                    </div>
                </div>
            </div>");//permette di scegliere se continuare ad acquistare oppure ordinare.
            }
            else{
                //se non ci sono prodotti nel carrello
                echo("<br><br><br><h1 class='text-center'>Il carrello è vuoto</h1>");
            }
        
            echo "</div>";
            //se il footer ha piu di 3 elementi 
            if( $arrlength > 3){
                footer();
            }
            else{// se il footer ha meno di 3 elementi lo fissiamo in basso 
                echo"<div class='fixed-bottom'>";
                    footer();
                echo"</div>";
            }  
        ?>
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
    
