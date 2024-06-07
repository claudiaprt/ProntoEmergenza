<?php
function printHeader() {
    if (isset($_SESSION['immagine']))
        $immagineProfilo = $_SESSION['immagine'];
    else    
        header('location : login.php');

    echo '
        <div class="header">
            <div class="burger only-mobile">
                <img class="burger-menu" src="img/burger-menu.svg" onclick="showMenu()" class="show-burger">
                <div class="menu-mobile only-mobile">
                    <div id="menu-mobile-box" onclick="showMenu()">
                        <script>
                            stampaMenu();
                        </script>
                    </div>
                </div> 
            </div>
            <a href="home.php">
                <img class="immagine-logo" src="img/immagine-logo-ambulanza.png">
            </a>
            <div class="pulsanti only-desktop">
                <a class="bottone" href="index.php">Home</a>
                <a class="bottone" href="profilo.php">Profilo</a>
                <a class="bottone" href="calendario.php">Calendario</a>
                <a class="bottone" href="bacheca.php">Bacheca</a>
                <a class="bottone" href="contatti.php">Contatti</a>
            </div>
            <div>
                <a href="home.php">
                    <img class="immagine-profilo" src="img/profili/' .$immagineProfilo. '">
                </a>
            </div>
        </div> 
    ';
}
?>
