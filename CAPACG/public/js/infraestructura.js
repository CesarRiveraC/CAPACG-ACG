 $(function(){
     $('.estado').click(function(e){
       
        let id = $(this).attr('data-estado');
        let url = `/infraestructuras/${id}/change`;

        $.get(url, function (result) {
            $('#Placa').text(result.infraestructura.activo.Placa);
            $('#role-form').attr('action','/infraestructuras/'+result.infraestructura.id+'/updatestate');
                    
        }).fail(function () {
            alert('algo salio mal');
        });

         $('#Estado').modal();
     });
 });

$(function (){
    $('.detalleInfraestructura').click(function (e){
        let id = $(this).attr('data-infraestructura');
        let url = `/infraestructuras/${id}`;
        $.get(url, function (result) {
            $('#lblPlaca').text(result.infraestructura.activo.Placa);
            $('#lblDescripcion').text(result.infraestructura.activo.Descripcion);
            $('#lblPrograma').text(result.infraestructura.activo.Programa);
            $('#lblSubPrograma').text(result.infraestructura.activo.SubPrograma);
            $('#lblDependencia').text(result.infraestructura.activo.dependencia.Dependencia);
            $('#lblTipoActivo').text(result.infraestructura.activo.tipo.Tipo);
            $('#lblColor').text(result.infraestructura.activo.Color);
            $('#lblFoto').attr('src',"storage/pictures/".concat(result.infraestructura.activo.Foto));
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

$(function(){
    $('.crear').click(function (e) {
        
        alert('que ha pasao');

        console.log(e);                        
        
                $.get('/dependencias/create/',function(data){
        
                    // $('#slt-cursos').empty();
        
                    $('#Dependencia').append("<option value='' disabled selected style='display:none;'>Seleccione una dependencia</option>");
                    alert(data.dependencias[0].Dependencia);
                     var cont = 0;
                     var model = $('#slt-cursos');
                     model.empty();
                    
                     $.each(data, function(index, element){
                         console.log(element);
                         cont = element.length;
                         console.log(cont);
                        
                     });
                    // alert(cont);
                    for (var i = 0, l = cont; i< l; i++){
                        //console.log(item);
                        $('#Dependencia').append('<option value="'+data.dependencias[i].id+'">'+data.dependencias[i].Dependencia+'</option>');                       
                    }
                   
                });
        
        
                $.get('/tipos/create/',function(data){
                    
                                // $('#slt-cursos').empty();
                    
                                $('#Tipo').append("<option value='' disabled selected style='display:none;'>Seleccione el tipo de activo</option>");
                                alert(data.tipos[0].Tipo);
                                 var cont = 0;
                                 var model = $('#slt-cursos');
                                 model.empty();
                                
                                 $.each(data, function(index, element){
                                     console.log(element);
                                     cont = element.length;
                                     console.log(cont);
                                    
                                 });
                                // alert(cont);
                                for (var i = 0, l = cont; i< l; i++){
                                    //console.log(item);
                                    $('#Tipo').append('<option value="'+data.tipos[i].id+'">'+data.tipos[i].Tipo+'</option>');                       
                                }
                               
                });                    

      });
});

$(function () {
    $('.estado').click(function (e) {
      $('#Crear').modal();
    });
  });

  $(function (){
    $('.editar').click(function (e){
        let id = $(this).attr('data-editar');
        let url = `/infraestructuras/${id}/edit`;
        $.get(url, function (result) {
            // alert(result.infraestructura.activo.Placa);
            $('#role-form1').attr('action','/infraestructuras/'+result.infraestructura.id);
            $('#input').attr('value',"PUT");
            // $('#exampleModalLabel1').text("Holis");
            $('#Placa1').val(result.infraestructura.activo.Placa);
            $('#Descripcion1').val(result.infraestructura.activo.Descripcion);
            $('#Programa1').val(result.infraestructura.activo.Programa);
            $('#SubPrograma1').val(result.infraestructura.activo.SubPrograma);
            $('#Color1').val(result.infraestructura.activo.Color);
            // $('#Foto').attr('src',"storage/pictures/".concat(result.infraestructura.activo.Foto));
            $('#NumeroFinca1').val(result.infraestructura.NumeroFinca);
            $('#AreaConstruccion1').val(result.infraestructura.AreaConstruccion);
            $('#AreaTerreno1').val(result.infraestructura.AreaTerreno);
            $('#AnoFabricacion1').val(result.infraestructura.AnoFabricacion);
        }).fail(function () {
            alert('algo salio mal');
        });
        $('#Editar').modal();
    });
});
