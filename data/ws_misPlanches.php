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

$response =  curl_exec($curl);
curl_close($curl);

$response = "webservice  =>  " . 'http://boulier.techsysprogram.fr/TechAPI/JoueurPlanche/' . $ID_Org . "/" . $IDTirage . '/techsysprogram@gmail.com' . '<br>' . '<br>' . $response;

echo $response ;

?>

