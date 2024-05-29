<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="style-desktop.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>
</head>

<body id="bodyConvalida">
    <div id="calendario-convalida">
        <h2>Creazione turno</h2><br>
        <form>

        <label for="data" id="dataLabel">Data</label>
        <input id="data" class="inputs" name="data" type="date"><br><br>

        <label for="utenti" id="utentiLabel">Utente</label>
        <select id="utenti" class="inputs" name="utenti">
            <option></option>
            <option>Marco Rossi</option>
            <option>Paolo Bianchi</option>
            <?php
            require_once('functions.php');
            showUtenti();
            ?>
        </select><br><br>

        <label for="oraInizio" id="oraInizioLabel">Ora inizio</label>
        <input id="oraInizio" class="inputs" name="oraInizio" type="time"><br><br>

        <label for="oraFine" id="oraFineLabel">Ora fine</label>
        <input id="oraFine" class="inputs" name="oraFine" type="time"><br><br>

        <label for="note" id="noteLabel">Note</label>
        <textarea id="note" class="inputs" name="note"></textarea><br><br>

        <button type="submit" name="salva" id="salva">Salva</button>
        <button type="submit" name="chiudi" id="chiudi">Chiudi</button>
        <button type="submit" name="cancella" id="cancella">Cancella</button>

</form>
        
    </div>
</body>

</html>