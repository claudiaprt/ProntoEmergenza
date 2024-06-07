<?php
require("function.php");
session_start();
$_SESSION['idUtente'] = 4;          //per testing (da togliere una volta completo il sito)
if(!isset($_SESSION['idUtente']))
  header("Location: bacheca.php");
else{
    if(isset($_POST['titolo']) && isset($_POST['testo']) && isset($_POST['data']) && isset($_POST['tipo']) && isset($_POST['utenti'])){
        if(controllo([$_POST['titolo'],$_POST['testo'],$_POST['data'],$_POST['utenti']])){
            if(isset($_FILES['allegato'])){
                $path = "allegati/allegato_".date("Y-m-d").".".file_extension(basename($_FILES["allegato"]["name"]));       //percorso immagine
                $ruolo = ricercaRuoli($_POST['utenti']);                //$ruolo contiene gli utenti destinatari della comunicazione

                $insert = insert("INSERT into comunicazioni (dataEmissione,titolo,testo,nomeFileAllegato,dataScadenza,idTipo,idUtente) values(?,?,?,?,?,?,?)",[date("Y-m-d"),$_POST['titolo'],$_POST['testo'],$path,$_POST['data'],$_POST['tipo'],$_SESSION['idUtente']]);
                $comunicazione = select("SELECT idComunicazione from comunicazioni order by idComunicazione desc");
                insert_comunicazioni($ruolo,$comunicazione[0]);

                if($_FILES['allegato']['error'] === UPLOAD_ERR_OK){
                    if(move_uploaded_file($_FILES['allegato']['tmp_name'],$path))
                        header("Location: bacheca.php");                //ESATTO
                    else{
                        header("Location: bacheca.php");                //ERRATO
                    }
                }else
                    header("Location: bacheca.php");                //ERRORE
            }else{
                $ruolo = ricercaRuoli($_POST['utenti']);                //$ruolo contiene gli utenti destinatari della comunicazione
                $insert = insert("INSERT into comunicazioni (dataEmissione,titolo,testo,dataScadenza,idTipo,idUtente) values(?,?,?,?,?,?)",[date("Y-m-d"),$_POST['titolo'],$_POST['testo'],$_POST['data'],$_POST['tipo'],$_SESSION['idUtente']]);
                $comunicazione = select("SELECT idComunicazione from comunicazioni order by idComunicazione desc");
                insert_comunicazioni($ruolo,$comunicazione[0]);

                if(isset($insert['error']) || $insert['rows'] == 0)
                    header("Location: bacheca.php");                //ERRORE
                else
                    header("Location: bacheca.php");
            }

        }else

            header("Location: bacheca.php");        //ritorna alla bacheca in caso di campi vuoti nel form         
    }else{      
?>
<html>
    <head>
        <title>Aggiungi una Comunicazione</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleguide.css">
        <link rel="stylesheet" href="globals.css">
    </head>
    <body>
        <fieldset>
            <legend>Aggiungi una Comunicazione</legend>
            <form method="post" enctype="multipart/form-data" action="">
                <input type="text" name="titolo" placeholder="Titolo.." required>
                <br>
                <input type="text" name="testo" placeholder="Testo.." size="50" required>
                <br>
                <br>
                <label for="data">Data Scadenza</label>
                <input type="date" name="data" id="data" placeholdere="Data Scadenza" required>
                <br>
                <label for="tipo">Tipologia comunicazione:</label>
                <select name="tipo" id="tipo">
<?php
                $tipo = select("SELECT * from tipicomunicazione");
                combobox($tipo,"idTipo","nome");
?>
                </select>
                <br>
                <label for="user">Seleziona a chi mandare la comunicazione:</label>
                <select name="utenti" id="user">
                    <option value="tutti">Tutti</option>
                    <option value="admin">Admin</option>
                    <option value="user">Utenti</option>
                    <option value="dipendente">Dipendente</option>
                    <option value="volontario">Volontario</option>
                    <option value="corsista">Corsista</option>
<?php
                    $ruoli = select("SELECT * FROM Ruoli");
                    combobox($ruoli,"idRuolo","nome");
?>
                </select>
                <br>
                <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                <label for="file">Inserisci allegato (se necessario)</label>
                <br>
                <input name="allegato" type="file" id="file"/>
                <br>
                <br>
                <input type="submit" value="Invia"/>
            </form>
        </fieldset>
        <br>
        <a href="bacheca.php"><button>Torna indietro</button></a>
    </body>
</html>
<?php
    }
}
?>