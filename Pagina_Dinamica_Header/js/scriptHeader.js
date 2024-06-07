/* display menu mobile */
function showMenu(){
	document.getElementById('menu-mobile-box').classList.toggle('show-burger'); 
}

/* burger menu */
function stampaMenu(){
	let menu="";
	menu += '<a class="pulsanti" href="index.php">Home</a>';
	menu += '<a class="pulsanti" href="profilo.php">Profilo</a>';
	menu += '<a class="pulsanti" href="calendario.php">Calendario</a>';
	menu += '<a class="pulsanti" href="bacheca.php">Bacheca</a>';
	menu += '<a class="pulsanti" href="contatti.php">Contatti</a>';
	document.write(menu);
}

