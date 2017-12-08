$(function (){
    $('.detalleColaborador').click(function (e){
        let id = $(this).attr('data-colaborador');
        let url = `/usuarios/${id}`;
        
        $.get(url, function (result) {
            $('#lblname').text(result.colaborador.user.name);
            $('#lblApellido').text(result.colaborador.user.Apellido);
            $('#lblemail').text(result.colaborador.user.email);
            $('#lblRol').text(result.rol.Rol);
            $('#lblEstado').text(result.colaborador.user.Estado);
            $('#lblCedula').text(result.colaborador.Cedula);
            $('#lblPuestoDeTrabajo').text(result.colaborador.PuestoDeTrabajo);
            $('#lblLugarDeTrabajo').text(result.colaborador.LugarDeTrabajo);
            $('#lblTelefono').text(result.colaborador.Telefono);
            $('#lblEstadoColaborador').text(result.colaborador.Estado);
        }).fail(function () {
            alert('¡Algo salio mal!');
        });
        $('#detalleColaborador').modal();
    });
});

$(function(){
    $('.estado').click(function(e){
      
       let id = $(this).attr('data-estado');
       let url = `/usuarios/${id}/change`;

       $.get(url, function (result) {
           $('#role-form').attr('action','/usuarios/'+result.colaborador.id+'/updatestate');
                   
       }).fail(function () {
           alert('¡Algo salio mal!');
       });

        $('#Estado').modal();
    });
}); 

$(function(){
    $('.restaurar').click(function(e){
      
       let id = $(this).attr('data-estado');
       let url = `/usuarios/${id}/change`;

       $.get(url, function (result) {
         //  $('#Nombre').text(result.colaborador.user.name);
           $('#role-form').attr('action','/usuarios/'+result.colaborador.id+'/updatestate');
                   
       }).fail(function () {
           alert('¡Algo salio mal!');
       });

        $('#Restaurar').modal();
    });
}); 

