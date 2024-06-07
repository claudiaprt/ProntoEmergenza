<?php
	session_start();
	if(isset($_SESSION['idUtente'])){
		header("Location: home.php");
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\globals.css" />
    <link rel="stylesheet" media="screen and (min-width: 701px)" href="css\style_login_desktop.css" />
    <link rel="stylesheet" media="screen and (max-width: 700px)" href="css\style_login_mobile.css" />
    <link rel="stylesheet" href="css\styleguide.css" />
    <title>Accesso</title>
    <script type="text/javascript" src="js\funz.js"></script>
</head>
<body>
    <div class="log-in">
        <div class="images-section">
            <img class="LOGO-ambulanza" src="img/logo-ambulanza.png" />
			<img class="icona-ambulanza" src="img/icona-ambulanza.png" />
        </div>
        <div class="form-section">
            <div class="overlap-group">
                <form action="#" method="POST" class="formLog" name="formLog" onsubmit="return loginJS(document.formLog)">
                    <div class="errore"><h2 id="h2Log"></h2></div>
                    <div class="bottone-username"><input type="text" class="text-wrapper-3" placeholder="Username" name="textLog"></input></div>
                    <div class="div-wrapper"><input type="password" class="text-wrapper-3" placeholder="Password" name="pswLog"></div>
                    <div class="bottone-accedi"><input type="submit" class="text-wrapper-2" value="Accedi"></input></div>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>
<?php
	}
?>