<?php
  //Questa pagina permette all'utente di registrarsi al sito. 
  require "libreria.php";
  session_start();
?>
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

    <body style="background-image: url(http://hdqwalls.com/wallpapers/horizon-zero-dawn-4k-game-on.jpg)">
        <?php
          nav(); //navbar
        ?>
       
        <br>
        <br>
        <br>
        <br>
        <!-- Form dedicato alla registrazione dei dati utente -->
        <form class="form-signin" method="post" name="registrazione" action="adduser.php">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal" style="color: white">Registrati su Optimus_SQL</h1>
            </div>
            <div class="form-label-group">
                <input type="text" id="login" name="login" class="form-control" placeholder="Inserisci nome utente" required autofocus>
                <label for="login">Inserisci nome utente</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Inserisci nome" required autofocus>
                <label for="nome">Inserisci nome</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="cognome" name="cognome" class="form-control" placeholder="Inserisci cognome" required autofocus>
                <label for="cognome">Inserisci cognome</label>
            </div>
            <div class="form-label-group">
                <input type="text" id="indirizzo" name="indirizzo" class="form-control" placeholder="Inserisci indirizzo" required autofocus>
                <label for="indirizzo">Inserisci indirizzo</label>
            </div>
            <div class="form-label-group">
                <input type="phone" id="telefono" name="telefono" class="form-control" placeholder="Inserisci telefono" required autofocus>
                <label for="telefono">Inserisci telefono</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Inserisci Password" required autofocus>
                <label for="password">Inserisci password</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Conferma Password" required>
                <label for="cpassword">Conferma password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" onclick="check()" type="submit">Registrati</button>

            <a href="./login.php">Gia registrato? Effettua il login</a>
        </form>
        <!-- Fine del form -->

        <div class="" style="width: 100%; background-color: white">
            <?php
                footer(); //footer
            ?>
        </div>
        <script type="text/javascript">
            /*Script che controlla se la password è uguale al conferma password.*/
            function check() {
                var password = document.registrazione.password.value;
                var cpassword = document.registrazione.cpassword.value;
                if (password != cpassword) {
                    alert("Le due password non coincidono, riprova!");
                    return false;
                } else {
                    alert("Registrazione effettuata con successo!");
                    return true;
                }
            }
        </script>
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