<?php
//esto es lo que necesita para api woocommerce
//require "/home/ynix0625/public_html/wp-content/plugins/Api_Techsysprogram/" . '/vendor/autoload.php';

//use Automattic\WooCommerce\Client;

//$valueNom =  $('#pr_nom').val();
$valueNom =  "hol";

// $IDTirage = "42";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $IDTirage = $_REQUEST('idt');
//     if (empty($IDTirage)) {
//         $IDTirage = "42";
//     }
// }

$IDO = explode("-", $_GET['ido']);
$ID_Org = $IDO[0]; //  $_GET['ido'];
$IDTirage = $IDO[1]; //   $_GET['idt'];
$str_stock = $IDO[2]; //   $_GET['ido'];  aqui tengo las planches
$str_actif = $IDO[3]; //   $_GET['ido'];  aqui los codigo de barras
$str_titulo = $_GET['titre']; //   $_GET['titre'];
//    lo pongo vacio porque no es un PUT
$bRojo = false;
$data = "";
$tr_Rojo = "";


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://boulier.techsysprogram.fr/TechAPI/JoueurPlanche/' . $ID_Org . "/" . $IDTirage . '/techsysprogram@gmail.com',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Token: Miguel'
    ),
));

$response = curl_exec($curl);
curl_close($curl);
?>


<?php
$html2 = "";
$html2 = $html2 . <<<FIN
    <!-- <div class="container"> -->
    <table class="table table-hover">
    <thead>
        <tr class="table-active">
            <th scope="col">Planche</th>
            <th scope="col">Code</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    FIN;

// $response aqui regreso los datos json del webservice

$arr2 = json_decode($response, true);
$etat = true;
$PlancheNom = "";


foreach ($arr2 as $item) { //foreach element in $arr
    $etat = $item['bEtat'];
    $Codebarre = $item['sCodeBarre'];
    $Codebarre_val =  $Codebarre . "|" . $item['sPlancheType'] . "|" . $item['sPlancheFormat'] . "|" . $item['sPlanchePrix'] . "|";
    $PlancheNom = $item['sPlancheType'] . " - " . $item['sPlancheFormat'];
    $Prix = $item['sPlanchePrix'] . " €";

    //aqui separa la liena en 3 partes codebarre,actif!,number
    $html2 = $html2 . ($etat ? "<tr class='table-success'>" : "<tr>");

    $html2 = $html2 . "<td>$PlancheNom</td>";
    //$html2 = $html2 . "<td>$Codebarre</td>";
    if ($etat) {
        $html2 = $html2 . "<td><a href='http://planches.techsysprogram.fr/LotoWS/PDFRecuperer/PL-$Codebarre.pdf' target='_blank'> <button class='btn btn-success' vertical-align:bottom> $Codebarre</button> </a></td>";
    } else {
        $html2 = $html2 . "<td>$Codebarre</td>";
    }
    $html2 = $html2 . "<td>$Prix</td>";

    if (!$etat) {
        $html2 = $html2 . <<< FIN
            <th scope='row'>
            <div class="form-check" >
            <input class="form-check-input" onchange="tech_enregistrer2()" type="checkbox" name="check01" value=$Codebarre_val>
            FIN;
    } else {
        $html2 = $html2 . "<th>";
    }
    $html2 = $html2 . "</th>";


    $html2 = $html2 . "</tr>";
}

$html2 = $html2 . <<<FIN
</tbody>
</table>
 
FIN;

echo $html2;
?>