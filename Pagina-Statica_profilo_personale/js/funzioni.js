/*funzione per display menu mobile*/
function showMenu(){
	document.getElementById('menu-mobile-box').classList.toggle('show-burger'); 
}

/*funzione per stampa hamburger menu*/
function stampaMenu(type){
	var menu;
    if(type=="m")
	{
		menu = '<ul>';
			menu += '<li><a href="index.php">Home</a></li>';
			menu += '<li><a href="profilo.html">Profilo</a></li>';
			menu += '<li><a href="calendario.html">Calendario</a></li>';
			menu += '<li><a href="bacheca.html">Bacheca</a></li>';
			menu += '<li><a href="contatti.html">Contatti</a></li>';
		menu += '</ul>';
	}
	document.write(menu);
}