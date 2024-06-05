<?php
	require_once("php/funzioni.php");

	session_start();
	/*if(!isset($_SESSION['prova'])||$_SESSION['prova']!="admin")
		header("Location: login.php");
	else{*/
		
		$profili = select("SELECT idUtente, nome, cognome FROM utenti");
		
?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/globals.css" />
			<link rel="stylesheet" href="css/styleguide.css" />
			<link rel="stylesheet" media="screen and (min-width:701px)" href="css/styleD_profilo_amm.css" />
			<link rel="stylesheet" media="screen and (max-width:700px)" href="css/styleM_profilo_amm.css" />
			<script type="text/javascript" src="js/script_profilo_amm.js"></script>
		</head>
		<body>
				
			<div class="header">
				<a href="home.php">	
					<img class="immagine-logo" src="img/immagine-logo-ambulanza.png" />
				</a>
				<script>stampaMenu()</script>

				<img class="burger-menu" src="img/burger-menu.svg" onclick="showMenu()" class="show-burger"/>
				<div class="menu-mobile">
					<div id="menu-mobile-box" onclick="showMenu()" class>
						<script>stampaMenu()</script>
					</div>
				</div>
			</div>

			<div class="slider">
			
				<?php
			
				if(count($profili)>0){
					foreach($profili as $user){
						echo 
						"
							<div class='profile' onclick='postData(".$user['idUtente'].")'>
								<img class='image' src='img/ellipse-".$user['idUtente'].".png'>
								<p class='nome'>".$user['nome']." ".$user['cognome']."</a>
							</div>
						";
					}
				}
				
				?>
			</div>
		</body>
		</html>
<?php
	//}
?>