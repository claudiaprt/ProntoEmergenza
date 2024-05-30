<?php
/*$dbms = "mysql";
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
}*/
require_once "D:\\xampp-portable-windows-x64-8.2.4-0-VS16\\xampp\\htdocs\\Scuola\\Pagina-Statica_login\\globals.php";
require_once "D:\\xampp-portable-windows-x64-8.2.4-0-VS16\\xampp\\htdocs\\Scuola\\Pagina-Statica_login\\db.php";  // adjust the path to where the DB class is located
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
    $sql = "SELECT nome, cognome, dataNascita, email, telefono, istruttore, status, tipoUtente FROM utenti WHERE username=:user and password=:psw;";
    $parameters = [
        [':user', $user],
        [':psw', $psw]
    ];

    $result = $db->query($sql, $parameters);

    if ($result && is_array($result) && count($result) > 0) {
        session_start();
        $user = $result[0];
		$_SESSION['nome']=$user['nome'];
		$_SESSION['cognome']=$user['cognome'];
		$_SESSION['dataNascita']=$user['dataNascita'];
		$_SESSION['email']=$user['email'];
		$_SESSION['telefono']=$user['telefono'];
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