<?php $x = 0;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleguide.css">
    <link rel="stylesheet" href="globals.css">
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
          <input type="text" placeholder="cerca..." class="search-input" id="search-bar">
        </div>
        <div class="frame">
            <h3 class="p only-mobile">Nascondi le comunicazioni già lette</h3>  
                
          <div class="switch-container">
            <input type="checkbox" id="switch">
            <label for="switch" class="switch">
          </div>
  <?php
        if($x == 0){//if($_SESSION['tipoUtente'] == 'admin'){
  ?>
          <a href="addbacheca.html">
            <div class="ellipse">
              <p class="piu">+</p>
            </div>  
          </a>
          <?php
      }//}
?>
        </div> 

      </div>
      <div class="cont">
        <ul class="button-list">
<?php
        for($i=1;$i<=20;$i++){
          echo "<li class='button-item'>
            <button class='styled-button'>
              <img src='img/mail-bacheca-7.svg' alt='mail'>
              <div class='info'>
                <span class='title'>Titolo".$i."</span>
                <span class='date'>02/05/2024</span>
              </div>
            </button>
          </li>";
        }
?>
        </ul>
      </div>
    </div>
  </body>
</html>
