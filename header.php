<?php
    function printHeader(){
        // percorso immagine
        if (isset($_SESSION['immagine_profilo']))
            $immagineProfilo = $_SESSION['immagine_profilo'];
        else 
            $immagineProfilo = '';
        

    echo '
            <div class="header">
                <div class="burger only-mobile">
                    <img class="burger-menu " src="img/burger-menu.svg" onclick="showMenu()" class="show-burger">
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
                        <img class="immagine-profilo" src="' . $immagineProfilo . '">
                    </a>
                </div>
            </div> 
            <style>
                @media screen and (min-width:701px){
                    .only-mobile{
                        display:none;
                    }
                    .header{
                        margin-top: 1%;
                        display: flex;
                        flex-direction: row;
                        justify-content: space-around;
                    }

                    .bottone{
                        font-size:20px;
                        font-family: "Montserrat", Helvetica;
                        color: black;
                        display: flex;
                        align-items: center;
                    }

                    .immagine-logo{
                        width:200px;
                        height:auto;
                    }
                    .pulsanti{
                        display: flex;
                        flex-direction: row;
                        justify-content: space-between;
                        gap: 60px;
                    }
                    .immagine-profilo{
                        width:100px;
                        height:auto;
                    }
                }
                @media screen and (max-width:700px){

                    .only-desktop{
                        display:none;
                    }
                    .burger{
                    display: flex;
                    align-items: center;
                    }
                    .header{
                    display: flex;
                        flex-direction: row;
                    justify-content: space-between;
                    margin: 5%;
                    }

                    .immagine-logo{
                    width:100px;
                        height:auto;
                    }

                    .burger-menu {
                        width:29px;
                        height:29px;
                        top:10px;
                    }

                    .show-burger {
                        width: 150% !important;
                        height: 150% !important;
                        padding-left: 50% !important;
                    }

                    #menu-mobile-box {
                    position: fixed;
                    top: 0;
                    right: 0;
                    width: 0vh;
                    height: 0%;
                    border-bottom-left-radius: 100%;
                    background-color: #060606ca;
                    margin: 0;
                    padding: 10vh 0 0 0;
                    text-align: center;
                    line-height: 10vh;
                    transition: 0.5s;
                    -webkit-transition: 0s;
                    -moz-transition: 0.5s;
                    z-index:1;
                    }

                    #menu-mobile-box ul {
                        list-style-type:none;
                        padding:0;
                    }

                    #menu-mobile-box a {
                        display:block;
                        font-size: 2em;
                        font-family: "Montserrat-Regular", Helvetica;
                        color: #FFFFFF;
                        text-decoration: none;
                    }

                    #menu-mobile-box a:visited {
                    color: #FFFFFF;
                    text-decoration: none;
                    }

                    #menu-mobile-box a:hover {
                    color: #FFFFFF;
                    text-decoration: none;
                    }
                    .immagine-profilo{
                        width:55px;
                        height:auto;
                    }
                }
            </style>
            <script type="text/javascript">
                function showMenu() {
                    document.getElementById(\'menu-mobile-box\').classList.toggle(\'show-burger\');
                }
                function stampaMenu() {
                    let menu = "";
                    menu += \'<a class="pulsanti" href="index.php">Home</a>\';
                    menu += \'<a class="pulsanti" href="profilo.php">Profilo</a>\';
                    menu += \'<a class="pulsanti" href="calendario.php">Calendario</a>\';
                    menu += \'<a class="pulsanti" href="bacheca.php">Bacheca</a>\';
                    menu += \'<a class="pulsanti" href="contatti.php">Contatti</a>\';
                    document.getElementById(\'menu-mobile-box\').innerHTML = menu;
                }
                stampaMenu();
            </script>
        ';
    }
?>