function read_checkbox(chx){
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        caricaBacheca(this);
    };
    xhttp.open("POST", "switch.php");
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send("val="+chx.checked);
}

function caricaBacheca(xhttp){
    let ris = JSON.parse(xhttp.responseText);
    let mex = "";
    for(let i=0;i<ris['rows'];i++){
        let mg;
        if(ris[i].dataLettura == null)
            mg = "<img src='img/close_mail.png' alt='mail' width=50 height=50>";
        else
            mg = "<img src='img/open_mail.png' alt='mail' width=50 height=50>";
        mex += "<li class='button-item'><form method='post' action='comunicazione.php'><input type='hidden' name='comunicazione' value="+ris[i].idComunicazione+"><button class='styled-button'>"+mg+"<div class='info'><span class='title'>"+ris[i].titolo+"</span><span class='title'>"+ris[i].nome+"</span><span class='date'>"+ris[i].dataEmissione+"</span></div></button></form></li>";
    }
    document.getElementById("ul").innerHTML = mex;
}

function searchbar(bar){
    let val = bar.value;
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        returnSearch(this);
    }
    xhttp.open("POST", "search.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("val="+val);
}

function returnSearch(xhttp){
    let str = JSON.parse(xhttp.responseText);
    let mex = "";
    for(let i=0;i<str['rows'];i++){
        let mg;
        if(str[i].dataLettura == null)
            mg = "<img src='img/close_mail.png' alt='mail' width=50 height=50>";
        else
            mg = "<img src='img/open_mail.png' alt='mail' width=50 height=50>";
        mex += "<li class='button-item'><form method='post' action='comunicazione.php'><input type='hidden' name='comunicazione' value="+str[i].idComunicazione+"><button class='styled-button'>"+mg+"<div class='info'><span class='title'>"+str[i].titolo+"</span><span class='title'>"+str[i].nome+"</span><span class='date'>"+str[i].dataEmissione+"</span></div></button></form></li>";
    }
    document.getElementById("ul").innerHTML = mex;
}