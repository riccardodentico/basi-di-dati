<?php
     /*Questo pagine php stampa un dettaglio degli ordini con la possibilità di poterli eliminare. In questa pagina è possibile accedere solo da un profilo admin. */

	require "libreria.php";
	session_start();
    //controllo se il profilo è un admin
	if(!($_SESSION['nome_utente']==='admin')){
		header("Location: index.php");
		exit();
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
      <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/carousel/carousel.css">
      <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bootstrap-4.1.0/Footer-with-button-logo.css">
      <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css">
	<!------ Include the above in your HEAD tag ---------->
    <title>Dashboard ordini</title> 
  </head> 
  <body style="background-color: white">
      <!-- Inizio navbar -->
      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"> 
      	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">HOME</a>
      	<ul class="navbar-nav px-3">
        	<li class="nav-item text-nowrap">
          		<a class="nav-link" href="logout.php">LOGOUT</a>
        	</li>
      	</ul>
      </nav>
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="dashboard_ordini.php">
                  <span data-feather="file"></span>
                  Ordini
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard_videogiochi.php">
                  <span data-feather=""></span>
                  Videogiochi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard_users.php">
                  <span data-feather="users"></span>
                  Utenti
                </a>
              </li>
            </ul>
          </div>
        </nav> <!-- fine navbar -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>  
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              
           	 </div>    
          	</div>
            <div>
         <?php 
            $arrlength=0;
            $login=$_SESSION['nome_utente'];
            $dbconn = connessione(); 
            // Selezione da ORDINI, di tutti gli ordini fatti da un utente
            $sql =$dbconn->prepare("SELECT * FROM ORDINI");
            $sql->execute(); 
    
            //stampo in numero degli ordini totali
            echo" <br><br><div class='col-md-6 order-md-2 mb-4' style='margin: 0 auto'>
                <h4 class='d-flex justify-content-between align-items-center mb-3'>
                    <span class='text-muted'>Ordini totali:</span>
                    <span class='badge badge-secondary badge-pill'>{$sql->rowCount()}</span>
                </h4>
                <ul class='list-group mb-3'>";
                
                //stampo una tabella con i vari dettagli degli ordini
            if ($sql->rowCount() > 0) { 
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $utente=$row["Login"];
                    $idordine=$row["IDOrdine"];
                    $data=$row["Data"];
                    $pagamento=$row["Pagamento"];  
            echo "  
            <li class='list-group-item d-flex justify-content-between lh-condensed'> 
              <div>
                 <h5 class='my-0'>Codice ordine: {$idordine}</h5><br>
                <h6 class='text-muted'>Data: {$data}</h6>
                <h6 class='text-muted'>Pagamento: {$pagamento}</h6>
                <h6 class='text-muted'>Utente: {$utente}</h6>
              </div>
              <span class='text-muted'>"; 
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
          </main></div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>


 
