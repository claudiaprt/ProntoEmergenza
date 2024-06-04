<?php
    //Per includere il footer bisogna fare require("footer.php") in fondo alla pagina
?>
<div class="footer">
    <img src="img/logoPerlasca.png" alt="Logo Perlasca" class="logoPerlasca">
    <div class="textPerlasca">
        Istituto Perlasca 2023/24 5AI-5BI-5AG
    </div>
    <div class="containerContatore">
        <div class="textContatore">
            N° Accessi totali
        </div>
        <div class="contatore">
            <?php
                try{ //Bisogna creare un file chiamato "nAccessi.txt" che salava il numero di accessi totale e viene aggiornato al login
                    $f = fopen("nAccessi.txt", "r");
                    $str = "Errore";

                    if($f != false)
                        $str = fgets($f);

                    echo $str;
                    fclose($f);
                }catch(Exception $e){
                    echo "Errore ".$e->getMessage();
                }
            ?>
        </div>
    </div>
</div>
<?php
    //Css da implementare
?>