<?php

	function conn(){
		try{
			$dbname="pronto_emergenza";
			$server="localhost";
			$username="root";
			$psw="";
			$dsn="mysql:dbname=$dbname;host=$server;";
			
			$conn=new PDO($dsn,$username,$psw);
		}
		catch(PDOExeption $e){
			$conn = $e->getMessage();
		}
		return $conn;
	}
	
	function select($query, $vet = [], $att = []){
		try{
			$conn = conn();
			if(count($vet) == count($att)){	
				$stmt = $conn->prepare($query);
				for($i = 0;$i<count($vet);$i++){
					$stmt->bindParam($i+1,$vet[$i],$att[$i]);
				}
				$stmt->execute();
				
				$result = $stmt->fetchAll();
				if(count($result)>0){
					return $result;
				}
				else{
					return 0;
				}
			}
			
		}
		catch(PDOException $e){
			$result = $e->getMessage();
		}
		finally{
			$conn=null;
		}
	}

?>