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
    </head>
    <body>
        <form method="post" enctype="multipart/form-data" action="">
            <input type="text" name="titolo" placeholder="Titolo" required>
            <input type="text" name="testo" placeholder="Testo" required>
            <input type="date" name="data" placeholdere="Data Scadenza" required>
            <select name="tipo">
<?php
            $tipo = select("SELECT * from tipicomunicazione");
            combobox($tipo,"idTipo","nome");
?>
            </select>
            <select name="utenti">
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
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
            <input name="allegato" type="file"/>
            <input type="submit" value="Invia"/>
        </form>
    </body>
</html>
<?php
    }
}
?>