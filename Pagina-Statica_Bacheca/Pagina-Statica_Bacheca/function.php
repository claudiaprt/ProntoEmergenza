<?php
function conn(){
    $dbname = "pronto_emergenza";   
    $server="localhost";
    $username="root";
    $psw="";
    return $conn = new PDO("mysql:dbname=$dbname;host=$server",$username,$psw);
}

function select($query,$param=[]){
    $conn = conn();
    $v = [];
    if($conn != null && isset($query)) {
        $stmt = $conn->prepare($query);
        $stmt->execute($param);
        $v = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $v['rows'] = $stmt->rowCount();
    }else{
        $v['error'] = "Errore";
    }
    $conn=null;
    return $v;
}

function insert($query, $param = []) {
    $conn = conn();
    $res = [];
    if ($conn !== null && isset($query)){
        $stmt = $conn->prepare($query);
        $stmt->execute($param);
        $res['rows'] = $stmt->rowCount();
    } else {
        $res['error'] = "Errore di connessione o query non valida.";
    }
    $conn = null;
    return $res;
}
?>