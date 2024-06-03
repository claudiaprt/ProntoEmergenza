<?php
require_once "..\\lib\\globals.php";
require_once "..\\lib\\db.php"; 
use lib\DB;

header('Content-Type: application/json');

$responseArray = array(
    'risultato' => 'false',
    'tipoErr' => 'log'
);

if (!isset($_POST["user"]) || !isset($_POST["psw"])) {
    echo json_encode($responseArray);
    exit();
}

try {
    $db = new DB();
    $user = $_POST["user"];
    $psw = $_POST["psw"];
    $sql = "SELECT idUtente,nome, cognome, istruttore, status, tipoUtente FROM utenti WHERE username=:user and password=:psw;";
    $parameters = [
        [':user', $user],
        [':psw', $psw]
    ];

    $result = $db->query($sql, $parameters);
	/*
		La sessione conterrà i seguenti dati: nome, cognome, idUtente, istruttore,status e tipoUtente. Questi sono anche
		i nomi utilizzati negli indici (sono gli stessi nomi degli attributi nel database). Lo status contiene:
		volontario, dipendente o corsista; tipoUtente contiene:admin o user; istruttore contiene 0 o 1 (1 se è un istruttore
		0 se non lo è); idUtente contiene un numero che rappresenta univocamente un utente.
	
	*/
    if ($result && is_array($result) && count($result) > 0) {
        session_start();
        $user = $result[0];
		$_SESSION['nome']=$user['nome'];
		$_SESSION['cognome']=$user['cognome'];
		$_SESSION['idUtente']=$user['idUtente'];
		$_SESSION['istruttore']=$user['istruttore'];
		$_SESSION['status']=$user['status'];
		$_SESSION['tipoUtente']=$user['tipoUtente'];
        $responseArray['risultato'] = 'true';
        $responseArray['utente'] = ($user['tipoUtente'] == 'admin') ? 'admin' : 'user';
    } else {
        $responseArray['risultato'] = 'false';
        $responseArray['tipoErr'] = 'log';
    }

    echo json_encode($responseArray);
} catch (PDOException $e) {
    $responseArray['risultato'] = 'false';
    $responseArray['tipoErr'] = 'sistema';
    echo json_encode($responseArray);
} finally {
    if (isset($db)) $db->close();
}
?>