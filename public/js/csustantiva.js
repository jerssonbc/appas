var marcosutilizar;
function agregarMarco(){
	var vmarco=$('#imutilizar_cs').val();

	if(vmarco>0){
		var vtmarco=$("#idtipom_cs").val();
	
		var vtextom=$('#imutilizar_cs option:selected').text();
		var cod=""+vtmarco+vmarco;

		var flag=0;

		$.each(marcosutilizar,function(key,item){
			if(item["codigo"]==cod){
				flag=item["codigo"];
			}
		});
		if(flag==0){
			marcosutilizar.push({codigo:cod,tp:vtmarco,marco:vmarco});
			$("#mautilizar_cs").append('<option value="'+cod+'" >'+vtextom+'</option>');
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

	var idmarco=$("#mautilizar_cs option:selected").val();
	//alert("idMarco"+idmarco);
	if(idmarco !=undefined){
		$("#mautilizar_cs").find('option[value="'+idmarco+'"]').remove();  

		marcosutilizar = $.grep(marcosutilizar, function(e){ 
	 		 return e.codigo != idmarco; 
	 	 });
	}else{
		alert("Para quitar un marco, seleccionelo");
	}
}

//función para mostra el pop up de registro de cuestionario sustantivo
function openRegCuestSustantivo()
{
	$('#nuevo_cuestionarios').each (function(){
  		this.reset();
	});

	
	$('#nuevapsustantiva').modal('show');
	marcosutilizar=new Array();

}
//funcion para grabar un nuevo custionario de sustantivo
$('#nuevo_cuestionarios').submit(function(event){
	event.preventDefault();

	var vtitulo=$("input[name=titulo_cs]").val();
	var vpregunta=$("input[name=pregunta_cs]").val();
	var voespecifico=$("#idoespecifico_cs").val();
	
	var vresponsable=$("#responsable_cs").val();


	$.post('registrarCSustantivo',{
				titulo_cs:vtitulo,
				oespecifico_cs:voespecifico,
				mutilizar:marcosutilizar,
				responsable:vresponsable,
				pregunta:vpregunta
			}).done(function(data){	
				if(data['error']=='0'){
					alert("Registro exitos");
					$('#nuevapsustantiva').modal('hide');
					// $("#cdialog").dialog( "open" );
					$("#datacsustantivos").html(data["dcuestionarios"]);
				}else{
					// $('#newPlan').modal('hide');
					// $("#mdialog" ).html(data['edata']);
					// $("#mdialog").dialog( "open" );
					alert("ERrro"+data);
				}	
			}).fail(function(data){
				alert("Hubo error"+data);
			});
});

//cambiar formato de fecha
function cambiarFormato(fecha){
	//01/07/2015
	var newfecha=fecha.substring(6)+'-'+fecha.substring(3,5)+'-'+fecha.substring(0,2);
	return newfecha;
}

function limpiarCampoPaso(){
	$("#pasoc").val('');
	$("#pasoc").focus();

}

function openAgregarPasoSustantivo(idc){

	$("#datapasos_sustantivos").html("");
	
	$.post('listarPasoSustantivos',{
				idcuestionario:idc
			}).done(function(data){	

					$("#datapasos_sustantivos").html(data["dpasos"]);
					
			}).fail(function(data){
				alert("Hubo error"+data);
			});

	$("#ids_cuestionario").val(idc);

	$("#datacsustantivos tr").click(function(){
		var titlecs=$(this).find("td").eq(1).html();
		$('h4#titulo_nuevops').text(titlecs);
	});

	$("#psustantivo").modal("show");

}

//Listar Pasos
function listarPasosSuntantivos(idc){
	$.post('listarPasoSustantivos',{	
			idcuestionario:idc
		}).done(function(data){	
					$("#listapasos_sustantivos").html(data["dpasos"]);
					
		}).fail(function(data){
				alert("Hubo error"+data);
	});
	$("#id_cuestionariolista").val(idc);
	$("#datacsustantivos tr").click(function(){
		var titlecc=$(this).find("td").eq(1).html();
		$('h4#titulo_ps').text(titlecc);
	});


	$("#listapsustantivos").modal("show");

}

//funcion para grabar un paso sustantivo 
$('#nueva_pasoc').submit(function(event){
	event.preventDefault();
	var vdescripcion=$("#pasoc").val();
	var vidcuestionarioc=$("#ids_cuestionario").val();

	$.post('registrarPasoSustantivo',{
				descripcion:vdescripcion,
				idcuestionario:vidcuestionarioc
			}).done(function(data){	
				if(data['error']=='0'){
					alert("Registro exitoso");
					$("#datapasos_sustantivos").html(data["dpasos"]);
					limpiarCampoPaso();
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
