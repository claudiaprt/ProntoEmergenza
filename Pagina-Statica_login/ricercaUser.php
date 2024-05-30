<?php
$dbms = "mysql";
$host = "127.0.0.1";
$db_name = "pronto_emergenza";
$db_user = "root";
$db_psw = "";

$dsn = $dbms . ":host=" . $host . ";dbname=" . $db_name;

header('Content-Type: application/json');

$responseArray = array(
    'risultato' => 'false',
    'tipoErr' => 'log'
);

if(!isset($_POST["user"]) || !isset($_POST["psw"])) {
    echo json_encode($responseArray);
    exit();
}

try {
    $conn = new PDO($dsn, $db_user, $db_psw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = $_POST["user"];
    $psw = $_POST["psw"];
    $sql = "SELECT nome, cognome, tipoUtente FROM utenti WHERE username=:user and password=:psw;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':psw', $psw);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $responseArray['risultato'] = 'true';
        $responseArray['utente'] = ($user['tipoUtente'] == 'admin') ? 'admin' : 'user';
    } else {
		$responseArray['risultato']='false';
        $responseArray['tipoErr'] = 'log';
    }

    echo json_encode($responseArray);
} catch (PDOException $e) {
	$responseArray['risultato']='false';
    $responseArray['tipoErr'] = 'sistema';
    echo json_encode($responseArray);
} finally {
    if (isset($stmt)) $stmt = null;
    if (isset($conn)) $conn = null;
}
?>