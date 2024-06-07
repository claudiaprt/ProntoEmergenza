<?php
    session_start();
    $_SESSION['nome']="Filippo";
    $_SESSION['cognome']="Polvara";
    $_SESSION['idUtente']=7;
    $_SESSION['istruttore']=false;
    $_SESSION['status']="admin";
    $_SESSION['tipoUtente']="soccorritore";
    $_SESSION['immagine']="default.png";
    header("Location: profilo_amministratore.php");
?>