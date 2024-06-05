<?php
	include "header.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/globals.css" />
	<link rel="stylesheet" href="css/styleguide.css" />
</head>

<body>
	<?php
		//tipo utente
		session_start();
		$_SESSION['immagine_profilo'] = 'img/ellipse-18.png'; 
		printHeader();
	?>

</body>

</html>