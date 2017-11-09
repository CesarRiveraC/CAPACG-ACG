

$(function (){
    $('.detalleVehiculo').click(function (e){
        let id = $(this).attr('data-vehiculo');
        let url = `/vehiculos/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.vehiculo.inmueble.activo.Placa);
            $('#lblDescripcion').text(result.vehiculo.inmueble.activo.Descripcion);
            $('#lblPrograma').text(result.vehiculo.inmueble.activo.Programa);
            $('#lblSubPrograma').text(result.vehiculo.inmueble.activo.SubPrograma);
            $('#lblColor').text(result.vehiculo.inmueble.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.vehiculo.inmueble.activo.Foto));
            $('#lblSerie').text(result.vehiculo.inmueble.Serie);
            $('#lblDependencia').text(result.vehiculo.inmueble.Dependencia);
            $('#lblEstadoUtilizacion').text(result.vehiculo.inmueble.EstadoUtilizacion);
            $('#lblEstadoFisico').text(result.vehiculo.inmueble.EstadoFisico);
            $('#lblEstadoActivo').text(result.vehiculo.inmueble.EstadoActivo);
            $('#lblPlaca').text(result.vehiculo.Placa);
        }).fail(function () {
            alert('algo salio mal');
        });
        $('#DetalleVehiculo').modal();
    });
});

