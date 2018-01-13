$(function () {
    $('.estado').click(function (e) {

        let id = $(this).attr('data-estado');
        let url = `/inmuebles/${id}/change`;

        $.get(url, function (result) {
            if (result.inmueble.activo.Estado == 0) {
                $('#titleModal').text("Restaurar");
                $('#bodyModal').text("¿Desea restaurar nuevamente este inmueble?");
                $('#btnOption').text("Restaurar");
            } else {
                $('#titleModal').text("Eliminar");
                $('#bodyModal').text("¿Está seguro de eliminar el siguiente registro?");
                $('#btnOption').text("Eliminar");
            }
            $('#role-form').attr('action', '/inmuebles/' + result.inmueble.id + '/updatestate');

        }).fail(function () {
            alert('¡Algo salio mal!');
        });

        setTimeout(function () {
            $('#Estado').modal();
        }, 880);
    });
});

 $(function () {
     $('.detalleInmueble').click(function (e) {
         let id = $(this).attr('data-inmueble');
         let url = `/inmuebles/${id}`;

         $.get(url, function (result) {
             $('#lblPlaca').text(result.inmueble.activo.Placa);
             $('#lblDescripcion').text(result.inmueble.activo.Descripcion);
             $('#lblSector').text(result.inmueble.activo.sector.Sector);
             $('#lblTipoActivo').text(result.inmueble.activo.tipo_id);
             $('#lblPrograma').text(result.inmueble.activo.Programa);
             $('#lblSubPrograma').text(result.inmueble.activo.SubPrograma);
             $('#lblColor').text(result.inmueble.activo.Color);
             $('#lblDependencia').text(result.inmueble.activo.dependencia.Dependencia);
             $('#lblTipoActivo').text(result.inmueble.activo.tipo.Tipo);
             $('#lblFoto').attr('src', "storage/pictures/".concat(result.inmueble.activo.Foto));
             $('#lblSerie').text(result.inmueble.Serie);
             $('#lblModelo').text(result.inmueble.Modelo);
             $('#lblMarca').text(result.inmueble.Marca);
             $('#lblEstadoUtilizacion').text(result.inmueble.EstadoUtilizacion);
             $('#lblEstadoFisico').text(result.inmueble.EstadoFisico);
             $('#lblEstadoActivo').text(result.inmueble.EstadoActivo);
            
             if(result.inmueble.activo.Justificacion=='N/A'){
                $('#DetalleJustificacion').hide();
            
               }else{
                $('#DetalleJustificacion').show();
                $('#lblJustificacion').text(result.inmueble.activo.Justificacion);
              
               }
             if (result.inmueble.activo.colaborador_id != null) {
                $('#lblFuncionario').text(result.inmueble.activo.colaborador.user.name +" " + result.inmueble.activo.colaborador.user.Apellido);
            }
            else{
                $('#lblFuncionario').text("Sin asignar");
            }
             
         }).fail(function () {
             alert('¡Algo salio mal!');
         });
         $('#DetalleInmueble').modal();
     });
 });


 $(function () {
     $('.filtarDependencia').click(function (e) {
         console.log(e);

         $.get('/dependencias/create/', function (data) {

             $('#DependenciaFiltrar').empty();

             $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");

             $('#form-dependencia').attr('action', '/inmuebles/filterDependencia');

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

             $('#form-tipo').attr('action', '/inmuebles/filterTipo');
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

         $('#form-fecha').attr('action', '/inmuebles/filterDate');
     });
 });
 $(function () {
     $('.filtrarSector').click(function (e) {
         console.log(e);

         $.get('/sectores/create/', function (data) {

             $('#SectorFiltrar').empty();

             $('#SectorFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Sector</option>");

             $('#form-sector').attr('action', '/inmuebles/filterSector');

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

        let inmueble_id = $(this).attr('data-inmueble');
        var e = document.getElementById("usuarios");
        var user_id = e.options[e.selectedIndex].value;

        if (user_id != 0) {
            let url = `/inmuebles/${inmueble_id}/${user_id}/searchCollaborators`;

            $.get(url, function (result) {
                if (result.inmueble.activo.colaborador_id != null) {
                   if (result.inmueble.activo.colaborador_id == result.colaborador.id) {
                       $('.bodyModal1').text("");
                       $('.modal-title').text("Ups!");
                       $('.bodyModal2').text("Este activo ya está asignado actualmente a " + result.inmueble.activo.colaborador.user.name + " " + result.inmueble.activo.colaborador.user.Apellido + ".");
                       $('.btnOption').text("Aceptar");
                       $('.btnOption').attr('data-dismiss', 'modal');
                   }else{
                       $('.btnOption').removeAttr('data-dismiss');
                       $('.btnOption').text("Reasignar");                     
                       $('.modal-title').text("¡Cuidado!");
                       $('.bodyModal1').text("El activo esta actualmente asignado a " + result.inmueble.activo.colaborador.user.name + " " + result.inmueble.activo.colaborador.user.Apellido + ".");
                       $('.bodyModal2').text("¿Está seguro de reasignar el activo a " + result.colaborador.user.name + " " + result.colaborador.user.Apellido + "?");
                       $('.form-asignar').attr('action', '/inmuebles/' + result.inmueble.id + '/' + result.colaborador.id + '/asignCollaborator');
                   }   
                }
                 else {
                    $('.btnOption').removeAttr('data-dismiss');
                    $('.modal-title').text("Asignar");
                    $('.bodyModal2').text("¿Está seguro de asignar el activo a " + result.colaborador.user.name + " " + result.colaborador.user.Apellido + "?");
                    $('.btnOption').text("Asignar");
                    $('.form-asignar').attr('action', '/inmuebles/' + result.inmueble.id + '/' + result.colaborador.id + '/asignCollaborator');
                }

            }).fail(function () {
                alert('¡Algo salio mal!');
            });

        } else if (user_id == 0) {
            $('.bodyModal1').text("");
            $('.modal-title').text("¡Cuidado!");
            $('.bodyModal2').text("¡Aun no has seleccionado ningun colaborador!");
            $('.btnOption').text("Aceptar");
            $('.btnOption').attr('data-dismiss', 'modal');
        };
        setTimeout(function () {
            $('#asignarColaborador').modal();
        }, 900);
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