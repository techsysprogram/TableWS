<?php
    //aqui las variables globales importantes
    $url_globale = "https://www.prueba.techsysprogram.com/wp-content/plugins/tech_checkbox/";
    $url_CSS_globale = $url_globale . "css/style02.css";
?>

<?php
    //aqui recupero la liste de planches que pertenecen a ese jugador
    $ID_Org = 9905;  //$_GET['ido'];
    $url = $url_globale . "ws/ws_MisPlanches.php?ido=".$_GET['ido']."&dev=0";
    $response = file_get_contents($url);
?>       

<?php



$DirPlugin = "";

$html2 = "";
$html2 = $html2 . <<<FIN
    <head>
        <link rel="stylesheet" href="$url_CSS_globale">
    </head>

    <body>
        <div class="table_responsive">
            <table>
                <thead>
                    <tr class="table-active">

                        <th colspan="2">Planche</th>

                        <th scope="col">Prix</th>
                        <th scope="col">*</th>
                    </tr>
                </thead>
            
FIN;

// $response aqui regreso los datos json del webservice

$arr2 = json_decode($response, true);
$etat = true;
$PlancheNom = "";


foreach ($arr2 as $item) { //foreach element in $arr
    $etat = $item['bEtat'];
    $Codebarre = $item['sCodeBarre'];
    $Codebarre_val =  $Codebarre . "|" . $item['sPlancheType'] . "|" . $item['sPlancheFormat'] . "|" . $item['sPlanchePrix'] . "|";
    $PlancheNom = $item['sPlancheType'] . " - " . $item['sPlancheFormat'] . '<br>' . $item['sPlancheComment'];
    $Prix = $item['sPlanchePrix'] . "€";

    //aqui separa la liena en 3 partes codebarre,actif!,number
    $html2 = $html2 . ($etat ? "<tr class='active-row'>" : "<tr>");

    $html2 = $html2 . "<td class='primera_col'>$PlancheNom</td>";
    //$html2 = $html2 . "<td>$Codebarre</td>";
    
    if ($etat) {
        $html2 = $html2 . "<td><span class='pl_reponsive'>$PlancheNom<br></span><span class='action_btn'><a href='http://planches.techsysprogram.fr/LotoWS/PDFRecuperer/PL-$Codebarre.pdf' target='_blank'>  $Codebarre </a></span></td>";
    } else {
        //$html2 = $html2 . "<td>$Codebarre</td>";
        $html2 = $html2 . "<td><span class='pl_reponsive'>$PlancheNom<br></span><span class='action_btn'><a href='http://planches.techsysprogram.fr/LotoWS/PDFRecuperer/PL-$Codebarre.pdf' target='_blank'>  $Codebarre </a></span></td>";
    }

  
    $html2 = $html2 . "<td>$Prix</td>";

    if (!$etat) {
        $html2 = $html2 . <<< FIN
            <th scope='row'>
                <input type="checkbox" id="$Codebarre_val" name="check01" value=$Codebarre_val>
                <label for="$Codebarre_val"></label>
            FIN;
    } else {
        $html2 = $html2 . "<th>";
    }
    $html2 = $html2 . "</th>";


    $html2 = $html2 . "</tr>";
}

$html2 = $html2 . <<<FIN
        </table>
    </div> 
</tbody>
FIN;

echo $html2;
?>