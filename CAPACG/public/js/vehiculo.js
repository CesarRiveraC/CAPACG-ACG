$(function(){
    $('.estado').click(function(e){
       
       let id = $(this).attr('data-estado');
       let url = `/vehiculos/${id}/change`;

       $.get(url, function (result) {
           $('#Placa').text(result.vehiculo.inmueble.activo.Placa);
           $('#role-form').attr('action','/vehiculos/'+result.vehiculo.id+'/updatestate');
                   
       }).fail(function () {
           alert('algo salio mal');
       });

        $('#Estado').modal();
    });
});

$(function (){
    $('.detalleVehiculo').click(function (e){
        let id = $(this).attr('data-vehiculo');
        let url = `/vehiculos/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.vehiculo.inmueble.activo.Placa);
            $('#lblDescripcion').text(result.vehiculo.inmueble.activo.Descripcion);
            $('#lblPrograma').text(result.vehiculo.inmueble.activo.Programa);
            $('#lblSubPrograma').text(result.vehiculo.inmueble.activo.SubPrograma);
            $('#lblColor').text(result.vehiculo.inmueble.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.vehiculo.inmueble.activo.Foto));
            $('#lblSerie').text(result.vehiculo.inmueble.Serie);
            $('#lblDependencia').text(result.vehiculo.inmueble.Dependencia);
            $('#lblEstadoUtilizacion').text(result.vehiculo.inmueble.EstadoUtilizacion);
            $('#lblEstadoFisico').text(result.vehiculo.inmueble.EstadoFisico);
            $('#lblEstadoActivo').text(result.vehiculo.inmueble.EstadoActivo);
            $('#lblPlaca1').text(result.vehiculo.Placa);
            
        }).fail(function () {
            alert('algo salio mal');
        });
        $('#DetalleVehiculo').modal();
    });
});


$(function(){
    $('.filtarDependencia').click(function (e) {
        console.log(e);                        
        
                $.get('/dependencias/create/',function(data){
        
                    $('#DependenciaFiltrar').empty();
        
                    $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");
                     var cont = 0;  
                     $.each(data, function(index, element){
                        
                        cont = element.length;  
                    });                                      
                  
                    for (var i = 0, l = cont; i< l; i++){
                        
                        $('#DependenciaFiltrar').append('<option value="'+data.dependencias[i].id+'">'+data.dependencias[i].Dependencia+'</option>');                       
                    }
                   
                });
        
        
               
      });
});

$(function(){
    $('.filtrarTipo').click(function (e) {
        console.log(e);                        
        
                $.get('/tipos/create/',function(data){
        
                    $('#TipoFiltrar').empty();
        
                    $('#TipoFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione un Tipo</option>");
        
                     var cont = 0;  
                     $.each(data, function(index, element){
                        
                        cont = element.length;             
                    });                                      
                  
                    for (var i = 0, l = cont; i< l; i++){
                        
                        $('#TipoFiltrar').append('<option value="'+data.tipos[i].id+'">'+data.tipos[i].Tipo+'</option>');                       
                    }
                   
                });
        
        
               
      });
});