<?php
	require_once("php/db.php");
	require_once("php/globals.php");
	include "php/header.php";
	session_start();
	
	
	if(!isset($_SESSION['tipoUtente'])||$_SESSION['tipoUtente']!="admin"){
		header("Location: login.php");
	}
	else{
		
		//Prelevo le informazioni relative agli utenti
		$db = new lib\DB();
		$profili = $db->query("SELECT * FROM utenti");
		$db->close();
		
?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/globals.css" />
			<link rel="stylesheet" href="css/styleguide.css" />
			<link rel="stylesheet" media="screen and (min-width:701px)" href="css/styleD_profilo_amm.css" />
			<link rel="stylesheet" media="screen and (max-width:700px)" href="css/styleM_profilo_amm.css" />
			<link rel="stylesheet" media="screen and (min-width:701px)" href="css/styleDHeader.css" />
			<link rel="stylesheet" media="screen and (max-width:700px)" href="css/styleMHeader.css" />
			<script type="text/javascript" src="js/script_profilo_amm.js"></script>
			<script type="text/javascript" src="js/scriptHeader.js"></script>
		</head>
		<body>
				
			<?php
				printHeader();
			?>

			<div class="slider">
			
				<?php
			
				if(count($profili)>0){
					foreach($profili as $profili){
						$img = "img/profili/".$profili['immagine'];
						echo 
						"
							<div class='profile' onclick='postData(".$profili['idUtente'].")'>
								<img class='image' src='".$img."'>
								<p class='nome'>".$profili['nome']." ".$profili['cognome']."</a>
							</div>
						";
					}
				}
				
				?>
			</div>
		</body>
		</html>
<?php
	}
?>