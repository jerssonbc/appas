var marcosutilizar;
function agregarMarco(){
	var vmarco=$('#imutilizar').val();

	if(vmarco>0){
		var vtmarco=$("#idtipom").val();
	
		var vtextom=$('#imutilizar option:selected').text();
		var cod=""+vtmarco+vmarco;

		var flag=0;

		$.each(marcosutilizar,function(key,item){
			if(item["codigo"]==cod){
				flag=item["codigo"];
			}
		});
		if(flag==0){
			marcosutilizar.push({codigo:cod,tp:vtmarco,marco:vmarco});
			$("#mautilizar").append('<option value="'+cod+'" >'+vtextom+'</option>');
		}else{
			alert("El marco ya ha sido seleccionado");
		}
		
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
	marcosutilizar=new Array();
	$('#nuevo_cuestionarioc').each (function(){
  		this.reset();
	});
	$("#mautilizar").html("");
	$("#imutilizar").html("");
	marcosutilizar=new Array();
	
	$('#nuevapcumplimiento').modal('show');
	

}
//funcion para grabar un nuevo custionario de cumplimiento
$('#nuevo_cuestionarioc').submit(function(event){
	event.preventDefault();
	var vtitulo=$("input[name=tituloc]").val();
	var voespecifico=$("#idoespecifico").val();
	
	var vpentrevistar=$("#ipentrevistar").val();

	var vfechai= cambiarFormato($("input[name=fechai]").val());
	var vfechaf=cambiarFormato($("input[name=fechaf]").val());

	var tam=marcosutilizar.length;

	if(tam>0){
		$.post('registrarCCumplimiento',{tituloc:vtitulo,
				oespecifico:voespecifico,
				mutilizar:marcosutilizar,pentrevistar:vpentrevistar,
				fechai:vfechai,fechaf:vfechaf
			}).done(function(data){	
				if(data['error']=='0'){
					alert("Registro exitoso!!!");
					$('#nuevapcumplimiento').modal('hide');
					
					$("#datacuestionarios").html(data["dcuestionarios"]);
				}else{
					
					alert("ERrro"+data);
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});
		}else{
			alert("Seleccione almenos un marco utilizado.");
		}

	
});

//cambiar formato de fecha
function cambiarFormato(fecha){
	//01/07/2015
	var newfecha=fecha.substring(6)+'-'+fecha.substring(3,5)+'-'+fecha.substring(0,2);
	return newfecha;
}

function limpiarCampoPregunta(){
	$("#preguntac").val('');
	$("#preguntac").focus();

}

function openAgregarPreguntaCumplimiento(idc){

	$("#datapreguntacumpl").html("");
	
	$.post('listarPreguntaCumpl',{
				
				idcuestionario:idc
			}).done(function(data){	

					$("#datapreguntacumpl").html(data["dpreguntas"]);
					
			}).fail(function(data){
				alert("Hubo error"+data);
			});

	$("#id_cuestionario").val(idc);

	$("#datacuestionarios tr").click(function(){
		var titlecc=$(this).find("td").eq(1).html();
		$('h4#titulo_nuevopc').text(titlecc);
	});

	$("#pcumplimiento").modal("show");

}

//Listar Preguntas
function listarPreguntasCumplimiento(idc){
	$.post('listarPreguntaCumpl',{	
			idcuestionario:idc
		}).done(function(data){	
					$("#listapreguntacumpl").html(data["dpreguntas"]);
					
		}).fail(function(data){
				alert("Hubo error"+data);
	});
	$("#id_cuestionariolista").val(idc);
	$("#datacuestionarios tr").click(function(){
		var titlecc=$(this).find("td").eq(1).html();
		$('h4#titulo_pc').text(titlecc);
	});

	

	$("#listapcumplimiento").modal("show");

}

//funcion para grabar un pregunta cumplimiento 
$('#nueva_preguntac').submit(function(event){
	event.preventDefault();
	var vpregunta=$("#preguntac").val();
	var vidcuestionarioc=$("#id_cuestionario").val();

	$.post('registrarPreguntaCumpl',{
				preguntac:vpregunta,
				idcuestionario:vidcuestionarioc
			}).done(function(data){	
				if(data['error']=='0'){
					alert("Registro exitoso!!!");
					
					$("#datapreguntacumpl").html(data["dpreguntas"]);
					$("#preguntac").val('');
					$("#preguntac").focus();


				}else{

					alert(data['edata']);
					// $('#newPlan').modal('hide');
					// $("#mdialog" ).html(data['edata']);
					// $("#mdialog").dialog( "open" );		
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});
});


//funcnion para registrar respuesta de pregunta 

function guardarRespuesta(idp, icc){
	//alert('id pregutna'+idp+'---'+'id cuestion'+icc);
	//alert("Valor "+$('input:radio[name=opc'+idp+icc+']:checked').val());
	var vrespuesta=$('input:radio[name=opc'+idp+icc+']:checked').val();

	//$("#mensajerespuesta").css("display", "block");

	$.post('registrarRespuestaCumpl',{
				respuestac:vrespuesta,
				idpregunta:idp,
				idcuestionario:icc

			}).done(function(data){	
				if(data['mrespuesta']=='OK'){
					$('#mensajerespuesta').fadeIn(1000);
					setTimeout(function(){
							$('#mensajerespuesta').fadeOut('slow');

					},2000);
					
				}else{	
					alert("hubao error");
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});

}

$(document).ready(function() {

});
//funcion para registrar observación de pregunta
function detectarCampoObservacion(idp, idcc){
	//alert('estoy aca ');
	$('#obs'+idp+idcc).blur(function(){
		//alert($(this).val());
		guardarObservacion(idp,idcc,$(this).val());
	});

}
function guardarObservacion(idp,idcc,obser){
	$.post('registrarObservacionCumpl',{
				observacionc:obser,
				idpregunta:idp,
				idcuestionario:idcc

			}).done(function(data){	
				if(data['mrespuesta']=='OK'){
					$('#mensajerespuesta').fadeIn(1000);
					setTimeout(function(){
							$('#mensajerespuesta').fadeOut('slow');

					},1000);
					
				}else{	
					alert("hubao error");
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});

}
