function envio_acceso(){
	$('#op').val('Entrar');
	$('#formulario').submit();
}
// $('#inicio').click(function(){
// 	alert(3);
// });
function abrirVista(url,id){ 
	$('#'+id+'').ready(function(event) {
		 $("#capa").load(url);
	});
}
function salir(){
	$('#op').val('Salir');
	$('#formulario').submit();
}
$('a').on('click',function(){
	alert('si');
});
/* script para formularios*/
$(document).ready(function(){
	// $('[data-toggle="tooltip"]').tooltip(); 
	$('#form1').attr('required',true);
	$('.campos_ob').hide();
	$('.campos_ob').css({display:'none'});
	$('#nuevo').click(function(){	
		$('#form1').css({display:'block'});
		$('#form1').css({visibility:'visible'});
	
		$('#conten_tabla').hide();
		$('#nuevo').hide();
		$('#reporte').hide();
		$('.atras').css({display:'block'});
		$('.atras').css({visibility:'visible'});
		$('#conten_tabla').css({display:'none'});
		$('.campos_ob').css({display:'none'});
		$('.campos_ob').show();
	});
	$('.atras').click(function(){
		location.reload();
		$('#conten_tabla').show();
		$('#form1').css({display:'none'});
		$('#form1').css({visibility:'hidden'});
		$('.atras').hide();
		
		$('#nuevo').show();
		$('#reporte').show();
	});
	$('#msj').css({display:'block'});
	$('#msj').css({visibility:'visible'});
	$('.calendario').datepicker();
	$('#nuevo').click(function(){
		validar_form();
	});
});
function modificar(ope,ruta){
	$(document).ready(function(){
		$('#form1').css({display:'block'});
		$('#form1').css({visibility:'visible'});
		$('#conten_tabla').hide();
		$('#nuevo').hide();
		$('#reporte').hide();
		$('.atras').css({display:'block'});
		$('.atras').css({visibility:'visible'});
			

		$('#mod').ready(function(){

			$('#op').val('Consultar');
			$("#idreg").val(ope);
			$('#guardar').val('Modificar');
				
				// opmod;
				
			var url = ruta;// El script a dónde se realizará la petición.

			$.ajax({

				type: "POST",
				url: url,
				data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.

				success: function(data){
					
				 	var datos = eval(data);
				 	var valor = datos.length;
			
				 	for (var i = 0; i <valor; i++) {
				 	    $("#texto"+i).val(datos[i]);
				 	    
				 	    $("#radio"+i).val(datos[i]).prop('checked',true);
				 	   
				 	    $("#select"+i).val(datos[i]).attr('selected','selected');
				 	   
				 	    
				 	 }    
				 	
				}
			});
   			return false; // Evitar ejecutar el submit del formulario.
		})
	});
}			
	
