const months = [
    "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
    "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];

const giorniSettimana = [
    "Domenica", "Lunedì", "Martedì", "Mercoledì",
    "Giovedì", "Venerdì", "Sabato"];


function caricaGiorno(giorno, mese, anno) {
    
    let meseNome = months[mese-1].toUpperCase(); //Ottengo il mese passandogli il numero corrispondenti
    let indexSettimana = new Date(anno, mese-1, giorno).getDay(); //Ottengo l'index del giorno della settimana
    console.log(indexSettimana);
    let giornoSettimana = giorniSettimana[indexSettimana]; //Ottengo il rispettivo giorno della settimana passando l'index

    let data1 = meseNome + ' ' + anno;  //Creo la stringa da passare al div calendario-data1
    let data2 = giornoSettimana + ' ' + giorno + ' ' + meseNome.toLowerCase() + ' ' + anno; //Creo la stringa da passare al div calendario-data2

    document.getElementById('calendario-data1').innerHTML = '<p>' + data1 + '</p>';
    document.getElementById('calendario-data2').innerHTML = '<p>' + data2 + '</p>';
}

function dati(data) {

    var allDivs = document.querySelectorAll('div');
    allDivs.forEach(function(div) {
        div.classList.remove('active');
    });

    let selezionato = document.getElementById(data);
    if (selezionato) {
        selezionato.classList.add('active');
    } else {
        console.error('Elemento con id ' + data + ' non trovato.');
    }

    data = data.split('-');
    let anno = parseInt(data[0]);
    let mese = parseInt(data[1]);
    let giorno = parseInt(data[2]);

    caricaGiorno(giorno,mese,anno);


    var xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        turni();
    };



    xhttp.open('POST', './server.php');
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data=' + data);
}

function turni (text) {
    let str=JSON.parse(text.responseText);
    for (let k=0; k < 3; k++) {
        document.getElementById("mattina"+k+1).innerHTML=str[k]["cognome"]+ " "+str[k]["nome"];
    }
    for (k=3; k < 6; k++) {
        document.getElementById("pomeriggio"+k+1).innerHTML=str[k]["cognome"]+ " "+str[k]["nome"];
    }
    for (k=6; k < 9; k++) {
        document.getElementById("notte"+k+1).innerHTML=str[k]["cognome"]+ " "+str[k]["nome"];
    }
}

// ?? creare una stessa funzione show() e passare parametri diversi
function showEventi() {
    let content = document.getElementById('content');
    let eventiOption = document.getElementById('eventi-option');
    let viaggiOption = document.getElementById('viaggi-option');

    content.innerHTML = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    eventiOption.style.backgroundColor = "#262b5b";
    viaggiOption.style.backgroundColor = "#ef7f1b";
}

function showViaggi() {
    let content = document.getElementById('content');
    let viaggiOption = document.getElementById('viaggi-option');
    let eventiOption = document.getElementById('eventi-option');

    content.innerHTML = "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..";
    viaggiOption.style.backgroundColor = "#262b5b";
    eventiOption.style.backgroundColor = "#ef7f1b";
} 

window.addEventListener('scroll', function() {

    let socDiv1 = this.document.getElementById('calendario-soccoritore1');
    let socDiv2 = this.document.getElementById('calendario-soccoritore2');
    let autDiv = this.document.getElementById('calendario-autista');
    let mattina = this.document.getElementById('calendario-mattina-label');
    let pomeriggio = this.document.getElementById('calendario-pomeriggio-label');
    let notte = this.document.getElementById('calendario-notte-label');


    if (window.innerWidth < 550) {
        socDiv1.textContent = 'S1';
        socDiv2.textContent = 'S2';
        autDiv.textContent = 'A';
        mattina.textContent = 'M';
        pomeriggio.textContent = 'P';
        notte.textContent = 'N';
    } else {
        socDiv1.textContent = 'SOCCORITORE';
        socDiv2.textContent = 'SOCCORITORE';
        autDiv.textContent = 'AUTISTA';
        mattina.textContent = 'MATT.';
        pomeriggio.textContent = 'POME.';
        notte.textContent = 'NOTT.';
    }
});
