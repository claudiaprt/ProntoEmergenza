<?php
    function showUtenti() {
        $server = "localhost";
        $dbname = "5bi_bf_accessidb";
        $user = "root";
        $psw = "";

        try {
            $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $psw);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $q = "SELECT cognome, nome FROM Utenti";
            
            $statement = $conn->query($q);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $utente) {
                echo "<option>" . htmlspecialchars($utente['cognome']) . ", " . htmlspecialchars($utente['nome']) . "</option>";
            }

        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
?>