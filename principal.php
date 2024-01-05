<?php
    //aqui las variables globales importantes
    $url_globale = "https://www.prueba.techsysprogram.com/wp-content/plugins/tech_checkbox/";
?>


<html>
<head>
    <title>Ma page PHP</title>

</head>

<body>

    <?php

        //aqui recupero la liste de tirages completo pero en formato desarrollador
        $ID_Org = 9905;  //$_GET['ido'];
        $url = $url_globale . "ws/ws_ListeTirage.php?ido=".$ID_Org."&dev=3";
        $ws_ListeTirage2 = file_get_contents($url);

        //aqui recupero la liste de tirages completo
        $ID_Org = 9905;  //$_GET['ido'];
        $url = $url_globale . "ws/ws_ListeTirage.php?ido=".$ID_Org."&dev=0";
        $ws_ListeTirage = file_get_contents($url);

        $arr = json_decode($ws_ListeTirage, true);
        $Tirage = "";
        $code = 0;
        
        $html2 = <<<FIN

            <!-- comentario simple -->
            
            <h7>$ws_ListeTirage2</h7>
            <!-- <label for="tech_select_tirage">Choisissez une couleur :</label> -->
            
            <select class="form-select" id="tech_select_tirage" name="tech_select_name" onchange="changeBackground()">
        FIN;

        foreach ($arr as $item) { //foreach element in $arr
            $code = $item['sIDTirage'];
            $Tirage = $item['dDateTirage'] . "  " . $item['sAlias'] . "   => " . $code;
            $html2 = $html2 . <<<FIN
                <option value='$code'>$Tirage</option>
            FIN;
        }

        $html2 = $html2 . "</select>";
        echo $html2;

    ?>

    <!-- nuevas o utilisadas -->
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="">
        <label class="btn btn-outline-primary" for="btnradio1">Nouvelles planches</label>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked="">
        <label class="btn btn-outline-primary" for="btnradio2">Utiliser déjà mes planches</label>
    </div>
    <h1></h1>

    <div id="Compra2"></div>

    <div id="tech_id_table"></div>

    <div class="btn-TechSection">
        <!-- <button class="btn btn-primary" name="valider" id="btnEnregistrer">Enregistrer planches</button>-->
        <button class="btn_tech01" name="valider3" id="btnStock">verificar stock</button>

        <button class="btn_tech01" name="valider2" id="btnWoo">woocommerce</button>
    </div>
</body>
</html>