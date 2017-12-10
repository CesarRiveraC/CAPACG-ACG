$(function () {
    $('.detalleColaborador').click(function (e) {
        let id = $(this).attr('data-colaborador');
        let url = `/usuarios/${id}`;

        $.get(url, function (result) {
            $('#lblname').text(result.colaborador.user.name);
            $('#lblApellido').text(result.colaborador.user.Apellido);
            $('#lblemail').text(result.colaborador.user.email);
            $('#lblRol').text(result.rol.Rol);
            $('#lblEstado').text(result.colaborador.user.Estado);
            $('#lblCedula').text(result.colaborador.Cedula);
            $('#lblPuestoDeTrabajo').text(result.colaborador.PuestoDeTrabajo);
            $('#lblLugarDeTrabajo').text(result.colaborador.LugarDeTrabajo);
            $('#lblTelefono').text(result.colaborador.Telefono);
          //  $('#lblEstadoColaborador').text(result.colaborador.Estado);
        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#detalleColaborador').modal();
    });
});

$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/usuarios/${id}/change`;

        $.get(url, function (result) {
            if (result.colaborador.Estado == 0) {
                $('#titleModal').text("Restaurar");
                $('#bodyModal').text("¿Desea restaurar nuevamente este usuario y concederle permisos en el sistema?");
                $('#btnOption').text("Restaurar");
            } else {
                $('#titleModal').text("Eliminar");
                $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
                $('#btnOption').text("Eliminar");
            }
            $('#role-form').attr('action', '/usuarios/' + result.colaborador.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });

        setTimeout(function () {
            $('#Estado').modal();
        }, 880);
    });
});


$(function () {

    var checkbox = $("#setNewPassword");
    var hidden = $("#setPassword");


    hidden.hide();

    checkbox.change(function () {

        if (checkbox.is(':checked')) {
            hidden.slideDown(500);

        } else {

            hidden.slideUp(500);

        }
    });
});