var marcosutilizar=new Array();
function agregarMarco(){
	var vmarco=$('#imutilizar').val();
	//alert(vmarco);
	if(vmarco>0){
		var vtmarco=$("#idtipom").val();
	
		var vtextom=$('#imutilizar option:selected').text();
		var cod=""+vtmarco+vmarco;
		//alert(cod);
		marcosutilizar.push({codigo:cod,tp:vtmarco,marco:vmarco});

		$("#mautilizar").append('<option value="'+cod+'" >'+vtextom+'</option>');
	}else{
		alert("Seleccion un marco");
	}
	
	//alert("tipo "+vtmarco+" Valor marco"+vmarco+" Texto : "+vtextom);

	// $.each(marcosutilizar,function(key,item){
	// 	alert("Codigo: "+item["tp"]+' Marco: '+item["marco"]);
	// });

}

function removeElement(){

	var idmarco=$("#mautilizar option:selected").val();
	//alert("idMarco"+idmarco);
	if(idmarco !=undefined){
		$("#mautilizar").find('option[value="'+idmarco+'"]').remove();  

		marcosutilizar = $.grep(marcosutilizar, function(e){ 
	 		 return e.codigo != idmarco; 
	 	 });
	}else{
		alert("Para quitar un marco, seleccionelo");
	}

	

}


//función para mostra el pop up de registro de cuestionario de cumplimiento
function openRegCuesCumplimiento()
{
	$('#nuevo_cuestionarioc').each (function(){
  		this.reset();
	});
	$('#nuevapcumplimiento').modal('show');
	marcosutilizar=null;

}

//funcion para grabar un nuevo custionario de cumplimiento
$('#nuevo_cuestionarioc').submit(function(event){
	event.preventDefault();
	var vtitulo=$("input[name=tituloc]").val();
	var voespecifico=$("#idoespecifico").val();
	
	var vpentrevistar=$("#ipentrevistar").val();

	var vfechai=$("input[name=fechai]").val();
	var vfechaf=$("input[name=fechaf]").val();

	

	$.post('registrarCCumplimiento',{tituloc:vtitulo,
				oespecifico:voespecifico,
				mutilizar:marcosutilizar,pentrevistar:vpentrevistar,
				fechai:vfechai,fechaf:vfechaf
			}).done(function(data){	
				if(data['error']=='0'){
					alert("Registro exitos");
					$('#nuevapcumplimiento').modal('hide');
					// $("#cdialog").dialog( "open" );
					// $("#dataplanes").html(data["dplanes"]);
				}else{
					// $('#newPlan').modal('hide');
					// $("#mdialog" ).html(data['edata']);
					// $("#mdialog").dialog( "open" );		
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});
});