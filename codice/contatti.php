<?php
    /*Questa pagine php stampa la mappa della nostra sede legale ed un form che permette all'utente di contattare gli amministratori del sito per ricevere assistenza.*/
    require "libreria.php";  
    session_start();
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/product/product.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">>
    <link rel="stylesheet" href="./bootstrap-4.1.0/search.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/carousel/carousel.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <title>Contatti</title>
  </head>
  <body style="background-color: whitesmoke" >
    <!-- INIZIO NAV BAR-->  
    <?php nav(); ?>
      <!-- FINE NAV BAR -->
      
      <!-- SEZIONE CENTRALE -->   
        <section id="contact">
        <br> <br> <br> <br>
        <div class="container mt-5">
            <div class="well well-sm">
            	<h3><strong>Contatti</strong></h3>
            </div>
            <div class="row">
            	<div class="col-md-7"> <!-- Richiesta della posizione per la stampa della mappa -->
                	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
            	</div>
            	<div class="col-md-5">
                	<h4><strong>Invia un messaggio</strong></h4>
                	<form> <!-- Form per la visualizzazione dei campi da inserire per inviare un messaggio di posta -->
                		<div class="form-group">
                    		<input type="text" class="form-control" name="" value="" placeholder="Name">
                		</div>
                		<div class="form-group">
                    		<input type="email" class="form-control" name="" value="" placeholder="E-mail">
                		</div>
                		<div class="form-group">
                    		<input type="tel" class="form-control" name="" value="" placeholder="Phone">
                		</div>
                		<div class="form-group">
                    		<textarea class="form-control" name="" rows="3" placeholder="Message"></textarea>
                		</div>
                		<button class="btn btn-default" type="submit" name="button">
                    		<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Invia
                		</button>
                	</form>
            	</div>
            </div>
        </div>
       </section>
    <?php footer();?> <!-- Stampa del footer -->
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>