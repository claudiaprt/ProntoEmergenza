<?php
require_once (".\\lib\\globals.php");
require_once (".\\lib\\db.php");
require_once (".\\header.php");

use lib\DB;
session_start();
   if (!isset($_SESSION['nome'])) {
      header("Location: login.php");
   } else {
    $db = new DB();
    $nome = $_SESSION['nome'];
    $sql = "SELECT oraInizio, oraFine, data, nome from (turniutenti tu inner join utenti utenti u on tu.idUtente = u.idUtente) inner join turni118 t on t.idTurno118 = tu.idTurno118) where ";
    $parameters ;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style_home.css" />
    <link rel="stylesheet" href="styleDheader.css" />
    <link rel="stylesheet" href="styleMheader.css" />

  </head> 

  <body>
    <div class="home">
      <!-- <div class="header only-desktop">
        <img class="immagine-logo" src="img/logo-ambulanza.png" />
        <div class="cont">
          <div class="nav-links">
            <a href="#">Contatti</a>
            <a href="#">Bacheca</a>
            <a href="#">Calendario</a>
            <a href="#">Profilo</a>
            <a href="#">Logout</a>
          </div>
          <div class="img-profilo">
            <img src="img/profilo.png" width="50" height="50" />
          </div>
        </div>
      </div> -->

      <?php 
      $_SESSION['immagine_profilo'] = "img/ellipse-22.png";
      //ancora da mettere l'immagine nella sessione
      printHeader(); 
      ?>

      <div class="fascia only-desktop">
        <div class="testo">
          <p class="welcome-text">
            Ciao <br />
            <?php echo $_SESSION['nome'] ?>, <br />
          </p>
          <p class="welcome-text-2">come possiamo aiutarti?</p>
        </div>

        <div class="cuore">
          <img class="icona-cuore" src="img/icona-cuore.png" />
        </div>
      </div>
      

      <div class="icone">
        <div class="icona">
          <a href="calendario.html">
            <div class="ellipse">
              <img src="img/icona-calendario.svg" />
              <div>Calendario</div>
            </div>
          </a>
        </div>
        <div class="icona">
          <a href="profilo.html">
            <div class="ellipse">
              <img src="img/icona-profilo.png" />
              <div>Profilo</div>
            </div>
          </a>
        </div>
        <div class="icona">
          <a href="bacheca.html">
            <div class="ellipse">
              <img src="img/icona-bacheca.svg" />
              <div>Bacheca</div>
            </div>
          </a>
        </div>
        <div class="icona">
          <a href="contatti.html">
            <div class="ellipse">
              <img src="img/icona-messaggi.svg" />
              <div>Contatti</div>
            </div>
          </a>
        </div>
      </div>

      <div class="i-MIEI-TURNI">
        <div class="box-turni">
          <div class="turno">
            <p>I MIEI TURNI</p>
            <h1>15 Marzo</h1>
            <p class="text-wrapper">7:00 - 12:00 Autista</p>
            <hr />
          </div>

          <div class="turno">
            <h1>23 Marzo</h1>
            <p class="text-wrapper">19:00 - 7:00 Soccoritore 1</p>
            <hr />
          </div>

          <div class="turno">
            <h1>30 Marzo</h1>
            <p class="text-wrapper">12:00 - 19:00 Soccoritore 2</p>
            <hr />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php 
   }
?>
