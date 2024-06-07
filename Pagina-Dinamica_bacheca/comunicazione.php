<?php
require("function.php");
session_start();
$_SESSION['idUtente'] = 4;          //per testing (da togliere una volta completo il sito)
if(!isset($_SESSION['idUtente']))
    header("Location: bacheca.php");
else{
    $comunicazione = select("SELECT * FROM comunicazioni c inner join utenti u on c.idUtente = u.idUtente where idComunicazione = ?",[$_POST['comunicazione']]);
    $read = insert("UPDATE utenticomunicazioni SET dataLettura = ? where idComunicazione = ? and idUtente = ?",[date("Y-m-d"),$_POST['comunicazione'],$_SESSION['idUtente']]);
?>
<html>
    <head>
<?php   titolo($comunicazione);  ?>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleguide.css">
        <link rel="stylesheet" href="globals.css">
    </head>
    <body>
<?php   
        comunicazione($comunicazione);
?>
        <br>
        <a href="bacheca.php"><button>Torna indietro</button></a>
    </body>
</html>
<?php
}
?>