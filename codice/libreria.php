<?php
// Questo file viene sempre incluso all'inizio dei files .php, contiene la libreria di funzioni necessarie al corretto
// funzionamento di tutte le varie pagine

// da eseguire per produrre stampe di errore visibili nelle pagine di risposta
error_reporting(E_ALL & ~E_NOTICE);

// alcune funzioni di utilita' comune alle varie pagine
  // verifica se esiste una sessione attiva (l'utente si e' autenticato)
  // altrimenti ri-indirizza alla pagina di 'ingresso' (index.php)
  
    function inserisci_php($id){ 
      $_SESSION['id_array'][]=$id;
    }

    // Funzione che controlla l'accesso
    function controllo_accesso() {
        session_start();
        if (empty($_SESSION['nome_utente'])) {
            header('Location:index.php');
        }
    }

    // crea una connessione al database
    function connessione() { 
        try {
             $dbconn = new PDO ("mysql:host=localhost;dbname=my_optimusprime", optimusprime, hcXaVc65KCQv);
        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
            die();
        }
        return $dbconn;  
    }

    // Funzione che crea la sessione per un utente loggato
    function loggato(){
        if(!isset($_SESSION['nome_utente'])){
            header("Location: login.php");
        }
    }

    // Funzione che setta i nuovi dati dell'utente
    function set_user($dbconn,$variable, $login, $campo){
        $sql ="UPDATE UTENTI
                SET $campo = '$variable'
               WHERE Login='$login'";
        $result = $dbconn->query($sql);        
    }

    //stampa la barra di navigazione posta all'inzio di ogni pagina dove contiene anche la sezione ricerca (NAVBAR)
    function nav(){
        $cont=count($_SESSION['id_array']);
        echo"<nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top'>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          
          <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto' style='margin: 0 auto'>
              <li class='nav-item active'>
                <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
              </li>
              <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Chi Siamo</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='search.php'>Acquista ora</a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='contatti.php'>Contatti</a>
              </li>
            </ul>
            <div class='hidden-xs col-sm-3'>
                <form action='search.php' method='post' class='search-form' style='position: relative;  padding-top: 10px; left: -5%'> 
                    <div class='form-group has-feedback'>
                         <input type='text' class='form-control' type='search' name='ricerca' id='ricerca' placeholder='Ricerca Gioco' 
                         style='background-color: whitesmoke'>
                        <span class=' form-control-feedback'  style='position: absolute;  padding-top: 10px' >
                        <button class='btn btn-sm' style='height: 170%'>
                        <img src='https://www.fundserv.com/content/themes/fundServ/images/icon-search.svg'  type='submit'>
                        </button></span> 
                        <label for='search' class='sr-only'>Search</label> 
                    </div>
                </form>
            </div>
        
             <div class='col-xs-12 col-sm-3'>
                <a href='inserisci.php'>
                    <img src='./img/bag3,1.png' height=4% weight=4%>
                </a>  
                <span class='badge badge-secondary badge-pill'><span style='color: white;font-family: Century Gothic;font-size: 10pt;font-weight: normal;font-style: normal;' class='widget_quantity_total' id='cont'></span>$cont</span>

                <span style='font-family: Century Gothic'>Carrello</span>
                            
            </div>"
            ;
            if (empty($_SESSION['nome_utente']))
                echo "<a  href='./login.php'><button class='btn btn-outline-primary nav-item' type='submit'>LOGIN</button></a>";
            else{
                echo "  <div class='btn-group' role='group'>
                <button id='btnGroupDrop1' type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <b>Benvenuto " . $_SESSION['nome_utente'] . "&nbsp;</b>
                </button>
                <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
				if($_SESSION['nome_utente'] === 'admin')
					echo "<a class='dropdown-item' href='dashboard.php'>Dashboard</a>";
                echo "<a class='dropdown-item' href='ilmioprofilo.php'>Il mio profilo</a>
                    <a class='dropdown-item' href='imieiordini.php'>I miei ordini</a>
                    <a class='dropdown-item' href='./logout.php'>Logout</a>
                </div>
                </div>";
            }
            echo "</div></nav>";
                
    }

    // Funzione dedicata alla rappresentazione della barra di navigazione posta alla fine della pagina (FOOTER)
    function footer(){
      echo " <footer class='container py-5'>
      <div class='row'>
        <div class='col-12 col-md'>
          <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='d-block mb-2'><circle cx='12' cy='12' r='10'></circle><line x1='14.31' y1='8' x2='20.05' y2='17.94'></line><line x1='9.69' y1='8' x2='21.17' y2='8'></line><line x1='7.38' y1='12' x2='13.12' y2='2.06'></line><line x1='9.69' y1='16' x2='3.95' y2='6.06'></line><line x1='14.31' y1='16' x2='2.83' y2='16'></line><line x1='16.62' y1='12' x2='10.88' y2='21.94'></line></svg>
          <small class='d-block mb-3 text-muted'>&copy; 2017-2018</small>
        </div>
        <div class='col-6 col-md'>
          
          <ul class='list-unstyled text-small'>
            <li><a class='text-muted' href='index.php'>Home Page</a></li>
            <li><a class='text-muted' href='contatti.php'>Contatti</a></li>
            <li><a class='text-muted' href='#'>Chi Siamo</a></li>
          </ul>
        </div>
        <div class='col-6 col-md'>
         
          <ul class='list-unstyled text-small'>
            <li><a class='text-muted' href='search.php'>Acquista Ora</a></li>
            <li><a class='text-muted' href='search.php'>Cerca Prodotto</a></li>
            <li><a class='text-muted' href='login.php'>Login</a></li>
            <li><a class='text-muted' href='registrazione.php'>Registrati</a></li>
          </ul>
        </div>
        <div class='col-6 col-md'>
          <ul class='list-unstyled text-small'>
            <li><a class='text-muted' href='#'>Privacy</a></li>
            <li><a class='text-muted' href='#'>Cookies</a></li>
            <li><a class='text-muted' href='#'>GDP</a></li>
          </ul>
        </div>
        <div class='col-6 col-md'>
          
          <ul class='list-unstyled text-small'>
            <li><a class='text-muted' href='#'>Facebook</a></li>
            <li><a class='text-muted' href='#'>Twitter</a></li>
            <li><a class='text-muted' href='#'>Instagram</a></li>
          </ul>
        </div>
      </div>
    </footer>";
    }
?>