$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/vehiculos/${id}/change`;

        $.get(url, function (result) {
            $('#titleModal').text("Eliminar");
            $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
            $('#btnOption').text("Eliminar");
            $('#Placa').text(result.vehiculo.inmueble.activo.Placa);
            $('#role-form').attr('action', '/vehiculos/' + result.vehiculo.id + '/updatestate');

        }).fail(function () {
            alert('algo salio mal');
        });

        $('#Estado').modal();
    });
});

$(function () {
    $('.detalleVehiculo').click(function (e) {
        let id = $(this).attr('data-vehiculo');
        let url = `/vehiculos/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.vehiculo.inmueble.activo.Placa);
            $('#lblDescripcion').text(result.vehiculo.inmueble.activo.Descripcion);
            $('#lblSector').text(result.vehiculo.inmueble.activo.sector.Sector);
            $('#lblPrograma').text(result.vehiculo.inmueble.activo.Programa);
            $('#lblSubPrograma').text(result.vehiculo.inmueble.activo.SubPrograma);
            $('#lblColor').text(result.vehiculo.inmueble.activo.Color);
            $('#lblDependencia').text(result.vehiculo.inmueble.activo.dependencia.Dependencia);
            $('#lblTipoActivo').text(result.vehiculo.inmueble.activo.tipo.Tipo);
            $('#lblFoto').attr('src', "storage/pictures/".concat(result.vehiculo.inmueble.activo.Foto));
            $('#lblSerie').text(result.vehiculo.inmueble.Serie);
            $('#lblModelo').text(result.vehiculo.inmueble.Modelo);
            $('#lblMarca').text(result.vehiculo.inmueble.Marca);
            $('#lblDependencia').text(result.vehiculo.inmueble.Dependencia);
            $('#lblEstadoUtilizacion').text(result.vehiculo.inmueble.EstadoUtilizacion);
            $('#lblEstadoFisico').text(result.vehiculo.inmueble.EstadoFisico);
            $('#lblEstadoActivo').text(result.vehiculo.inmueble.EstadoActivo);
            $('#lblPlaca1').text(result.vehiculo.PlacaVehiculo);

        }).fail(function () {
            alert('Algo salio mal');
        });
        $('#DetalleVehiculo').modal();
    });
});

$(function () {
    $('.filtarDependencia').click(function (e) {
        console.log(e);

        $.get('/dependencias/create/', function (data) {

            $('#DependenciaFiltrar').empty();

            $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");

            $('#form-dependencia').attr('action', '/vehiculos/filterDependencia');
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

            $('#form-tipo').attr('action', '/vehiculos/filterTipo');
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

        $('#form-fecha').attr('action', '/vehiculos/filterDate');
    });
});
$(function () {
    $('.filtrarSector').click(function (e) {
        console.log(e);

        $.get('/sectores/create/', function (data) {

            $('#SectorFiltrar').empty();

            $('#SectorFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Sector</option>");

            $('#form-sector').attr('action', '/vehiculos/filterSector');

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

        let vehiculo_id = $(this).attr('data-vehiculo');
        var e = document.getElementById("usuarios");
        var user_id = e.options[e.selectedIndex].value;
        let url = `/vehiculos/${vehiculo_id}/${user_id}/searchCollaborators`;

        $.get(url, function (result) {
            $('#NombreUsuario').text(result.colaborador.user.name);
            $('#form-asignar').attr('action', '/vehiculos/' + result.vehiculo.id + '/' + result.colaborador.id + '/asignCollaborator');

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