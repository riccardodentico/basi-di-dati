<?php
    //Questa pagina stampa un form con il quel l'utente potrà loggarsi.
	require "libreria.php";
	session_start();
?> <!-- Pagina dedicata all'autenticazione di un utente nel database (Login utente) -->
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
        <link rel="stylesheet" href=" https://getbootstrap.com/docs/4.1/examples/floating-labels/floating-labels.css">
        <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">

        <title>Login</title>
    </head>

    <body style="background-image: url(https://newevolutiondesigns.com/images/freebies/4k-wallpaper-2.jpg)">
        <!-- navbar -->
        <?php 
        	nav(); 
        ?>
        
        <br>
        <br> <!-- Form contenete il menu di login/registrazione -->
        <form class="form-signin" method="post" action="check.php">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal" style="color: white">Effettua il Login</h1>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Utente" required autofocus>
                <label for="inputEmail">Utente</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Accedi</button>
            <a href="./registrazione.php">Non registrato? Registrati</a>
        </form>

        <div class="fixed-bottom" style="width: 100%;  background-color: white">
            <?php 
            	footer(); 
            ?>
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
