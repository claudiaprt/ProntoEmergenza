<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="globals.css" />
	<link rel="stylesheet" media="screen and (min-width: 768px)" href="style_login_desktop.css" />
	<link rel="stylesheet" media="screen and (max-width: 767px)" href="style_login_mobile.css" />
    <link rel="stylesheet" href="styleguide.css" />
	<?php /*
		$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
 
			if($isMob){ 
				echo "<link rel='stylesheet' href='style_login_mobile.css'/>";
			}else{ 
				echo "<link rel='stylesheet' href='style_login_desktop.css'/>"; 
			}*/
	?>
</head>
  <body>
		<div class="log-in">
		  <div class="div">
			<img class="icona-ambulanza" src="img/icona-ambulanza.png" />
			<img class="LOGO-ambulanza" src="img/logo-ambulanza.png" />
			<div class="overlap-group">
			<form action="#" method="POST" >
				<div class="bottone-accedi"><input type="submit" class="text-wrapper-2" value="Accedi"></input></div>
				<div class="bottone-username"><input type="text" class="text-wrapper-3" placeholder="Username"></input></div>
				<div class="div-wrapper"><input type="password" class="text-wrapper-3" placeholder="Password"></input></div>
			</form> 
			</div>
		  </div>
		</div>
  </body>
</html>



