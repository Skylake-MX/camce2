$(buscar_folios());


function buscar_folios(consulta){
    $.ajax({
        url: '../scripts/buscar_folios.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })

    .done(function(respuesta){
        $("#datos_folios").html(respuesta);
    })

    .fail(function(){
        console.log("error");
    })

}

$(document).on('keyup','#caja_busqueda_folios', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_folios(valor);
    }
    else{
        buscar_folios();
    }
});