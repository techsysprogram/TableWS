<?php

    $ID_Org =  $_GET['ido'];
    if (empty($ID_Org)) {
        $ID_Org = 9905;
    }
    $dev = $_GET['dev'];
        
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://boulier.techsysprogram.fr/TechAPI/Tirages/' . $ID_Org,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Token: Miguel'
        ),
    ));
    $response = "";
    $response = curl_exec($curl);
    curl_close($curl);


    switch ($dev) {
        case 2:
            // Code to be executed if expression matches value1
            $response = "webservice  =>  " . "http://boulier.techsysprogram.fr/TechAPI/Tirages/" . $ID_Org . "<br>" . "<br>" . $response;
            $nuevoTexto = str_replace("},", "},<br>", $response);
            $response = $nuevoTexto;
            break;
        case 3:
            $response = "webservice  =>  " . "http://boulier.techsysprogram.fr/TechAPI/Tirages/" . $ID_Org . "<br>" . "<br>" . $response;
            $nuevoTexto = str_replace("},", "},<br><br>", $response);
            $response = $nuevoTexto;
            $response = "";

            // Code to be executed if expression matches value2
            break;
        // ...
        default:
            // Code to be executed if expression does not match any of the cases
    }
    
    //aqui devuelvo la respuesta del webservice
    echo $response;
?>