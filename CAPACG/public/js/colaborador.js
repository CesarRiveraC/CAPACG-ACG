$(function (){
    $('.detalleColaborador').click(function (e){
        let id = $(this).attr('data-colaborador');
        let url = `/usuarios/${id}`;
        $.get(url, function (result) {
            $('#lblname').text(result.colaborador.name);
            $('#lblApellido').text(result.colaborador.Apellido);
            $('#lblemail').text(result.colaborador.email);
            $('#lblRol').text(result.colaborador.Rol);
            $('#lblEstado').text(result.colaborador.Estado);
           // $('#lblFoto').attr('src',"storage/pictures/".concat(result.colaborador.Foto));
            $('#lblCedula').text(result.colaborador.Cedula);
            $('#lblDireccion').text(result.colaborador.Direccion);
            $('#lblPuestoDeTrabajo').text(result.colaborador.PuestoDeTrabajo);
            $('#lblLugarDeTrabajo').text(result.colaborador.LugarDeTrabajo);
            $('#lblTelefono').text(result.colaborador.Telefono);
            $('#lblEstadoColaborador').text(result.colaborador.Estado);
        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#detalleColaborador').modal();
    });
});
