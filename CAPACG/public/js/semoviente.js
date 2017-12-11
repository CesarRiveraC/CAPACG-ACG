$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/semovientes/${id}/change`;

        $.get(url, function (result) {
            $('#titleModal').text("Eliminar");
            $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
            $('#btnOption').text("Eliminar");
            $('#Placa').text(result.semoviente.activo.Placa);
            $('#role-form').attr('action', '/semovientes/' + result.semoviente.id + '/updatestate');

        }).fail(function () {
            alert('algo salio mal');
        });

        $('#Estado').modal();
    });
});

$(function () {
    $('.detalleSemoviente').click(function (e) {
        let id = $(this).attr('data-semoviente');
        let url = `/semovientes/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.semoviente.activo.Placa);
            $('#lblDescripcion').text(result.semoviente.activo.Descripcion);
            $('#lblSector').text(result.semoviente.activo.sector.Sector);
            $('#lblPrograma').text(result.semoviente.activo.Programa);
            $('#lblSubPrograma').text(result.semoviente.activo.SubPrograma);
            $('#lblColor').text(result.semoviente.activo.Color);
            $('#lblDependencia').text(result.semoviente.activo.dependencia.Dependencia);
            $('#lblTipoActivo').text(result.semoviente.activo.tipo.Tipo);
            $('#lblFoto').attr('src', "storage/pictures/".concat(result.semoviente.activo.Foto));
            $('#lblRaza').text(result.semoviente.Raza);
            $('#lblEdad').text(result.semoviente.Edad);
            $('#lblPeso').text(result.semoviente.Peso);

        }).fail(function () {
            alert('Algo salio mal');
        });
        $('#DetalleSemoviente').modal();
    });
});

$(function () {
    $('.filtarDependencia').click(function (e) {
        console.log(e);

        $.get('/dependencias/create/', function (data) {

            $('#DependenciaFiltrar').empty();

            $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");

            $('#form-dependencia').attr('action', '/semovientes/filterDependencia');

            var cont = 0;
            $.each(data, function (index, element) {

                cont = element.length;
            });

            for (var i = 0, l = cont; i < l; i++) {

                $('#DependenciaFiltrar').append('<option value="' + data.dependencias[i].id + '">' + data.dependencias[i].Dependencia + '</option>');
            }
        });
    });
});

$(function () {
    $('.filtrarTipo').click(function (e) {
        console.log(e);

        $.get('/tipos/create/', function (data) {

            $('#TipoFiltrar').empty();

            $('#TipoFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Tipo</option>");

            $('#form-tipo').attr('action', '/semovientes/filterTipo');
            var cont = 0;
            $.each(data, function (index, element) {

                cont = element.length;
            });

            for (var i = 0, l = cont; i < l; i++) {

                $('#TipoFiltrar').append('<option value="' + data.tipos[i].id + '">' + data.tipos[i].Tipo + '</option>');
            }
        });
    });
});
$(function () {
    $('.filtrarFecha').click(function (e) {

        $('#form-fecha').attr('action', '/semovientes/filterDate');
    });
});
$(function () {
    $('.filtrarSector').click(function (e) {
        console.log(e);

        $.get('/sectores/create/', function (data) {

            $('#SectorFiltrar').empty();

            $('#SectorFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Sector</option>");

            $('#form-sector').attr('action', '/semovientes/filterSector');

            var cont = 0;
            $.each(data, function (index, element) {

                cont = element.length;
            });

            for (var i = 0, l = cont; i < l; i++) {

                $('#SectorFiltrar').append('<option value="' + data.sectores[i].id + '">' + data.sectores[i].Sector + '</option>');
            }
        });
    });
});

$('#usuarios').select({});

$(function () {
    $('.asignarColaborador').click(function (e) {

        let semoviente_id = $(this).attr('data-semoviente');
        var e = document.getElementById("usuarios");
        var user_id = e.options[e.selectedIndex].value;
        let url = `/semovientes/${semoviente_id}/${user_id}/searchCollaborators`;

        $.get(url, function (result) {
            $('#NombreUsuario').text(result.colaborador.user.name);
            $('#form-asignar').attr('action', '/semovientes/' + result.semoviente.id + '/' + result.colaborador.id + '/asignCollaborator');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });

        $('#asignarColaborador').modal();
    });
});

$(function () {

    var checkbox = $("#checkOption");
    var hidden = $("#formUsuarios");

    hidden.hide();

    checkbox.change(function () {

        if (checkbox.is(':checked')) {
            hidden.show(500);
            $('.asignarColaborador').each(function () {
                $(this).show();
            });

        } else {

            hidden.hide(500);
            $('.asignarColaborador').each(function () {
                $(this).hide();
            });
        }
    });
});