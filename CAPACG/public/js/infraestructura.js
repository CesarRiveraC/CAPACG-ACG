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
    $('.crear').click(function(e){
      
       let id = $(this).attr('data-crear');
       let url = `/infraestructuras/create`;

       $.get(url, function (result) {
        //    $('#Placa').text(result.infraestructura.activo.Placa);
           $('#role-form').attr('action','/infraestructuras/');
                   
       }).fail(function () {
           alert('algo salio mal');
       });

        $('#Crear').modal();
    });
});

$(function () {
    $('.estado').click(function (e) {
      $('#Crear').modal();
    });
  });

