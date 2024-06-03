<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/globals.css" />
	<link rel="stylesheet" href="css/styleguide.css" />
	<link rel="stylesheet" media="screen and (min-width:701px)" href="css/styleDheader.css" />
	<link rel="stylesheet" media="screen and (max-width:700px)" href="css/styleMheader.css" />
	<script type="text/javascript" src="js/scriptHeader.js"></script>
</head>

<body>

	<div class="header">
		<a href="home.php">
			<img class="immagine-logo" src="img/immagine-logo-ambulanza.png" />
		</a>
		<script>
			stampaMenu()
		</script>

		<img class="burger-menu" src="img/burger-menu.svg" onclick="showMenu()" class="show-burger" />
		<div class="menu-mobile">
			<div id="menu-mobile-box" onclick="showMenu()" class>
				<script>
					stampaMenu()
				</script>
			</div>
		</div>
	</div>

</body>

</html>