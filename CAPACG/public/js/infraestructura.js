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
    $('#exampleModal').on('shown.bs.modal', function () {
        let id = $(this).attr('data-estado');
        let url = `/infraestructuras/create`;

        $.get(url, function (result) {
            //$('#Placa').text(result.dependencias.Dependencia);
            //$('#role-form').attr('action','/infraestructuras/'+result.infraestructura.id+'/updatestate');
                    
        }).fail(function () {
            alert('algo salio mal');
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
