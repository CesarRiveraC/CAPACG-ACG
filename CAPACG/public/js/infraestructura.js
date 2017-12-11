 $(function () {
     $('.estado').click(function (e) {

         let id = $(this).attr('data-estado');
         let url = `/infraestructuras/${id}/change`;

         $.get(url, function (result) {
            $('#titleModal').text("Eliminar");
            $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
            $('#btnOption').text("Eliminar");
             $('#Placa').text(result.infraestructura.activo.Placa);
             $('#role-form').attr('action', '/infraestructuras/' + result.infraestructura.id + '/updatestate');

         }).fail(function () {
             alert('algo salio mal');
         });
         $('#Estado').modal();
     });
 });

 $(function () {
     $('.detalleInfraestructura').click(function (e) {
         let id = $(this).attr('data-infraestructura');
         let url = `/infraestructuras/${id}`;
         $.get(url, function (result) {
             $('#lblPlaca').text(result.infraestructura.activo.Placa);
             $('#lblDescripcion').text(result.infraestructura.activo.Descripcion);
             $('#lblSector').text(result.infraestructura.activo.sector.Sector);
             $('#lblPrograma').text(result.infraestructura.activo.Programa);
             $('#lblSubPrograma').text(result.infraestructura.activo.SubPrograma);
             $('#lblDependencia').text(result.infraestructura.activo.dependencia.Dependencia);
             $('#lblTipoActivo').text(result.infraestructura.activo.tipo.Tipo);
             $('#lblColor').text(result.infraestructura.activo.Color);
             $('#lblFoto').attr('src', "storage/pictures/".concat(result.infraestructura.activo.Foto));
             $('#lblNumeroFinca').text(result.infraestructura.NumeroFinca);
             $('#lblAreaConstruccion').text(result.infraestructura.AreaConstruccion);
             $('#lblTerreno').text(result.infraestructura.AreaTerreno);
             $('#lblAnoFabricacion').text(result.infraestructura.AnoFabricacion);
         }).fail(function () {
             alert('algo salio mal');
         });
         $('#DetalleInfraestructura').modal();
     });
 });



 $(function () {
     $('.filtarDependencia').click(function (e) {
         console.log(e);

         $.get('/dependencias/create/', function (data) {

             $('#DependenciaFiltrar').empty();

             $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");

             $('#form-dependencia').attr('action', '/infraestructuras/filterDependencia');

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

             $('#form-tipo').attr('action', '/infraestructuras/filterTipo');

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

         $('#form-fecha').attr('action', '/infraestructuras/filterDate');
     });
 });

 $(function () {
     $('.filtrarSector').click(function (e) {
         console.log(e);

         $.get('/sectores/create/', function (data) {

             $('#SectorFiltrar').empty();

             $('#SectorFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Sector</option>");

             $('#form-sector').attr('action', '/infraestructuras/filterSector');

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

         let infraestructura_id = $(this).attr('data-infraestructura');
         var e = document.getElementById("usuarios");
         var user_id = e.options[e.selectedIndex].value;
         let url = `/infraestructuras/${infraestructura_id}/${user_id}/searchCollaborators`;

         $.get(url, function (result) {
             $('#NombreUsuario').text(result.colaborador.user.name);
             $('#form-asignar').attr('action', '/infraestructuras/' + result.infraestructura.id + '/' + result.colaborador.id + '/asignCollaborator');

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