// $(function(){
//     $('.detalleInfraestructura').click(function(e){
//         $('#DetalleInfraestructura').modal();
//     });
// });

$(function (){
    $('.detalleSemoviente').click(function (e){
        let id = $(this).attr('data-semoviente');
        let url = `/semovientes/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.semoviente.activo.Placa);
            $('#lblDescripcion').text(result.semoviente.activo.Descripcion);
            $('#lblPrograma').text(result.semoviente.activo.Programa);
            $('#lblSubPrograma').text(result.semoviente.activo.SubPrograma);
            $('#lblColor').text(result.semoviente.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.semoviente.activo.Foto));
            $('#lblRaza').text(result.semoviente.Raza);
            $('#lblEdad').text(result.semoviente.Edad);
            $('#lblPeso').text(result.semoviente.Peso);
            // $('#lblAnoFabricacion').text(result.semoviente.AnoFabricacion);
        }).fail(function () {
            alert('algo salio mal');
        });
        $('#DetalleSemoviente').modal();
    });
});

