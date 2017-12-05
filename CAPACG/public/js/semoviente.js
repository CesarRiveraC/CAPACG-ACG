// $(function(){
//     $('.detalleInfraestructura').click(function(e){
//         $('#DetalleInfraestructura').modal();
//     });
// });

$(function(){
    $('.estado').click(function(e){
       
       let id = $(this).attr('data-estado');
       let url = `/semovientes/${id}/change`;

       $.get(url, function (result) {
           $('#Placa').text(result.semoviente.activo.Placa);
           $('#role-form').attr('action','/semovientes/'+result.semoviente.id+'/updatestate');
                   
       }).fail(function () {
           alert('algo salio mal');
       });

        $('#Estado').modal();
    });
});

$(function (){
    $('.detalleSemoviente').click(function (e){
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
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.semoviente.activo.Foto));
            $('#lblRaza').text(result.semoviente.Raza);
            $('#lblEdad').text(result.semoviente.Edad);
            $('#lblPeso').text(result.semoviente.Peso);
            
        }).fail(function () {
            alert('Algo salio mal');
        });
        $('#DetalleSemoviente').modal();
    });
});


$(function(){
    $('.filtarDependencia').click(function (e) {
        
        

        console.log(e);                        
        
                $.get('/dependencias/create/',function(data){
        
                    $('#DependenciaFiltrar').empty();
        
                    $('#DependenciaFiltrar').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");
                    
                    $('#form-dependencia').attr('action','/semovientes/filterDependencia');
                    
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
                   
                    $('#form-tipo').attr('action','/semovientes/filterTipo');
                    
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
$(function(){
    $('.filtrarFecha').click(function(e){
      
        $('#form-fecha').attr('action','/semovientes/filterDate');

    });
});