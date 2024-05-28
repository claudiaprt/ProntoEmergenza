<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="globals.css" />
	<link rel="stylesheet" media="screen and (min-width: 768px)" href="style_login_desktop.css" />
	<link rel="stylesheet" media="screen and (max-width: 767px)" href="style_login_mobile.css" />
    <link rel="stylesheet" href="styleguide.css" />
	<title>Accesso</title>
	<script type="text/javascript" src="funz.js"></script>
</head>
  <body>
		<h2 id="h2Log"></h2>
		<div class="log-in">
		  <div class="div">
			<img class="icona-ambulanza" src="img/icona-ambulanza.png" />
			<img class="LOGO-ambulanza" src="img/logo-ambulanza.png" />
			<div class="overlap-group">
			<form action="#" method="POST" name="formLog" onsubmit="return loginJS(document.formLog)">
				<div class="bottone-accedi"><input type="submit" class="text-wrapper-2" value="Accedi"></input></div>
				<div class="bottone-username"><input type="text" class="text-wrapper-3" placeholder="Username" name="textLog"></input></div>
				<div class="div-wrapper"><input type="password" class="text-wrapper-3" placeholder="Password" name="pswLog"></input></div>
			</form> 
			</div>
		  </div>
		</div>
  </body>
</html>



