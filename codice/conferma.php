<!doctype html>
<?php 
  /*Questa pagina stampa un prospetto dell'ordine che l'utente sta per fare. Stampa una tabella che contiene gli articoli che l'utente sta per acquistare. Una scelta del metodo di pagamento e un form per i dati della carta di credito. Con il bottone Ordine posto in fondo, si andrà alla pagine addorder.php il quale provvederà ad aggiungere l'ordine nel databse. L'utente riceverà una conferma di conferma ordine (tramite una funzione js) contenuta in questa pagina e verrà ridirezionato alla home page del sito.*/

  require "libreria.php";
  session_start();
  /*controllo che l'utente è loggato*/
  if(!isset($_SESSION['nome_utente'])){
      header("Location: login.php");
  }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/product/product.css">
     <link rel="stylesheet" href="./bootstrap-4.1.0/search.css">
     <link rel="stylesheet" href=" https://getbootstrap.com/docs/4.1/examples/floating-labels/floating-labels.css">
     <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">
    <title>Conferma ordine</title>
  </head>
  <body style='margin:0;
   padding:0;
   height:100%;'>
     <!-- stampa la navbar del sito. La funzione è contenuta in libreria.php -->
      <?php nav(); ?>  
      
    <br><br><br><br><br>
      <!-- div che contiene il carrello dei prodotto che l'utente sta per acquistare -->
    <div style="width: 100%"> 
      <div class="text-center">
        <h2>Conferma Ordine</h2>
        <p class="lead">Rivedi il tuo ordine e seleziona la modalità di pagamento che preferisci e conferma.</p>
      </div>  
      <div class=" col-lg-6 col-md-8 col-sm-10 col-xs-12" style="margin: 0 auto">
        <h4 class=" align-items-center ">
            <span class="text-muted">Il tuo carrello:</span> 
            <?php
              /*Questo php serve per stampare i prodotti in maniera dinamica*/
        
              $totale=0;
              $arrlength = count($_SESSION['id_array']);
              
              echo"
                <span class='badge badge-secondary badge-pill'>$arrlength</span></h4><ul class='list-group '>";
              for($x = 0; $x < $arrlength; $x++) {   
                $dbconn = connessione(); // Connessione al database e selezione tramite query di tutti i videogiochi da VIDEOGIOCHI
                $sql =$dbconn->prepare("SELECT * FROM VIDEOGIOCHI WHERE VIDEOGIOCHI.IDGioco = {$_SESSION['id_array'][$x]}");
                $sql->execute();  
                
                if ($sql->rowCount() > 0) {  //controllo se la query ha prodotto risultati
                     while ($row =$sql->fetch(PDO::FETCH_ASSOC)) {
                         
                        /*salvo i dati ricevuti dalla query*/
                        $idgioco=$row["IDGioco"];
                        $titolo=$row["Titolo"];
                        $piattaforma=$row["Piattaforma"];
                        $prezzo=$row["Prezzo"];
                        $totale=$totale+$prezzo;
            
                     	echo "
                          <li class='list-group-item '>
                              <div>
                                <h6 class=''>$titolo</h6>
                                <small class='text-muted'>{$piattaforma}</small>
                              </div>
                              <span class='text-muted'>{$prezzo}</span>
                          </li>";
               	    }	
               }	
              }
             /*Dopo aver stampato tutti i prodotti presenti nel carrello dell'utente. Stampo il totale dell'ordine, i radio button per la scelta del pagamento e il form per inserire i dati della carta di credito*/
           	 echo" 
                <li class='list-group-item '>
                    <span>Totale EUR</span>
                    <strong>{$totale}</strong>
                </li>
          	 </ul>
             <br><br> 
             <h4 class=''>Pagamento</h4>
             <form class='' method='post' action='addorder.php'>
               <div>
                  <div class='custom-control custom-radio'>
                    <input id='credit' name='metodo' type='radio' class='custom-control-input' value='Credit Card' checked required>
                    <label class='custom-control-label' for='credit'>Credit card</label>
                 </div>
                 <div class='custom-control custom-radio'>
                    <input id='debit' name='metodo' type='radio' class='custom-control-input' value='Debit Card' required>
                    <label class='custom-control-label' for='debit'>Debit card</label>
                 </div>
                 <div class='custom-control custom-radio'>
                    <input id='paypal' name='metodo' type='radio' class='custom-control-input' value='PayPal' required>
                	<label class='custom-control-label' for='paypal'>PayPal</label>
              	 </div>
               </div>
             <div class='row'>
              <div class='col-md-6 '>
                <label for='cc-name'>Name on card</label>
                <input type='text' class='form-control' id='cc-name' placeholder='' required>
                <small class='text-muted'>Full name as displayed on card</small>
                <div class='invalid-feedback'>
                  Name on card is required
                </div>
              </div>
              <div class='col-md-6'>
                <label for='cc-number'>Credit card number</label>
                <input type='text' class='form-control' id='cc-number' placeholder='' required>
                <div class='invalid-feedback'>
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-3 mb-3'>
                <label for='cc-expiration'>Expiration</label>
                <input type='text' class='form-control' id='cc-expiration' placeholder='' required>
                <div class='invalid-feedback'>
                  Expiration date required
                </div>
              </div>
              <div class='col-md-3 mb-3'>
                <label for='cc-cvv'>CVV</label>
                <input type='text' class='form-control' id='cc-cvv' placeholder='' required>
                <div class='invalid-feedback'>
                  Security code required
                </div>
              </div>     
                </div>
      		<hr class='mb-4'>
            <button class='btn btn-primary btn-lg' onclick='check()' type='submit'>Ordina</button>   
      </div>
      </form> " ?> <!-- Fine codice html per la rappresentazione grafica -->      
            </h4></div>
      
      </div>
         <?php footer(); ?>  <!-- Richiamo e stampa del footer (barra di navizione in fondo alla pagina) -->
       
      <script type="text/javascript">
          /*Questo script stampa il messaggio dell'avvenuta ordine*/  
          function check(){ 
                alert("Ordine effettuato con successo");  
                return true;
            }     
      </script> 
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>