# Pronto Emergenza

Questo repository contiene il codice sorgente del progetto "Pronto Emergenza". Di seguito una descrizione delle principali cartelle e dei file più importanti presenti nel progetto.

## Breakpoint per responsività

- **DESKTOP**: `min-width: 701px`
- **MOBILE**: `max-width: 700px`

## Cartelle principali

- **Pagina_Statica_xxxxxxx**: Pagine web statiche. `xxxxxx` indica la funzione specifica del gruppo responsabile.
- **Pagina_Dinamica_xxxxxx**: Backup delle pagine dinamiche realizzate.
- **PE**: Pagine web funzionanti del progetto PHP, aggiornate costantemente. (Usata solo dai capoprogetti/docenti)

## Struttura delle cartelle

Ogni cartella principale contiene le seguenti sottocartelle:

- **lib**: File PHP di libreria (es. globals.php, db.php).
- **css**: File CSS. I file css utilizzati DEVONO avere il nome che segue il seguente formato: style_xxxxx_Desktop.csss oppure style_xxxxx_Mobile.css dove xxxxx rappresenta la funzione che state implementando.
- **js**: File JavaScript. il nome del file js deve seguire il seguente formato: jsXXXXX.js  dove XXXXX rappresenta il nome della funzione che state implementando.
- **img**: Immagini di tutto il sito.sta vcartella dovrà contenere la sottocartella **profile** che conterrà le immagini dei profili doi tutti gli utenti, compreso il file default.png che rappresenta l'icona base per un qualsiasi utente che non carica la propria immagine.
- **api**: Web services per programmazione via AJAX.

## Considerazioni generali sulle pagine dinamiche in PHP

1. **Header unificato**: Prodotto da un solo gruppo, includendo header per desktop e mobile (con burger menu). I file forniti sono:

   - `header.php` da includere al posto del div `class="header"`.
   - `styleMheader.css`, `styleDheader.css`, `scriptHeader.js` da includere nella sezione `<head>`.

2. **Verifica della sessione**: Ogni pagina deve verificare l'esistenza della sessione e, in caso negativo, reindirizzare a `login.php`:

   ```php
   <?php
   session_start();
   if (!isset($_SESSION['role'])) {
       header("Location: login.php");
   } else {
   ?>
   <!-- Page contents -->
   <?php
   }
   ?>
   ```

## File principali

Nella cartella `lib` si trovano i seguenti file PHP di libreria:

- **globals.php**: Contiene variabili globali, dati per accedere al DBMS e la funzione `errorLog()` per registrare errori.
- **db.php**: Contiene la classe `DB` per accedere al database e realizzare query.

## Configurazione del database

Il file `db.php` contiene la classe `DB` che utilizza la classe PDO per operazioni sul database. È possibile creare funzioni che utilizzano un oggetto della classe `DB` per eseguire query e restituire i risultati.

### Esempio di funzione che utilizza la classe DB

```php
function get_query($parameters) {
    $db = new \lib\DB();
    $query = "SELECT * FROM table WHERE column = :parameter";
    $results = $db->query($query, [[':parameter', $parameters]]);
    return $results;
}
```

---

Per ulteriori informazioni o domande, contatta i responsabili.
