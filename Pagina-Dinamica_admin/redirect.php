<?php

	if(isset($_GET)){
		setcookie("user",$_GET['id']);
		header("Location: profilo_personale.php");
	}

?>