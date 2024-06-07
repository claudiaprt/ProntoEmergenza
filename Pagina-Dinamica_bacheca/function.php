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

function stampaBacheca($array){
    for($i=0;$i<count($array)-1;$i++){
        $arr = $array[$i];
        $mex = 
        "<li class='button-item'>
            <form method='post' action='comunicazione.php'>
                <input type='hidden' name='comunicazione' value=".$arr['idComunicazione'].">
                <button class='styled-button'>";
        if($arr['dataLettura'] == null)
            $mex .= "<img src='img/close_mail.png' alt='mail' width=50 height=50>";
        else
            $mex .= "<img src='img/open_mail.png' alt='mail' width=50 height=50>";
        $mex .= 
                    "<div class='info'>
                        <span class='title'>".$arr['titolo']."</span>
                        <span class='title'>".$arr['nome']."</span>
                        <span class='date'>".$arr['dataEmissione']."</span>
                    </div>
                </button>
            </form>
        </li>";
        echo $mex;
    }
}

function controllo($obj=[]){          // controlla se valori diversi da null
    $n = 0;
    foreach($obj as $value)
        if($value == "")
            $n++;
    if($n == 0)
        $f = true;
    else
        $f = false;
    return $f;
}

function file_extension($filename){
    $ext = explode(".", $filename);
    return $ext[count($ext)-1];
}

function combobox($array,$value,$name){
    for($i=0;$i<count($array)-1;$i++){
        $arr = $array[$i];
        echo "<option value=".$arr[$value].">".$arr[$name]."</option>";
    }
}

function ricercaRuoli($value){
    if($value == 'tutti'){
        $mex = select("SELECT idUtente from utenti");
    }else if($value == 'admin' || $value == 'user'){
            $mex = select("SELECT idUtente from utenti where tipoUtente = ?",[$value]);
          }else if($value == 'dipendete' || $value == 'volontario' || $value == 'corsista'){
                $mex = select("SELECT idUtente from utenti where status = ?",[$value]);
                }else
                    $mex = select("SELECT u.idUtente from ((utentiruoli ur inner join utenti u on u.idUtente = ur.idUtente)inner join ruoli r on r.idRuolo = ur.idRuolo) where idRuolo = ?",[$value]);
    return $mex;
}

function insert_comunicazioni($value,$key){
    for($i=0;$i<count($value)-1;$i++){
        $arr = $value[$i];
        insert("INSERT into utenticomunicazioni (idUtente,idComunicazione) values(?,?)",[$arr['idUtente'],$key['idComunicazione']]);
    }
}

function comunicazione($array){
    $arr = $array[0];
    $mg = "";
    if($arr['nomeFileAllegato'] != null)
        $mg = "<a href='download.php?file=".$arr['nomeFileAllegato']."'><button>Scarica Allegato</button></a>";
    echo 
    "<h1>".$arr['titolo']."</h1>
    <br>
    <p>".$arr['testo']."</p>
    <br>
    ".$mg."
    <br>
    <br>
    <p>Autore: ".$arr['cognome']." ".$arr['nome']."</p>
    ";
}

function titolo($array){
    $arr = $array[0];
    echo "<title>".$arr['titolo']."</title>";
}
?>