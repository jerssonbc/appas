function openEditRol(id){
	$('#edit_rol_id').val(id);
	var rol=$('#spanrol_'+id).text();
	$('#idedirol').val(rol);
	$('#editRolModal').modal('show');

}
function redireccionEquipo(){
  window.locationf="http://localhost:50/appas/public/perfilEquipo";
} 

$('#edit_rol').submit(function(event){
	event.preventDefault();
	vrol=$("input[name=erol]").val();

	idrol=$('#edit_rol_id').val();

	$.post('editarRol',{rol:vrol,id:idrol
			}).done(function(data){
			if(data=='OK'){
				//$('#registroModal').modal('hide');
				//$('#confirmacionReg').modal('show');
				$("#spanrol_"+idrol).text(vrol);
				$("#spanrp_"+idrol).text(vrol);
				
				$('#editRolModal').modal('hide');
				//window.locationf="http://localhost:50/appas/public/perfilEquipo";
			}else{
				$('.errores').html(data);
			}
		
	});
});