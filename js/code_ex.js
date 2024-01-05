/*
jQuery( document ).ready( function( $ ) {
    $( '#btnStock' ).click( function() {
        alert( 'Attention' );
    } );
} );
*/

jQuery( document ).ready( function( $ ) {
    const $url_ws =
    "https://www.prueba.techsysprogram.com/wp-content/plugins/tech_checkbox/";
    const $url_TechAPI = "http://boulier.techsysprogram.fr/TechAPI";
    const btn01 = $("#btnradio1");
    const btn02 = $("#btnradio2");
    const btn05 = $("#btnStock2");
    const btn06 = $("#btnWoo");
    const var_select_tirage = $('#tech_select_tirage');
    //recupera el valor actual
    //var tech_select_Value = $('#tech_select_tirage').val();

    let var_json_control = "";
    let var_titulo = "";
    
    //aqui lo que hago es mostrar la tabla segun donde este seleccionado mas a delante sera mas inteligente
    Affiche_table(2);

    var_select_tirage.change(function () {
        //console.log("ya llegueeeeeeeeeeeee");
        Affiche_table(2);
    });


    btn06.click( function() {
        alert( 'hola' );
    } );

    // Ajoute un gestionnaire d'événement pour le clic sur le bouton
    btn05.on('click', function() {
        // Change la couleur du bouton en rouge
        btn05.css('background-color', 'red');
    });

    
  // Function to compute the product of p1 and p2
  function Affiche_table(index) {
    //con el selector es importante siempre actualizar sin importar que ya tiene dato
    Mi_IDO = Tirage_actif(1);
    //console.log("me dio =" + Mi_IDO);
    //console.log("index es =" + index);
    switch (index) {
      case 1:
        //console.log("holaaaaaaaaa 111");
        /*
        // window.location = url;
        $.ajax({
          type: "POST",
          url:
            $url_ws + "/ws_table_ventas.php?ido=" + Mi_IDO + "-0-0-0&titre=0",
          async: true,
          success: function (response) {
            // console.log(response);
            $("#tech_id_table").html(response);
            $("#Compra2").html(tech_mostrar(1));
          },
        });
        */
        break;

      case 2:
        //console.log($url_ws + "/ws_table_actif.php?ido=" + Mi_IDO + "-0-0-0&titre=0");
        $.ajax({
            type: "POST",
            url: $url_ws + "/ws/ws_MisPlanches.php?ido=" + Mi_IDO + "-0-0-0&dev=3",
            async: true,
            success: function (response) {
               //console.log(response);
              //$("#tech_id_table").html(response);
              //$("#Compra2").html(tech_mostrar(2));
              var divElement = document.getElementById("Compra2");
              divElement.innerHTML = response;
            },
        });


        $.ajax({
          type: "POST",
          url: $url_ws + "/MisPlanches.php?ido=" + Mi_IDO + "-0-0-0",
          async: true,
          success: function (response) {
             //console.log(response);
            //$("#tech_id_table").html(response);
            //$("#Compra2").html(tech_mostrar(2));
            var divElement = document.getElementById("tech_id_table");
            divElement.innerHTML = response;
          },
        });
        break;

      default:
      // code block
    }
  }
  
  // ici je donne l'id organisateur et id tirage actuel donde me encuentro
  function Tirage_actif(ID_O) {
    //console.log("pase aqui en tirage_actif" + ID_O);
    
    //var selectElement = document.getElementById("tech_select_tirage");
    var cases = $('#tech_select_tirage').val();
    //ID_O= 1 devuelvo los IdOrg - IDtirage
    //console.log(selectElement);

    switch (ID_O) {
      case 1:
        var str_case = cases.split(" ").join("");
        break;
      case 2: //aqui te muestro el id organisateur
        var str_case = cases.split(" ").join("");
        cases = str_case.split("-");
        str_case = cases[0];
        break;
      default:
      // code block
    }
    // var selected = cases[0].find("option:selected");

    //var_titulo = cases[0][cases[0].selectedIndex].text;

    return str_case;

  }

  

  
} );

/*
    function changeBackground() {
        var selectElement = document.getElementById("tech_select_tirage");
        var selectedValue = selectElement.value;
        console.log("lol 12333333333");
        //Affiche_table(2);
        /*
        console.log("lol");
        console.log(selectedValue);
        //$("#tech_id_table").html(selectedValue);
        var divElement = document.getElementById("tech_id_table");
        divElement.innerHTML = selectedValue;
    }
jQuery(document).ready(function($) {
    // Sélectionne le bouton par son ID ou sa classe CSS
    var bouton = $('#btnStock');

    // Ajoute un gestionnaire d'événement pour le clic sur le bouton
    bouton.on('click', function() {
        // Change la couleur du bouton en rouge
        bouton.css('background-color', 'red');
    });

    $("select[name=tech_select_tirage]").change(function () {
        var selectElement = document.getElementById("tech_select_tirage");
        var selectedValue = selectElement.value;
        console.log("funciona");
        $("#tech_id_table").html(selectedValue);

        /*
        if (selectedValue === "fond1") {
        document.body.style.backgroundColor = "red";
        } else if (selectedValue === "fond2") {
        document.body.style.backgroundColor = "blue";
        } else if (selectedValue === "fond3") {
        document.body.style.backgroundColor = "green";
        }
  });
});
  */