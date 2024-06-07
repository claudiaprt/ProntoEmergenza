<?php
require_once "./lib/globals.php";
require_once "./lib/db.php"; 
use lib\DB;

function ricUtente($idutente) {
    try {
        // Creazione dell'oggetto DB
        $db = new DB();
        
        // Definisci la query SQL
        $query = "SELECT cognome,nome,dataNascita,via,numero,cap,citta,provincia,email,telefono,status,immagine FROM utenti WHERE idUtente = :id";
        
        // Definisci i parametri per il binding
        $parametri = [
            [":id", $idutente]
        ];

        // Esegui la query e recupera i risultati
        $result = $db->query($query, $parametri);
        
        // Controlla se il risultato è valido e non vuoto
        if ($result && is_array($result) && count($result) > 0) {
            
            return $result; // Ritorna il risultato della query
            
        } else {
            return [
                'risultato' => 'false',
                'tipoErr' => 'log',
                'message' => 'No results found or an error occurred.'
            ];
        }
    } catch (PDOException $e) {
        // Gestione degli errori
        return [
            'risultato' => 'false',
            'tipoErr' => 'exception',
            'message' => $e->getMessage()
        ];
    } finally {
        if (isset($db)) $db->close();
    }
}
?>