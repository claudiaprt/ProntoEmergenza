/*funzione per display menu mobile*/
function showMenu(){
	document.getElementById('menu-mobile-box').classList.toggle('show-burger'); 
}

/*funzione per stampa hamburger menu*/
function stampaMenu(){
	let menu="";
	menu += '<a class="pulsanti" href="index.php">Home</a>';
	menu += '<a class="pulsanti" href="profilo.html">Profilo</a>';
	menu += '<a class="pulsanti" href="calendario.html">Calendario</a>';
	menu += '<a class="pulsanti" href="bacheca.html">Bacheca</a>';
	menu += '<a class="pulsanti" href="contatti.html">Contatti</a>';
	document.write(menu);
}

function postData(user) {
    window.location.replace("./redirect.php?id="+user);
}