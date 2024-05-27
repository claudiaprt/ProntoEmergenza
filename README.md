Le cartelle delle pagine web statiche hanno nome Pagine_statiche_xxxxxxx  dove xxxxx indica la funzione svolta dal gruppo di lavoro

La cartella PE è quella in cui saranno via via inserite le pagine funzionanti del progetto PHP complessivo

Il file Globals.php contiene var globali (come dati x accedere al server dbms corretto) e procedure di utilità varia
Il file db.php contine la classe che permette di accedere al DB e realizzare le query (di qualsiasi tipo) ottenendo in uscita risultati da usare nella pegina web

Possibile realizzare funzioni nel codice che <ll loro interno creino l'oggetto di classe DB, impostino la query, usino i metodi e tornino all'ambiente chiamante i dati cosi come sono restituiti dall'oggetto.