function envio(op,url_control,input){ //FUNCION PARA EL ENVIO AJAX DE OPERACIONES

	var url = url_control; //URL DEL CONTROLADOR
	$('#op').val(op); // VARIABLE CONTROL DE OPERACIONES
	msj  = "Los campos estan vacios"; // MENSAJE
	var c_v = "n";
	
	$('#campovacio').css({display:'none'}); // <P> PARA LOS CAMPOS VACIOS
	// $('#cv').css({display:'none'});
		$("#form1").find(':input').each(function() {
			// La clase que vas a poner a los input que sean requeridos es "requerido" esto no funciona con radio

			//si se cumple la condicion agrego la clase invalido al input que este pasando en ese momento sino se lo quito
			if( $(this).hasClass("requerido") && $(this).val()=="" ){

				
				
				$(this).addClass("invalido");
				$(this).parent().addClass("has-error");

			}else if( $(this).hasClass("requerido") && $(this).val()!="" ){

				$(this).removeClass("invalido");
				// si no quieres que te los pinte verde solo quitale el ".addClass("has-success")" y listo
				$(this).parent().removeClass("has-error").addClass("has-success");
			}

		});
 		
 		// aca pregunto si algun esta invalido eso quite decir que un campo esta vacio por la comparaciomn que hicimos en el find 
		if( $(".requerido").hasClass("invalido") ){
			c_v = "s";
		}else{
			c_v = "n";
		}

		if( c_v == "s" ){

			$('#campovacio').html("Algunos campos requeridos estan vacios").fadeIn();
			// $('#cv').fadeIn();
		}else if( c_v == "n" ){
			$('#campovacio').html("").fadeOut();

			//aca envias el formilario chamo
			/*ENVIO DEL FORMULARIO METODO AJAX*/

			$.ajax({ 

				type: "POST",
				url: url,
				data: $("#formulario").serialize(),

				success: function(data){
					console.log(data);
					var arreglo = eval(data);
					
					for (var i = 0; i < input; i++){ // ciclo for para limpiar los campos 
						if(arreglo=="Registrado con éxito"){
							$('#texto'+i).val("");
							$("#select"+i).prop('selectedIndex', 0);

						}
					}			
					// $(this).parent().removeClass("has-sucess").addClass("");
					$('#alerta_success').css({visibility:'visible'}).fadeIn('slow').fadeOut(2900);
					$('#alerta_success').css({display:'block'});
					$("#msj_alert").html(arreglo[0]);
					
					
				}
			});
   			return false; 
		}
	 	
}
function des_act(op,url_control,idreg,msj){
	var url = url_control; 
	$('#op').val(op);
	$('#idreg').val(idreg);
	if(confirm(''+msj+'')){
	var form = $(this);
		$.ajax({

			type: "POST",
			url: url,
			data: $("#formulario").serialize(),

			success: function(data){
				var arreglo = eval(data);
				//console.log(data);
				location.reload();
				// var atc = $('#act');
				// $('#des').addClass('btn-peq-alerta verde');
				// $('#des').val('Activar');
				// $('i').addClass('fa fa-check');
			}
		});
   	return false; 
	}else{
		return false;
	}
}

	$(document).ready(function() {
		$('#filtro').dataTable();
	});
	function cancelar(text){
		for (var i = 0; i < text; i++){
			$('#texto'+i).val("");
			$("#select"+i).prop('selectedIndex', 0);
			$("#radio"+i).prop('checked', 0);
		}
		
	}

	function validar_form(){
		$('#texto0').attr('required',true);
	}
function envio_reporte(url){
	
	window.open(url,+"?","","");
}
// $(document).ready(function(){ // cargar tootip
    
// });
/* FUNCION PARA VALIDAR SOLO NUMEROS Y SOLO LETRAS (TAMBIEN EXPRESION REGULAR EN PROCESO...)*/
function validar_caja(id,tipo,exp,msj,evt,otro,sp){
    //id: id del input
    //tipo: tipo de input, texto,num,textonum,cedula(para expregulars)
    //exp: patron de la expresion regular
    //msj: msj a mandar
    //evt: event para funciones propias.
    //otro: para comparar cuando sea exp regular
    //sp: id del span para mostrar el msj
     
    $(document).ready(function(){
        var caja = $('#'+id+'').val();
            if(tipo=='num'){ //solo numeros
                if ((event.keyCode < 48) || (event.keyCode > 57)) {
                    event.returnValue = false;
                    
                    $('#'+sp+'').show();
                    $('#'+sp+'').text(''+msj+'').css("color","red");
                }else{
                    $('#'+sp+'').hide();
                 }      
            }else if(tipo=='texto'){ //solo letras
              if((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122)){
                event.returnValue = false;
                    $('#'+sp+'').show();
                    $('#'+sp+'').text(''+msj+'').css("color","red");
                
               }else{
                    $('#'+sp+'').hide();
               }

            }else if(tipo=='textonum'){ //letras y numeros
                tecla = (document.all) ? event.keyCode : event.which; 
                if (tecla==8) return true; // backspace
                if (tecla==32) return true; // espacio
                if (event.ctrlKey && tecla==86) { return true;} //Ctrl v
                if (event.ctrlKey && tecla==67) { return true;} //Ctrl c
                if (event.ctrlKey && tecla==88) { return true;} //Ctrl x
             
                patron = /[A-ZñÑa-z0-9]/; //patron
             
                te = String.fromCharCode(tecla); 
                
                if (!patron.test(te)){
                    
                    $('#'+sp+'').show();
                    $('#'+sp+'').text(''+msj+'').css("color","red");
                    return false;
                }else{
                    $('#'+sp+'').hide();
                }
                
            }else if(tipo==otro){ // expresiones regulares
                var expreg = /^[A-Z]{1,2}\s\d{4}\s([B-D]|[F-H]|[J-N]|[P-T]|[V-Z]){3}$/;
  
                if(!eval(expreg).test(caja)){
                    alert('no');
                }else{
                    return false;
                }
            }
            
        
    });
}