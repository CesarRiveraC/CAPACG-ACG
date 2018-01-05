$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/sectores/${id}/change`;

        $.get(url, function (result) {
            if (result.sector.Estado == 0) {
                $('#titleModal').text("Restaurar");
                $('#bodyModal').text("¿Desea restaurar nuevamente este registro?");
                $('#btnOption').text("Restaurar");
               
            } else {
                $('#titleModal').text("Eliminar");
                $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
                $('#btnOption').text("Eliminar");
                       
            }

            $('#Justificacion').text("");
            $('#txtJustificacion').hide();
            $('#role-form').attr('action', '/sectores/' + result.sector.id + '/updatestate');

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
        let url = `/sectores/${id}/edit`;
        $.get(url, function (result) {

            $('#role-form1').attr('action', '/sectores/' + result.sector.id);
            $('#input').attr('value', "PUT");

            $('#Sector1').val(result.sector.Sector);

        }).fail(function () {
            alert('algo salio mal');
        });
        $('#Editar').modal();
    });
});