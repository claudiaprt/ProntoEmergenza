# Pronto Emergenza - Documentazione

Questo repository contiene il codice sorgente del progetto "Pronto Emergenza". Di seguito è fornita una descrizione delle principali cartelle e dei file degni di nota presenti nel progetto.

## Struttura delle Cartelle

- **Pagine_Statiche_xxxxxxx**: Contiene le pagine web statiche. Il suffisso `xxxxxx` indica la funzione specifica svolta dal gruppo di lavoro responsabile della cartella.
- **Pagine_Dinamiche_xxxxxx**: 
  
- **PE**: Contiene le pagine web funzionanti del progetto PHP complessivo. Sarà costantemente aggiornata con le ultime versioni delle pagine del progetto. ( QUESTA CARTELLA VIENE USATA SOLO DAI CAPOPROGETTI OSSIA I DOCENTI!!!!!!)
- La root del sito dovrà contenere le seguenti cartelle (uguali per tutti):
  - **lib** : file php di libreria (globals.php, db.php)
  - **css** : file css
  - **js** : file js
  - **img**: file immagini
  - **api**: web services per programmazione via ajaj

#### Pagine dinamiche in PHP: considerazioni generali
**1** L'header di ogni pagina sarà prodotta da un solo gruppo (già assegnato) che si preoccuperà di ottenere un header per la versione desktop ed un header (con burger menu) per la versione mobile. Appena pronta saranno forniti i seguenti file : 
  *) header.php da includere al posto del <div class=header>.....</div> che ora avete nei vostri file
  *) header_mobile.css. header_desktop.css e function_header.js da includere nella sezione <head> della propria pagina


**2** Ogni pagina prodotta di qualsiasi funzionalità dovrà testare l'esistenza della sessione, senza la quale si deve redirezionare a login.php con codice del tipo
<?php
   session_start();
   if (!isset($_SESSION['ruolo']))
       header("Location:login.php");
   else   {
   ?>
   <!-- codice html +php della pagina web da produrre -->
   <?php
   }
   ?>



## File Principali

I seguenti file PHP di libreria si trovano nella cartella `lib`:

- **globals.php**: Contiene variabili globali, come i dati necessari per accedere al server DBMS corretto, e procedure di utilità varia.
  
- **db.php**: Contiene la classe `DB` che permette di accedere al database e realizzare query di qualsiasi tipo, restituendo i risultati utilizzabili nelle pagine web.

## Configurazione del Database

Il file `db.php` contiene la classe `DB` che esegue tutte le operazioni sul database utilizzando la classe PDO. È possibile creare funzioni che, al loro interno, creino un oggetto della classe `DB`, impostino la query, utilizzino i metodi della classe e restituiscano i dati all'ambiente chiamante così come sono stati restituiti dall'oggetto `DB`.

#### Esempio di Funzione che Utilizza la Classe DB

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
