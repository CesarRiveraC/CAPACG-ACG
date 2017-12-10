$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');

        let url = `/tipos/${id}/change`;


        $.get(url, function (result) {

            $('#role-form').attr('action', '/tipos/' + result.tipo.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');

        });

        $('#Estado').modal();
    });
});

$(function () {
    $('.editar').click(function (e) {
        let id = $(this).attr('data-editar');
        let url = `/tipos/${id}/edit`;
        $.get(url, function (result) {

            $('#role-form1').attr('action', '/tipos/' + result.tipo.id);
            $('#input').attr('value', "PUT");

            $('#Tipo1').val(result.tipo.Tipo);

        }).fail(function () {
            alert('algo salio mal');
        });
        $('#Editar').modal();
    });
});