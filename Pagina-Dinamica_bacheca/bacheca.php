<?php
require("function.php");
session_start();
$_SESSION['idUtente'] = 4;      //per testing (da togliere una volta completo il sito)
if(!isset($_SESSION['idUtente']))
  header("Location: homepage.php");
else{
  $bacheca = select("SELECT * from (((utenticomunicazioni uc inner join comunicazioni c on c.idComunicazione = uc.idComunicazione) inner join utenti u on u.idUtente = uc.idUtente)inner join tipicomunicazione t on t.idTipo = c.idTipo) where uc.IdUtente = ? and c.dataScadenza >= ?",[$_SESSION['idUtente'],date("Y-m-d")]);   //chiedo al database una matrice contenente le comunicazioni
  if(isset($bacheca['error']))         //verifico che non ci sia errore nella comunicazione col db
    header("Location: index.php");
  else{
    if($bacheca['rows'] == 0)
      echo "ciao";//Non esistono comunicazioni
    else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleguide.css">
    <link rel="stylesheet" href="globals.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <div class="bacheca">
      <div class="header">
        <img class="only-mobile" src="img/vector-1-1.svg" />
        <div class="div-wrapper only-mobile"><div class="text-wrapper">Bacheca</div></div>
        <div class="search-bar only-mobile">
          <label for="search-bar"><img src="img/frame-29-1.svg" alt="search" class="search-icon"></label>
        </div>
        <a href="homepage.html" class="only-desktop"><img class="immagine-logo" src="img/immagine-logo-ambulanza.png" width="150"/></a>
        <div class="nav-links only-desktop">
          <a href="#">Contatti</a>
          <a href="#">Bacheca</a>
          <a href="#">Calendario</a>
          <a href="#">Profilo</a>
          <a href="#">Logout</a> 
        </div>
      </div>
      <div class="container">
        <h2 class="only-desktop">Bacheca</h2>
        <div class="search-bar only-desktop">
          <label for="search-bar" class="search-label"><img src="img/frame-29-1.svg" alt="search" class="search-icon"></label>
          <input type="text" name="search-bar" placeholder="cerca..." class="search-input" id="search-bar" onkeyup="searchbar(this)">
        </div>
        <div class="frame">
            <h3 class="p only-mobile">Nascondi le comunicazioni già lette</h3>  
                
          <div class="switch-container" title="Mostra/Nascondi Comunicazioni Lette">
          <form method="post" action="">
            <input name="switch" type="checkbox" id="switch" onclick="read_checkbox(this)">
            <label for="switch" class="switch">
          </form>
          </div>
  <?php
      //if($_SESSION['tipoUtente'] == 'admin'){
  ?>
          <a href="addComunicazione.php">
            <div class="ellipse">
              <p class="piu">+</p>
            </div>  
          </a>
          <?php
      //}
?>
        </div> 
      </div>
      <div class="cont">
        <ul class='button-list' id='ul'>
<?php
          stampaBacheca($bacheca);
?>
        </ul>
      </div>
    </div>
  </body>
</html>
<?php
    }
  }
}
?>