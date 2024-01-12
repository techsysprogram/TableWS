<?php


$IDO = explode("-", $_GET['ido']);
$ID_Org = $IDO[0]; //  $_GET['ido'];
$IDTirage = $IDO[1]; //   $_GET['idt'];
$str_stock = $IDO[2]; //   $_GET['ido'];  aqui tengo las planches
//$str_actif = $IDO[3]; //   $_GET['ido'];  aqui los codigo de barras

$dev = $_GET['dev'];


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

switch ($dev) {
    case 2:
        // Code to be executed if expression matches value1
        $response = "webservice  =>  " . 'http://boulier.techsysprogram.fr/TechAPI/JoueurPlanche/' . $ID_Org . "/" . $IDTirage . '/techsysprogram@gmail.com' . '<br>' . '<br>' . $response;
        $nuevoTexto = str_replace("},", "},<br>", $response);
        $response = $nuevoTexto;
        break;
    case 3:
        $response = "webservice  =>  " . 'http://boulier.techsysprogram.fr/TechAPI/JoueurPlanche/' . $ID_Org . "/" . $IDTirage . '/techsysprogram@gmail.com' . '<br>' . '<br>' . $response;
        $nuevoTexto = str_replace("},", "},<br><br>", $response);
        $response = $nuevoTexto;
        // Code to be executed if expression matches value2
        break;
    // ...
    default:
        // Code to be executed if expression does not match any of the cases
}

//aqui devuelvo la respuesta del webservice
echo $response;

?>

