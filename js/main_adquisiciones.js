$(buscar_adquisiciones());


function buscar_adquisiciones(consulta){
    $.ajax({
        url: '../scripts/buscar_adquisiciones.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })

    .done(function(respuesta){
        $("#datos_adquisiciones").html(respuesta);
    })

    .fail(function(){
        console.log("error");
    })

}

$(document).on('keyup','#caja_busqueda_adquisiciones', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_adquisiciones(valor);
    }
    else{
        buscar_adquisiciones();
    }
});