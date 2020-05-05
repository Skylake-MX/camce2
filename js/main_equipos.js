$(buscar_equipos());


function buscar_equipos(consulta){
    $.ajax({
        url: '../scripts/buscar_equipos.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })

    .done(function(respuesta){
        $("#datos_equipos").html(respuesta);
    })

    .fail(function(){
        console.log("error");
    })

}

$(document).on('keyup','#caja_busqueda_equipos', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_equipos(valor);
    }
    else{
        buscar_equipos();
    }
});