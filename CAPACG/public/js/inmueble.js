 $(function(){
     $('.estado').click(function(e){
       
        let id = $(this).attr('data-estado');
        let url = `/inmuebles/${id}/change`;

        $.get(url, function (result) {
            $('#Placa').text(result.inmueble.activo.Placa);
            $('#role-form').attr('action','/inmuebles/'+result.inmueble.id+'/updatestate');
                    
        }).fail(function () {
            alert('¡Algo salio mal!');
        });

         $('#Estado').modal();
     });
 });

$(function (){
    $('.detalleInmueble').click(function (e){
        let id = $(this).attr('data-inmueble');
        let url = `/inmuebles/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.inmueble.activo.Placa);
            $('#lblDescripcion').text(result.inmueble.activo.Descripcion);
            $('#lblPrograma').text(result.inmueble.activo.Programa);
            $('#lblSubPrograma').text(result.inmueble.activo.SubPrograma);
            $('#lblColor').text(result.inmueble.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.inmueble.activo.Foto));
            $('#lblSerie').text(result.inmueble.Serie);
            //$('#lblDependencia').text(result.inmueble.activo.dependencia.Dependencia);-->
            $('#lblModelo').text(result.inmueble.Modelo);
            $('#lblMarca').text(result.inmueble.Marca);
            $('#lblEstadoUtilizacion').text(result.inmueble.EstadoUtilizacion);
            $('#lblEstadoFisico').text(result.inmueble.EstadoFisico);
            $('#lblEstadoActivo').text(result.inmueble.EstadoActivo);
        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#DetalleInmueble').modal();
    });
});

