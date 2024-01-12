<?php
    //aqui las variables globales importantes
    $order_id =  $_GET['order_id'];
    $url_commande = "https://www.planete-lotolive.fr/wp-json/dlpro/v1/get/order?order_id=".$order_id;
    $url_offerte = "https://boulier.techsysprogram.fr/LotoWS/CadeauPedir/MIGUEL/".$order_id;
?>


<html>
<head>
    <title>Ma page PHP</title>

</head>

<body>

    <?php

        //aqui recupero la liste de la commande
        $url = $url_commande ;
        $js_commande = file_get_contents($url);   
        $arr = json_decode($js_commande, true);

        $prenom = $arr['billing_address']['order_billing_first_name'];
        
        $nom = $arr['billing_address']['order_billing_last_name'];
        $ncommande = $arr['order_id'];
        $Organisateur = strtoupper($arr['billing_address']['order_billing_company']); //en majuscule

        $items = $arr['items'];
        $Codebarre ="";

        $TableCommandeHtml = '<tr style="border-bottom:1px solid #551a7f">';
        foreach ($items as $item) { //foreach element in $arr
            $NomPlanche = $item['item_name'];
            $Codebarres = $item['codes_planches'];

            if(isset($Codebarres[0])) {
                // Votre code ici
                // Utilisez $_GET[0] en toute sécurité                
                $Codebarre = $Codebarres[0];
                $TableCommandeHtml = $TableCommandeHtml . <<< FIN
                <tr>
                    <td style="padding:12px;border:none">$NomPlanche</td>
                    <td style="padding:12px;border:none;text-align:center" align="center">
                            <div>
                                <span style="font-weight:bold">$Codebarre</span>
                                <a href="https://suivimail.cartaloto.net/ctr.php?id=p7ke47p2gjss3cqa_1&amp;r=techsysprogram@gmail.com&amp;url=https%3A%2F%2Fplanches.techsysprogram.fr%2FLotoWS%2FPDFRecuperer%2F2285769%3BPL-$Codebarre.pdf" style="color:#ffffff;font-weight:bold;text-transform:uppercase;background-color:#f14b59;border:1px solid #f14b59;text-align:center;border-radius:10px;display:block;text-decoration:none" bgcolor="#f14b59" target="_blank">Cliquez ici pour imprimer</a> 
                            </div>
                    </td>
                </tr>
                FIN;

            } else {
                // Code à exécuter si l'index n'existe pas
                $Codebarre = "Pas de planches";

                $TableCommandeHtml = $TableCommandeHtml . <<< FIN
                <tr>
                    <td style="padding:12px;border:none">$NomPlanche</td>
                    <td style="padding:12px;border:none;text-align:center" align="center">
                            <div>
                                <span style="font-weight:bold">$Codebarre</span>
                            </div>
                    </td>
                </tr>
                FIN;
            }
        }
        $TableCommandeHtml = $TableCommandeHtml . '</tr>';





        //aqui recupero la liste de planches offertes
        $url = $url_offerte ;
        $js_offerte = file_get_contents($url);        
        $arr = json_decode($js_offerte, true);

        $Codebarre2 = "";
        if (count($arr)>0) {           
            $TituloPlancheOffertes = "Mes planches Offertes";   

            $TableOffertesHtml = '<tr style="border-bottom:1px solid #551a7f">';
            foreach ($arr as $item) { //foreach element in $arr
                $NomPlanche = $item['sTirageNom'] . ' - ' . $item['sPlancheNom'];
                $Codebarre2 = $item['sCodeBarra'];
                $TableOffertesHtml = $TableOffertesHtml . <<< FIN
                    <tr>
                        <td style="padding:12px;border:none">$NomPlanche</td>
                        <td style="padding:12px;border:none;text-align:center" align="center">
                                <div>
                                    <span style="font-weight:bold">$Codebarre2</span>
                                    <a href="https://suivimail.cartaloto.net/ctr.php?id=p7ke47p2gjss3cqa_1&amp;r=techsysprogram@gmail.com&amp;url=https%3A%2F%2Fplanches.techsysprogram.fr%2FLotoWS%2FPDFRecuperer%2F2285769%3BPL-$Codebarre2.pdf" style="color:#ffffff;font-weight:bold;text-transform:uppercase;background-color:#f14b59;border:1px solid #f14b59;text-align:center;border-radius:10px;display:block;text-decoration:none" bgcolor="#f14b59" target="_blank">Cliquez ici pour imprimer</a> 
                                </div>
                        </td>
                    </tr>
                    FIN;
            }
            $TableOffertesHtml = $TableOffertesHtml . '</tr>';
        } else {
            $TituloPlancheOffertes = "";  
            $TableOffertesHtml = "";  
        }



        $html2 = "";
        $html2 = $html2 . <<< FIN

        <tbody>
        <tr>
          <td align="center" valign="top">
            <div id="m_6215280577215564173template_header_image">
              <p style="margin-top: 0">
                <img
                  src="https://ci3.googleusercontent.com/meips/ADKq_Nbo1EoGMFCXZKilSxXVM0RuQhuy_zFwFmBrlf9iXgk1tX4jG-7a6aDHiM9mTrSfhUFy2CRfdr12KjB0kOlDTL6xvU9PFVL2DHsjnc0howLS8n-rdUiJt0nVYG57axS8xjm-B3l2ONXiHA=s0-d-e1-ft#https://www.planete-lotolive.fr/wp-content/uploads/2021/07/logo-pll-sans-fond-1.png"
                  alt="Planète Loto Live"
                  width="600"
                  style="
                    border: none;
                    display: inline-block;
                    font-size: 14px;
                    font-weight: bold;
                    height: auto;
                    outline: none;
                    text-decoration: none;
                    text-transform: capitalize;
                    vertical-align: middle;
                    max-width: 100%;
                    margin-left: 0;
                    margin-right: 0;
                  "
                  border="0"
                  class="CToWUd"
                  data-bit="iit"
                />
              </p>
            </div>
            <table
              border="0"
              cellpadding="0"
              cellspacing="0"
              width="600"
              id="m_6215280577215564173template_container"
              style="
                background-color: #fff;
                border: 1px solid #dedede;
                border-radius: 3px;
              "
              bgcolor="#fff"
            >
              <tbody>
                <tr>
                  <td align="center" valign="top">
                    <table
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      width="600"
                      id="m_6215280577215564173template_body"
                    >
                      <tbody>
                        <tr>
                          <td
                            valign="top"
                            id="m_6215280577215564173body_content"
                            style="background-color: #fff"
                            bgcolor="#fff"
                          >
                            <table
                              border="0"
                              cellpadding="20"
                              cellspacing="0"
                              width="100%"
                            >
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding: 48px 48px 32px">
                                    <div
                                      id="m_6215280577215564173body_content_inner"
                                      align="left"
                                    >
                                      <p style="margin: 0 0 16px">
                                        <span
                                          style="
                                            color: #000000;
                                            font-size: 30px;
                                            line-height: 150%;
                                            margin: 0;
                                            text-align: left;
                                            font-weight: bold;
                                          "
                                          >Détails de la commande</span
                                        >
                                      </p>
                                      <table
                                        id="m_6215280577215564173dlpro-complete-order-table"
                                        border="0"
                                        cellpadding="0"
                                        cellspacing="0"
                                        width="100%"
                                        style="
                                          background: #f2edf9;
                                          font-weight: bold;
                                          color: #000;
                                          margin: 0 0 16px;
                                        "
                                        bgcolor="#f2edf9"
                                      >
                                        <tbody>
                                          <tr>
                                            <td
                                              scope="row"
                                              colspan="2"
                                              style="padding: 12px"
                                            >
                                              Client: $prenom $nom
                                            </td>
                                          </tr>
                                          <tr>
                                            <td
                                              scope="row"
                                              colspan="2"
                                              style="padding: 12px"
                                            >
                                              N° de la commande: $ncommande
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <p
                                        style="
                                          margin: 0 0 16px;
                                          font-size: 16px;
                                          line-height: 30px;
                                          color: #ffffff;
                                          font-weight: bold;
                                          padding: 16px 30px 12px;
                                          text-transform: uppercase;
                                          background-color: #8bc34a;
                                          border: 1px solid #8bc34a;
                                          text-align: center;
                                          border-radius: 10px;
                                        "
                                        bgcolor="#8bc34a"
                                        align="center"
                                      >
                                        <img
                                          src="https://ci3.googleusercontent.com/meips/ADKq_NZ3m-BLLQtI0L765jIMeGjcknooy1LtdJ_3mYyevAiiXfSmPaivP5DUThDxK7A65kSzrnKvfateqmap-VG0VeIUsjXHM5KDvgSl-TDz5Xs8RPi3gLlJut9X_42iHJAIrM9OrwXMQB0GvfoNr-QjNJe-ZT4=s0-d-e1-ft#https://www.planete-lotolive.fr/wp-content/themes/dlpro-loto-live/images/dlpro-icon/check.png"
                                          alt=""
                                          style="
                                            border: none;
                                            display: inline-block;
                                            font-size: 14px;
                                            font-weight: bold;
                                            outline: none;
                                            text-decoration: none;
                                            text-transform: capitalize;
                                            vertical-align: middle;
                                            margin-right: 10px;
                                            max-width: 100%;
                                            width: 50px;
                                            height: 50px;
                                          "
                                          border="0"
                                          width="50"
                                          height="50"
                                          class="CToWUd"
                                          data-bit="iit"
                                        />Votre commande est confirmée
                                      </p>
                                      <p style="margin: 0 0 16px">
                                        Votre commande a bien été prise en compte...
                                      </p>
                                      <p style="margin: 0 0 16px; font-weight: bold">
                                        <span style="color: #551a7f; font-size: 16px"
                                          >Prestataire de services:</span
                                        >
                                        $Organisateur
                                      </p>
      
                                      <div style="margin-bottom: 40px">
                                        <table
                                          cellspacing="0"
                                          cellpadding="6"
                                          border="0"
                                          style="
                                            color: #636363;
                                            vertical-align: middle;
                                            width: 100%;
                                            font-family: 'Helvetica Neue', Helvetica,
                                              Roboto, Arial, sans-serif;
                                            border: 1px solid #f2edf9;
                                          "
                                          width="100%"
                                        >
                                          <thead>
                                            <tr>
                                              <th
                                                scope="col"
                                                colspan="2"
                                                style="
                                                  vertical-align: middle;
                                                  padding: 12px;
                                                  text-align: center;
                                                  font-weight: bold;
                                                  color: #551a7f;
                                                  border: none;
                                                  font-size: 18px;
                                                  border-bottom: 1px solid #551a7f;
                                                "
                                                align="center"
                                              >
                                                Mes planches
                                              </th>
                                            </tr>
                                          </thead>
      
                                          <tbody>
                                            $TableCommandeHtml
                                          </tbody>
                                        </table>
                                      </div>



                                      <div style="margin-bottom: 40px">
                                      <table
                                        cellspacing="0"
                                        cellpadding="6"
                                        border="0"
                                        style="
                                          color: #636363;
                                          vertical-align: middle;
                                          width: 100%;
                                          font-family: 'Helvetica Neue', Helvetica,
                                            Roboto, Arial, sans-serif;
                                          border: 1px solid #f2edf9;
                                        "
                                        width="100%"
                                      >
                                        <thead>
                                          <tr>
                                            <th
                                              scope="col"
                                              colspan="2"
                                              style="
                                                vertical-align: middle;
                                                padding: 12px;
                                                text-align: center;
                                                font-weight: bold;
                                                color: #551a7f;
                                                border: none;
                                                font-size: 18px;
                                                border-bottom: 1px solid #551a7f;
                                              "
                                              align="center"
                                            >
                                                $TituloPlancheOffertes
                                            </th>
                                          </tr>
                                        </thead>
    
                                        <tbody>
                                          $TableOffertesHtml
                                        </tbody>
                                      </table>
                                    </div>



                                    
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      
        <tr>
          <td align="center" valign="top">
            <table
              border="0"
              cellpadding="10"
              cellspacing="0"
              id="m_6215280577215564173template_footer"
              style="width: 65%; margin-top: 16px"
              width="65%"
            >
              <tbody>
                <tr>
                  <td valign="top" style="padding: 0; border-radius: 6px">
                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td
                            valign="middle"
                            style="
                              padding: 0;
                              border-radius: 6px;
                              text-align: center;
                              width: 50%;
                            "
                            align="center"
                            width="50%"
                          >
                            <img
                              src="https://ci3.googleusercontent.com/meips/ADKq_NZJyjA4VJxYZKWQt7Wp3MsE6Cm6BqTYxyKJJiI7EAMWQqGj7Z3ZmSxpxwdZUksalMNgK-BHbTrOqWgfvlAsb8dYGj5lkgh-e8OGvQbO4a4_mKryKPWPP0aBRxSO0qZFwXvobaQh2gezHce9R-DbrB6R=s0-d-e1-ft#https://www.planete-lotolive.fr/wp-content/themes/dlpro-loto-live/images/cartaloto-logo.jpg"
                              alt="Planète Loto Live"
                              style="
                                border: none;
                                display: inline-block;
                                font-size: 14px;
                                font-weight: bold;
                                height: auto;
                                outline: none;
                                text-decoration: none;
                                text-transform: capitalize;
                                vertical-align: middle;
                                margin-right: 10px;
                                max-width: 100%;
                                width: 100%;
                              "
                              border="0"
                              width="100%"
                              class="CToWUd"
                              data-bit="iit"
                            />
                            <p>
                              Planète Loto Live est un site de CARTALOTO <br /><a
                                href="http://www.cartaloto.net"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=http://www.cartaloto.net&amp;source=gmail&amp;ust=1705142608199000&amp;usg=AOvVaw0GKXX-LjJqVMZglScNdbIl"
                                >www.cartaloto.net</a
                              >
                            </p>
                          </td>
                          <td
                            valign="middle"
                            style="
                              padding: 0;
                              border-radius: 6px;
                              text-align: center;
                              width: 50%;
                            "
                            align="center"
                            width="50%"
                          >
                            <img
                              src="https://ci3.googleusercontent.com/meips/ADKq_NYx-wrCcfQtHOGdV9LPuySVgyRH7QxqKjTD1Zy8FusWQCUoS4gux9Sfby1EdQGmhXWj4zwncMpt6xH3VwullYBUbHuDpDdWFzvvdoRPs-o703WjngWe000Z9_X-oZ3ytslnJk7PXLALc2buasBXzBCe=s0-d-e1-ft#https://www.planete-lotolive.fr/wp-content/themes/dlpro-loto-live/images/logo-occitanie.png"
                              alt="Planète Loto Live"
                              style="
                                border: none;
                                display: inline-block;
                                font-size: 14px;
                                font-weight: bold;
                                height: auto;
                                outline: none;
                                text-decoration: none;
                                text-transform: capitalize;
                                vertical-align: middle;
                                margin-right: 10px;
                                max-width: 100%;
                              "
                              border="0"
                              class="CToWUd"
                              data-bit="iit"
                            />
                            <p style="margin-top: 40px">
                              Platforme subventionnée par la région <br />Occitanie
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        </tbody>
      FIN;



        echo $html2;

    ?>


</body>
</html>