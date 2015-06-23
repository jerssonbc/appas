

function openEditRol(id){
	$('#edit_rol_id').val(id);
	var rol=$('#spanrol_'+id).text();
	$('#idedirol').val(rol);
	$('#editRolModal').modal('show');

}


$('#edit_rol').submit(function(event){
	event.preventDefault();
	var vrol=$("input[name=erol]").val();

	var idrol=$('#edit_rol_id').val();

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

function openRegAuditor()
{
	$('#add_auditor').each (function(){
  		this.reset();
	});
	$('#registroAuditorModal').modal('show');

}
function openEditAuditor(ape,nom,tel,celu,id_auditor,id_rol){
	$('#edit_auditor').each (function(){
  		this.reset();
	});
	
	$("input[name=idauditor]").val(id_auditor);
	$("input[name=apellidosae]").val(ape);
	$("input[name=nombreae]").val(nom);
	$( "#idrolae" ).val(id_rol);
	$("input[name=dniae]").val($('tr#auditor_'+id_auditor).find("td").eq(2).html());
	$("input[name=carreraae]").val($('tr#auditor_'+id_auditor).find("td").eq(6).html());
	$("input[name=emailae]").val($('tr#auditor_'+id_auditor).find("td").eq(3).html());
	$("input[name=direccionae]").val($('tr#auditor_'+id_auditor).find("td").eq(5).html());
	$("input[name=telefonoae]").val(tel);
	$("input[name=celularae]").val(celu);

	$('#editarAuditorModal').modal('show');
}

$('#edit_auditor').submit(function(event){
	event.preventDefault();
	var idauditor=$("input[name=idauditor]").val();
	var vapellidos=$("input[name=apellidosae]").val();
	var vnombre=$("input[name=nombreae]").val();
	var vrol=$( "#idrolae" ).val();
	var vdni=$("input[name=dniae]").val();
	var vemail=$("input[name=emailae]").val();
	var vtelefono=$("input[name=telefonoae]").val();
	var vcelular=$("input[name=celularae]").val();
	var vcarrera=$("input[name=carreraae]").val();
	var vdireccion=$("input[name=direccionae]").val();

	$.post('editAuditor/'+idauditor,{apellidos:vapellidos,nombres:vnombre,
				rol:vrol,dni:vdni,email:vemail,telefono:vtelefono,
				direccion:vdireccion,celular:vcelular,carrera:vcarrera
			}).done(function(data){	

			$('#editarAuditorModal').modal('hide');

			$('#tbauditores').html(data);
			
		
	});
});

function openEditPersona(id,cargo,apell,nombre){
	$('#edit_Persona').each (function(){
  		this.reset();
	});
	
	$('#edit_persona_id').val(id);

	$("input[name=cargoe]").val(cargo);
	$("input[name=apellidose]").val(apell);
	$("input[name=nombree]").val(nombre);
	

	$('#editPersonaModal').modal('show');
}

$(document).ready(function(){

	$('#idtipom').change(function (){
		var tipom=$('#idtipom option:selected').val();
		$.post('marcodetipo/'+tipom).done(function(data){
			$('#imutilizar').html('');
			$('#imutilizar').append(data);
		});
	});
	
});
$('#edit_Persona').submit(function(event){
	event.preventDefault();
	var idpersona=$("#edit_persona_id").val();
	var vcargo=$("input[name=cargoe]").val();

	var vapellidos=$("input[name=apellidose]").val();
	var vnombre=$("input[name=nombree]").val();
	
	

	$.post('editPersona/'+idpersona,{apellidos:vapellidos,nombre:vnombre,
				cargo:vcargo
			}).done(function(data){	

			$('#editPersonaModal').modal('hide');

			$('#tbpersonas').html(data);
			
		
	});
});


function openRegCuesCumplimiento()
{
	// $('#add_auditor').each (function(){
 //  		this.reset();
	// });
	$('#nuevapcumplimiento').modal('show');

}
function openRegEmpresa()
{
	$('#nueva_empresa').each (function(){
 		this.reset();
	 });
	$('#newEmpresa').modal('show');
}

$('#nueva_empresa').submit(function(event){
	event.preventDefault();
	var vrsocial=$("input[name=rsocial]").val();
	var vgnegocio=$("input[name=gnegocio]").val();
	var vrhistorica=$("#rhistorica").val();

	$.post('registrarEmpresa',{rsocial:vrsocial,gnegocio:vgnegocio,
				rhistorica:vrhistorica
			}).done(function(data){	
				if(data['error']=='0'){
					$('#newEmpresa').modal('hide');
					$("#cdialog").dialog( "open" );
					$("#dataempresas").html(data["dempresas"]);
				}else{
					//alert('Erroes'+data['edata']);
					$('#newEmpresa').modal('hide');
					$("#mdialog" ).html(data['edata']);
					$("#mdialog").dialog( "open" );

					
				}	
			}).fail(function(data){
				alert("Hubo error");
			});
});

function openRegPlan()
{
	$('#nuevo_plan').each (function(){
 		this.reset();
	 });
	$('#newPlan').modal('show');
}

$('#nuevo_plan').submit(function(event){
	event.preventDefault();
	var vtauditoria=$("input[name=tauditoria]").val();
	var vrploblematica=$("#rploblematica").val();
	var vogeneral=$("input[name=ogeneral]").val();
	var valcance=$("#alcance").val();
	var vanegocio=$("#anegocio").val();
	$.post('registrarPlanAuditoria',{tauditoria:vtauditoria,
				rploblematica:vrploblematica,ogeneral:vogeneral,
				alcance:valcance,anegocio:vanegocio
			}).done(function(data){	
				if(data['error']=='0'){
					$('#newPlan').modal('hide');
					$("#cdialog").dialog( "open" );
					$("#dataplanes").html(data["dplanes"]);
				}else{
					$('#newPlan').modal('hide');
					$("#mdialog" ).html(data['edata']);
					$("#mdialog").dialog( "open" );		
				}	
			}).fail(function(data){
				alert("Hubo error");
			});
});