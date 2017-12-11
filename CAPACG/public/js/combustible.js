$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/combustibles/${id}/change`;

        $.get(url, function (result) {
            $('#titleModal').text("Eliminar");
            $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
            $('#btnOption').text("Eliminar");
            $('#NoVaucher').text(result.combustible.NoVaucher);
            $('#role-form').attr('action', '/combustibles/' + result.combustible.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');

        });

        $('#Estado').modal();
    });
});

$(function () {
    $('.detalleCombustible').click(function (e) {
        let id = $(this).attr('data-combustible');
        let url = `/combustibles/${id}`;
        $.get(url, function (result) {
            $('#lblNoVaucher').text(result.combustible.NoVaucher);
            $('#lblMonto').text(result.combustible.Monto);
            $('#lblNumero').text(result.combustible.Numero);
            $('#lblFecha').text(result.combustible.Fecha);
            $('#lblKilometraje').text(result.combustible.Kilometraje);
            $('#lblLitrosCombustible').text(result.combustible.LitrosCombustible);
            $('#lblFuncionarioQueHizoCompra').text(result.combustible.colaborador.user.name +" " + result.combustible.colaborador.user.Apellido);
            $('#lblDependencia').text(result.combustible.dependencia.Dependencia);
            $('#lblFoto').attr('src', "storage/pictures/".concat(result.combustible.Foto));
            $('#lblCodigoDeAccionDePlanPresupuesto').text(result.combustible.CodigoDeAccionDePlanPresupuesto);
            $('#lblPlaca').text(result.combustible.vehiculo.PlacaVehiculo);
            $('#lblModelo').text(result.combustible.vehiculo.inmueble.Modelo);
            $('#lblMarca').text(result.combustible.vehiculo.inmueble.Marca);
            $('#lblPlacaActivo').text(result.combustible.vehiculo.inmueble.activo.Placa);
            //    $('#lblVehiculo').text('Ver datos Vehículo');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#DetalleCombustible').modal();
    });
});
$(function () {
    $('.filtarDependencia').click(function (e) {
        console.log(e);

        $.get('/dependencias/create/', function (data) {

            $('#DependenciaFiltrar').empty();

            $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");

            $('#form-dependencia').attr('action', '/combustibles/filterDependencia');

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
    $('.filtrarFecha').click(function (e) {

        $('#form-fecha').attr('action', '/combustibles/filterDate');
    });
});
