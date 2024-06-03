# Pronto Emergenza

Questo repository contiene il codice sorgente del progetto "Pronto Emergenza". Di seguito è fornita una descrizione delle principali cartelle e dei file degni di nota presenti nel progetto.

## Breakpoint per Responsività

- **DESKTOP**: `min-width: 701px`
- **MOBILE**: `max-width: 700px`

## Struttura delle Cartelle

- **Pagine_Statiche_xxxxxxx**: Contiene le pagine web statiche. Il suffisso `xxxxxx` indica la funzione specifica svolta dal gruppo di lavoro responsabile della cartella.
- **Pagine_Dinamiche_xxxxxx**: Contiene il backup delle pagine dinamiche realizzate.
- **PE**: Contiene le pagine web funzionanti del progetto PHP complessivo. Sarà costantemente aggiornata con le ultime versioni delle pagine del progetto. (Usata solo dai capoprogetti, ossia i docenti)
- La root del sito deve contenere le seguenti cartelle:
  - **lib**: File PHP di libreria (es. globals.php, db.php)
  - **css**: File CSS
  - **js**: File JavaScript
  - **img**: File immagini
  - **api**: Web services per programmazione via AJAX

## Pagine Dinamiche in PHP: Considerazioni Generali

1. **Header Unificato**: L'header di ogni pagina sarà prodotto da un solo gruppo (già assegnato) e includerà un header per la versione desktop e un header (con burger menu) per la versione mobile. I file forniti saranno:

   - `header.php` da includere al posto del div `class="header"` attualmente presente nei file.
   - `styleMheader.css.css`, `styleDheader.css.css` e `scriptHeader.js` da includere nella sezione `<head>` della propria pagina.

2. **Verifica della Sessione**: Ogni pagina prodotta deve verificare l'esistenza della sessione. Senza sessione, l'utente deve essere reindirizzato a `login.php` con codice simile al seguente:

   ```php
   <?php
   session_start();
   if (!isset($_SESSION['ruolo'])) {
       header("Location: login.php");
   } else {
   ?>
   <!-- Codice HTML + PHP della pagina web da produrre -->
   <?php
   }
   ?>
   ```

## File Principali

I seguenti file PHP di libreria si trovano nella cartella `lib`:

- **globals.php**: Contiene variabili globali, come i dati necessari per accedere al server DBMS corretto, e procedure di utilità varia. Tra queste IMPORTANTE la funzione errorLOG con cui scrivere su file di log gli errori che avvengono per accesso al DB
- **db.php**: Contiene la classe `DB` che permette di accedere al database e realizzare query di qualsiasi tipo, restituendo i risultati utilizzabili nelle pagine web.
  

## Configurazione del Database

Il file `db.php` contiene la classe `DB` che esegue tutte le operazioni sul database utilizzando la classe PDO. È possibile creare funzioni che, al loro interno, creino un oggetto della classe `DB`, impostino la query, utilizzino i metodi della classe e restituiscano i dati all'ambiente chiamante così come sono stati restituiti dall'oggetto `DB`.

### Esempio di Funzione che Utilizza la Classe DB

```php
function example($parametri) {
    // Creazione dell'oggetto DB
    $db = new \lib\DB();

    // Impostazione della query
    $query = "SELECT * FROM tabella WHERE colonna = :parametro";

    // Esecuzione della query
    $risultati = $db->query($query, [[':parametro', $parametri]]);

    // Restituzione dei risultati
    return $risultati;
}
```

In questo esempio, la funzione `example()` crea un oggetto `DB`, imposta ed esegue una query, e restituisce i risultati ottenuti dalla query.

---

Per ulteriori informazioni o domande, non esitare a contattare i responsabili.
