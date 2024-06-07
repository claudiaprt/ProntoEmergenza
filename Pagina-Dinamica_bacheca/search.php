<?php
require("function.php");
session_start();
$_SESSION['idUtente'] = 4;          //per testing (da togliere una volta completo il sito)
if(isset($_POST['val'])){
    $x = "%".$_POST['val']."%";
    $search = select("SELECT * from (((utenticomunicazioni uc inner join comunicazioni c on c.idComunicazione = uc.idComunicazione) inner join utenti u on u.idUtente = uc.idUtente)inner join tipicomunicazione t on t.idTipo = c.idTipo) where uc.IdUtente = ? and c.dataScadenza >= ? and c.titolo like ?",[$_SESSION['idUtente'],date("Y-m-d"),$x]);
    echo json_encode($search);
}
?>