<?php
 //Questa pagina stampa la ricerca che viene prodotta dal testo scritto dall'utente nel form di cerca. Inoltre fa da catalogo //prodotti mostrando tutti i prodotti. Quando un utente clicca su acquista ora il videogiochi viene aggiunto al carrello.
  require "libreria.php";
  session_start();
?>
<html lang='en'>
<head>
    <!-- Required meta tags -->
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/product/product.css">
    <link rel="stylesheet" href="./bootstrap-4.1.0/search.css">
    <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">
    <title>Videogiochi</title>
</head>

<body style='background-color: white'>
    <?php nav(); //navbar?>
    <br> <br>
    <br> <br>
    <br> <br> <br>
    <div class='container'>
        <div class='card-deck mb-3 text-center'>
            <?php
                $richiesta= $_POST['ricerca']; //richiesta dell'utente del videogioco
                $dbconn = connessione();
                //query per la ricerca di un videogioco
				$sql =$dbconn->prepare("SELECT * FROM VIDEOGIOCHI WHERE VIDEOGIOCHI.Titolo LIKE '%$richiesta%'");
				$sql->execute();
                //controllo che la query ha prodotto risultati
                if ($sql->rowCount() > 0) { 
                    if($sql->rowCount() > 1){
                        //stampo il numero di prodotti trovati
                        echo"<div class='col-sm-12 text-center'> <p>La ricerca ha prodotto {$sql->rowCount()} risultati</p></div>";
                    }
                    else{
                        echo"<div class='col-sm-12 text-center'> <p>La ricerca ha prodotto 1 risultato</p></div>";
                    }
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                    //prendo i valori prodotti dalla query
                    $id_gioco= $row['IDGioco'];
                    $name = $row['Titolo'];
                    $piattaforma = $row['Piattaforma'];
                    $prezzo= $row['Prezzo'];
                    $quantita_magazzino= $row['Quan_magazzino'];
                    //stampo i videogiochi trovati dalla query con i dettagli
                    echo  "<div class='col-sm-4'><div class='card mb-4 box-shadow'>
                                <div class='card-header' style='min-height: 10%'>
                                    <h5 class='my-0 font-weight-normal'>{$name}</h5>
                                </div>
                                <div class='card-body'>
                                    <ul class='list-unstyled mt-3 mb-4'>
                                            <img class='card-img-top' src='./img/{$name}.jpg' alt='Copertina {$name}' height=300px >
                                            <br> <br>
                                        <li>Piattaforma:</li>
                                        <li>{$piattaforma}</li>
                                        <h1 class='card-title pricing-card-title'>{$prezzo}€</h1>
                                        
                                    </ul> ";
                    if($quantita_magazzino > 0){
                        //controllo  la quantita del magazzino, se ==0 il gioco non è disponibile 
                        echo "<form action='inserisci.php' method='post'>
                                <input type='hidden' name='indice' id='indice' value='{$id_gioco}'>";
                        echo "<button type='submit' class='btn btn-lg btn-block btn-outline-primary'>Acquista ora</button></form>";                    
                    }else{  //caso del gioco non disponibile, stampo un pulsante disabilitato.
                            echo "<button type='button' class='btn btn-lg btn-block btn-outline-dark' disabled>Non disponibile</button>";
                    }          
                    echo"</div></div></div>";
                 }
                    echo "</div></div></div>";
                    footer();  //footer
                }else{
                    echo "<div style=''><h4>Gioco non presente</h4><br><img src='https://png.icons8.com/metro/1600/sad.png' height=20%></div> </div></div>
                    </div><div class='fixed-bottom'> ";
                    footer();         //footer se non ci sono elementi.
                echo "</div>";
                } ?>
       
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
