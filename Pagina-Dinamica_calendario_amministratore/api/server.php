<?php
    if(isset($_POST['data'])){
        $data = $_POST['data'];


        $db = new \lib\DB();

        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiMattina[] = $db->query($query, [[':data' , $data], [':ora' , '07:00:00'], [':ruolo' , 4]]);

        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiMattina[] = $db->query($query, [[':data' , $data], [':ora' , '07:00:00'], [':ruolo' , 1]]);



        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiPomeriggio[] = $db->query($query, [[':data' , $data], [':ora' , '13:00:00'], [':ruolo' , 4]]);

        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiPomeriggio[] = $db->query($query, [[':data' , $data], [':ora' , '13:00:00'], [':ruolo' , 1]]);
        


        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiNotte[] = $db->query($query, [[':data' , $data], [':ora' , '19:00:00'], [':ruolo' , 4]]);

        $q = "SELECT utenti.cognome, utenti.nome
        FROM turniUtente
        INNER JOIN turni118 ON turni118.idTurno118 = turniUtente.idTurno118
        INNER JOIN utenti ON utenti.idUtente = turniUtente.idUtente
        WHERE turni118.data=:data AND turni118.oraInizio=:ora AND turniUtente.idRuolo=:ruolo";
        $risultatiNotte[] = $db->query($query, [[':data' , $data], [':ora' , '19:00:00'], [':ruolo' , 1]]);

        $risultati=array();
        array_push($risultati, $risultatiMattina, $risultatiPomeriggio, $risultatiNotte);
        echo json_encode($risultati);
    }
?>