$(function (){
    $('.detalleColaborador').click(function (e){
        let id = $(this).attr('data-colaborador');
        let url = `/usuarios/${id}`;
        $.get(url, function (result) {
            $('#lblname').text(result.colaborador.user.name);
            $('#lblApellido').text(result.colaborador.user.Apellido);
            $('#lblemail').text(result.colaborador.user.email);
            $('#lblRol').text(result.colaborador.user.Rol);
            $('#lblEstado').text(result.colaborador.user.Estado);
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

$(function(){
    $('.estado').click(function(e){
      
       let id = $(this).attr('data-estado');
       let url = `/usuarios/${id}/change`;

       $.get(url, function (result) {
         //  $('#Nombre').text(result.colaborador.user.name);
           $('#role-form').attr('action','/usuarios/'+result.colaborador.id+'/updatestate');
                   
       }).fail(function () {
           alert('¡Algo salio mal!');
       });

        $('#Estado').modal();
    });
});

