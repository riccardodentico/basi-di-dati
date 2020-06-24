<?php
    /*Questa e la home page del sito che mostra un carousel con 3 videogicohi con la possibilita di acquistarli e mostra dei dettagli su alcuni giochi.*/
  require "libreria.php";
  session_start();
?>
    <!--Home page-->
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

        <title>Home Page</title>
    </head>

    <body style="background-color: white">
        <!-- Stampa della navbar -->
        <?php nav(); ?>
        <!--stampa del carousel con 3 immagini di videogiochi e con la possibilita di acquistare -->
        <main role="main">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Rappresentazione delle slide scorrevoli -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide" src="./img/photo11.jpg">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>The Elder Scrolls V Skyrim</h1>
                                <div class="jumbotron">
                                    <p style="color: black">Vincitore di oltre 200 premi "Gioco dell'Anno", Skyrim Special Edition porta sui vostri
                                        schermi il fantasy epico con incredibile dettaglio. La Special Edition include il
                                        pluripremiato gioco completo e tutti gli add-on, più nuove funzionalità, come grafica
                                        ed effetti rinnovati, raggi di luce volumetrici, campo visivo
                                    </p>
                                    <form action='inserisci.php' method='post'>
                                        <input type='hidden' name='indice' id='indice' value='1'>
                                        <button type='submit' class="btn btn-lg btn-primary">Acquista ora</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="./img/photo2.jpg" alt="Second slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Forza Motorsport 7</h1>
                                <div class="jumbotron">
                                    <p style="color: black">Forza Motorsport 7 immerge i giocatori nell'emozionante brivido delle competizioni. Dalla
                                        padronanza della nuova campagna ispirata agli sport motoristici alla raccolta di
                                        una vasta gamma di auto per vivere l'eccitazione della guida al limite, questa è
                                        Forza reinventato</p>
                                    <form action='inserisci.php' method='post'>
                                        <input type='hidden' name='indice' id='indice' value='8'>
                                        <button type='submit' class="btn btn-lg btn-primary">Acquista ora</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="third-slide" src="https://initiate.alphacoders.com/images/540/cropped-4800-1600-540191.png?585" alt="Third slide">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1 class="text-center" style="color: black">Battlefield 5</h1>
                                <div class="jumbotron">
                                    <p style="color: black">Partecipa al più grande conflitto della storia in Battlefield™ V, che segna il ritorno
                                        alle origini della serie in una Seconda Guerra Mondiale mai tanto realistica. Affronta
                                        coinvolgenti battaglie multigiocatore con la tua squadra nelle imponenti Grandi operazioni
                                        e nella modalità in cooperativa Forze combinate, oppure emozionati nelle avvincenti
                                        e toccanti Storie di guerra per giocatore singolo</p>
                                    <form action='inserisci.php' method='post'>
                                        <input type='hidden' name='indice' id='indice' value='11'>
                                        <button type='submit' class="btn btn-lg btn-primary">Acquista ora</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Inizio della descrizione del singolo gioco -->
            <div class="container marketing" style="">
                
                <hr class="featurette-divider">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Fallout 4</h2>
                        <h4 class="text-muted">Bethesda Game Studios</h4>
                        <p class="lead">Bethesda Game Studios, pluripremiati creatori di Fallout 3 e The Elder Scrolls V: Skyrim, vi danno
                            il benvenuto nel mondo di Fallout 4, il loro gioco più ambizioso di sempre e la nuova generazione
                            dei giochi in un mondo aperto.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="https://images-eu.ssl-images-amazon.com/images/I/51nrjbKwsBL._SS500.jpg" class="featurette-image img-fluid mx-auto"
                            alt="Generic placeholder image">
                    </div>
                </div>
                <hr class="featurette-divider">
                
                <!-- Inizio della descrizione del singolo gioco -->
                <div class="row">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Monster Hunter World</h2>
                        <h4 class="text-muted">Capcom</h4>
                        <p class="lead">Monster Hunter è un'entusiasmante serie GdR d'azione che ti mette nei panni di un esperto cacciatore,
                            catapultato in un vivace mondo popolato da enormi e temibili mostri. "Monster Hunter: World",
                            l'ultimo capitolo di questa epica saga, offre un'esperienza ancora più ricca e immersiva.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61F28wRiezL.jpg" class="featurette-image img-fluid mx-auto" d
                            alt="Generic placeholder image">
                    </div>
                </div>

                <hr class="featurette-divider">
                <!-- Inizio della descrizione del singolo gioco -->
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Fifa 2018</h2>
                        <h4 class="text-muted">Electronic Arts</h4>
                        <p class="lead">Grazie al motore Frostbite, EA SPORTS FIFA 18 attenua il confine tra il mondo reale e quello virtuale
                            dando vita a giocatori, squadre e atmosfere del calcio.Inoltre, con FIFA Ultimate Team le più
                            grandi icone FUT, incluso Ronaldo Nazário, approdano su PlayStation 4. </p>
                    </div>
                    <div class="col-md-5">
                        <img src="https://static1.squarespace.com/static/57053d4c01dbae40ae9ccb39/5707c2b101dbaea45fd78966/59fce2738e7b0fcb9370c2a0/1526920048529/fifa18.jpg?format=500w"
                            class="featurette-image img-fluid mx-auto" alt="Generic placeholder image">
                    </div>
                </div>

                <hr class="featurette-divider">

                <!-- Fine descrizione dei giochi -->
            </div>
            <!-- Stampa del Footer -->
            <?php footer(); ?>
        </main>
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