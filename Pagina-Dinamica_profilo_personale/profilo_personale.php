<?php
    session_start();
        if (!isset($_SESSION['idUtente'])&&!isset($_SESSION['tipoUtente'])) {
            header("Location: login.php");
        } else {
        require('../header.php');
        //require('../footer.php');

        require_once('api/ricUtente.php');

        //$_SESSION prima controllo se id appartiene ad admin, allora controllo se esiste cookie, se esiste mostro profilo del cookie tramite suo id, altrimenti visualizzo profilo admin
        //$_COOKIE['user'] contiene id utente, viene creato quando amministratore accede all'elenco utenti e vuole vederne uno nel dettaglio
        
        if(strcmp($_SESSION['tipoUtente'],'admin')==0){
            if(isset($_COOKIE['user']))
                $utente=ricUtente($_COOKIE['user']);
            else
                $utente=ricUtente($_SESSION['idUtente']);
        }else{
            $utente=ricUtente($_SESSION['idUtente']);
        }
        
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/globals.css" />
    <link rel="stylesheet" href="./css/styleguide.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen and (min-width: 701px)" href="./css/style_profilo_desktop.css">
    <link rel="stylesheet" media="screen and (max-width: 700px)" href="./css/style_profilo_mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/funzioni.js"></script>
</head>
<body>
    <!-- <div class="header">
        <img class="logo" src="img/immagine-logo-ambulanza.png" alt="Logo" />
        <div class="freccia-dx"><img src="./img/vector-1.svg" /></div>  
        <div class="titolo-profilo"><div class="link">Profilo</div></div>
        <div id="link">
            <div class="link"><a href="contatti.html">Contatti</a></div>
            <div class="link"><a href="bacheca.html">Bacheca</a></div>
            <div class="link"><a href="calendario.html">Calendario</a></div>
            <div class="link"><a href="profilo.html">Profilo</a></div>
            <div class="link"><a href="logout.html">Log out &gt;</a></div>
        </div>
    </div> -->
    <?php
        printHeader();
    ?>
    <div class="profilo">
        <div class="main-content">
            <div class="left-content">
                <div class="immagini">
                    <img class="triangolo-arancione" src="img/triangolo-arancione.svg" alt="Triangolo Arancione" />
                    <img class="triangolo-blu" src="img/triangolo-blu.svg" alt="Triangolo Blu" />
                    <?php echo "<img class='imgProf' src=img/".$utente[0]['immagine']." alt='Foto profilo' />"; ?>
                </div>
                <div class="nome-ruolo">
                    <?php
                        echo "<div class='anag'>".$utente[0]['cognome']." ".$utente[0]['nome']."</div>";
                        echo "<div class='ruolo'>".$utente[0]['status']."</div>";
                    ?>
                </div>
            </div>

            <div class="linea-di-mezzo"></div>

            <div class="right-content">
                <div class="dati-profilo">
                    <div class="txt">
                        <p>Telefono</p>
                        <p>Email</p>
                        <p>Data di nascita</p>
                        <p>Indirizzo</p>
                        <p>Qualifiche</p>
                    </div>
                    <div class="dati">
                        <?php
                            echo "<p>".$utente[0]['telefono']."</p>";
                            echo "<p>".$utente[0]['email']."</p>";
                            echo "<p>".$utente[0]['dataNascita']."</p>";
                            echo "<p>".$utente[0]['via']." ".$utente[0]['numero'].", ".$utente[0]['cap']." ".$utente[0]['citta']." ".$utente[0]['provincia']."</p>";
                            echo "<p></p>";
                        ?>
                    </div>
                </div>
                <div class="bottone-modifica"><a href="modifica_dati_profilo.php">Modifica</a></div>
            </div>
        </div>
    </div>
    <?php
        //stampa footer
    ?>
</body>
</html>

<?php
    }
?>