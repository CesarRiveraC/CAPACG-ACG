 $(function(){
     $('.estado').click(function(e){
       
        let id = $(this).attr('data-estado');
        let url = `/inmuebles/${id}/change`;

        $.get(url, function (result) {
            $('#Placa').text(result.inmueble.activo.Placa);
            $('#role-form').attr('action','/inmuebles/'+result.inmueble.id+'/updatestate');
                    
        }).fail(function () {
            alert('¡Algo salio mal!');
        });

         $('#Estado').modal();
     });
 });

$(function (){
    $('.detalleInmueble').click(function (e){
        let id = $(this).attr('data-inmueble');
        let url = `/inmuebles/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.inmueble.activo.Placa);
            $('#lblDescripcion').text(result.inmueble.activo.Descripcion);
            $('#lblTipoActivo').text(result.inmueble.activo.TipoActivo)
            $('#lblPrograma').text(result.inmueble.activo.Programa);
            $('#lblSubPrograma').text(result.inmueble.activo.SubPrograma);
            $('#lblColor').text(result.inmueble.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.inmueble.activo.Foto));
            $('#lblSerie').text(result.inmueble.Serie);
            $('#lblDependencia').text(result.inmueble.activo.dependencia.Dependencia);
            $('#lblModelo').text(result.inmueble.Modelo);
            $('#lblMarca').text(result.inmueble.Marca);
            $('#lblEstadoUtilizacion').text(result.inmueble.EstadoUtilizacion);
            $('#lblEstadoFisico').text(result.inmueble.EstadoFisico);
            $('#lblEstadoActivo').text(result.inmueble.EstadoActivo);
        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#DetalleInmueble').modal();
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

