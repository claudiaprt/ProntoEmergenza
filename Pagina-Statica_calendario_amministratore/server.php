<?php
    $server = "localhost";
    $dbname = "5bi_bf_accessidb";
    $user = "root";
    $psw = "";

    if(isset($_POST['data'])){
        $data = $_POST['data'];
        
        try {
            $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $psw);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($data > date("Y-m-d")) {
                $q = "SELECT utenti.cognome, utenti.nome
                FROM turni118
                INNER JOIN utenti ON utenti.idUtente = turni118.idUtente
                WHERE data='data'
                ORDER BY dataInizio;";
                $statement = $conn->query($q);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $q = "SELECT utenti.cognome, utenti.nome
                FROM turniUtente
                INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurnoUtente
                INNER JOIN utenti ON utenti.idUtente = turni118.idUtente
                WHERE turni118.data='data'
                ORDER BY turni118dataInizio;";
                $statement = $conn->query($q);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            echo $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>