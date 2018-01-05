$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/dependencias/${id}/change`;

        $.get(url, function (result) {
            if (result.dependencia.Estado == 0) {
                $('#titleModal').text("Restaurar");
                $('#bodyModal').text("¿Desea restaurar nuevamente esta dependencia?");
                $('#btnOption').text("Restaurar");
            } else {
                $('#titleModal').text("Eliminar");
                $('#bodyModal').text("¿Está seguro de eliminar esta dependencia?");
                $('#btnOption').text("Eliminar");
            }
            $('#Justificacion').text("");
            $('#txtJustificacion').hide();
            $('#role-form').attr('action', '/dependencias/' + result.dependencia.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });

        setTimeout(function () {
            $('#Estado').modal();
        }, 880);
    });
});

$(function () {
    $('.editar').click(function (e) {
        let id = $(this).attr('data-editar');
        let url = `/dependencias/${id}/edit`;
        $.get(url, function (result) {

            $('#role-form1').attr('action', '/dependencias/' + result.dependencia.id);
            $('#input').attr('value', "PUT");

            $('#Dependencia1').val(result.dependencia.Dependencia);

        }).fail(function () {
            alert('¡Algo ha salido mal!');
        });
        $('#Editar').modal();
    });
});