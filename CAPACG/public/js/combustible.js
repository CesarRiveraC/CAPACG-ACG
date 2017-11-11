$(function(){
    $('.estado').click(function(e){
      
       let id = $(this).attr('data-estado');
       let url = `/combustibles/${id}/change`;

       $.get(url, function (result) {
           $('#NoVaucher').text(result.combustible.NoVaucher);
           $('#role-form').attr('action','/combustibles/'+result.combustible.id+'/updatestate');
                   
       }).fail(function () {
        alert('¡Algo salio mal!');
        
       });

        $('#Estado').modal();
    });
});

$(function (){
   $('.detalleCombustible').click(function (e){
       let id = $(this).attr('data-combustible');
       let url = `/combustibles/${id}`;
       $.get(url, function (result) {
           $('#lblNoVaucher').text(result.combustible.NoVaucher);
           $('#lblMonto').text(result.combustible.Monto);
           $('#lblNumero').text(result.combustible.Numero);
           $('#lblFecha').text(result.combustible.Fecha);
           $('#lblKilometraje').text(result.combustible.Kilometraje);
           $('#lblLitrosCombustible').text(result.combustible.LitrosCombustible);
           $('#lblFuncionarioQueHizoCompra').text(result.combustible.FuncionarioQueHizoCompra);
           $('#lblDependencia').text(result.combustible.Dependencia);
           $('#lblFoto').attr('src',"storage/pictures/".concat(result.combustible.Foto));
           $('#lblCodigoDeAccionDePlanPresupuesto').text(result.combustible.CodigoDeAccionDePlanPresupuesto);
           $('#lblPlaca').text(result.combustible.vehiculo.Placa);
           $('#lblVehiculo').text('Ver datos Vehículo');
           

       }).fail(function () {
        alert('¡Algo salio mal!');
       });
       $('#DetalleCombustible').modal();
   });
});

