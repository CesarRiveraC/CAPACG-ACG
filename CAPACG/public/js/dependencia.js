$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');

        let url = `/dependencias/${id}/change`;

        $.get(url, function (result) {

            $('#role-form').attr('action', '/dependencias/' + result.dependencia.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });

        $('#Estado').modal();
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