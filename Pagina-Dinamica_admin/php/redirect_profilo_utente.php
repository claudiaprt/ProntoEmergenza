<?php

	/*
	Pagina di Redirect
	
	Permette il salvataggio dell'idUtente nel cookie "user", per permettere alla Pagina
	profilo_personale.php di accedere alle informazioni dell'utente
	*/

	if(isset($_GET)){
		setcookie("user",$_GET['id']);
		header("Location: profilo_personale.php");
	}

?>