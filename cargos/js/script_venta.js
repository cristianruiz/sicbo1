
//Valida que se ingrese rut en panel admision paciente
$(document).ready(function(){
  
  var boton_rut;
  
  boton_rut = $('#btnokPac');
  
  boton_rut.on('click', function(){
    
     var valor_input, valor_rut;
    
    valor_input = $('#txtRutNum2');
    valor_rut = valor_input.val();
    
    if(valor_rut === ''){
      alert('Ingrese Rut.');
      $('#txtRutNum2').focus();
      return false;
    }else{
    	return true;
    }
    
  }); 
  
});
//-------------------------------------------------------------------------
function guarda_pac(){
	alert("Paciente fue registrado!");
}


/* input solo numeros*/
function isNumber(evt){
	var charCode = (evt.wich) ? evt.wich : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57)) 
		return false;
	else
		return true;
}
//--------------------------------------------------------------------------
//calcula digito verificador
function checkRut(rut) {
    // Despejar Puntos
    var valor = txtRutNum2.value.replace('.','');

    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
//--------------------------------------------------------------------------------

//*******AJAX BUSQUEDA PACIENTES*********
$(document).ready(function(){
    //getdeails será nuestra función para enviar la solicitud ajax
    var getdetails = function(id){
        return $.getJSON( "../common/dibuja_paciente.php", { "id" : id });
    }
    
    //al hacer click sobre cualquier elemento que tenga el atributo data-user.....
    $('[data-user]').click(function(e){
        //Detenemos el comportamiento normal del evento click sobre el elemento clicado
        e.preventDefault();
        //Mostramos texto de que la solicitud está en curso
        $("#response-container").html("<p>Buscando...</p>");
        //this hace referencia al elemento que ha lanzado el evento click
        //con el método .data('user') obtenemos el valor del atributo data-user de dicho elemento y lo pasamos a la función getdetails definida anteriormente
        getdetails($(this).data('user'))
        .done( function( response ) {
            //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
            if( response.success ) {
                
                var output = "";
                //recorremos cada usuario
                $.each(response.data.users, function( key, value ) {
                    //output += "<h2>Detalles del usuario " + value['ID'] + "</h2>";
                    //recorremos los valores de cada usuario
                    $.each( value, function ( userkey, uservalue) {
                        //output += '<ul>';
                        output += '<p>' + userkey + ': ' + uservalue + '</p>';
                        //output += '</ul>';
                    });
                });
                
                //Actualizamos el HTML del elemento con id="#response-container"
                $("#response-container").html(output);

                var obj = JSON.parse(output);
                $('#txtnomPac').attr('value', obj.output[1].uservalue);
                
                } else {
                //response.success no es true
                $("#response-container").html('' + response.data.message);
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            $("#response-container").html(". " +  textStatus);
        });
    });
});
//---------------------------------------------------------------------------

$(document).ready(function(){
    $('#btnbuscaPac').on("click",function(){
        var valor = $('#txtRutNum3').val();
        var boton = $('#btnbuscaPac');
        boton.data('user', valor);
        resultado.text(boton.data('user'));
    });
});

//---------------------------------------------------------------------------

//-------------Evento al dar boton aceptar en modal medicos-------------------
$(document).ready(function(){
    $('#btnModalOk').on("click",function() {
        var medico = $('#txtNomMed2').val();
        $('#txtNomMed').val(medico);
        $('#myModal').modal('hide');
    }); 
});

//------------------------------------------------------------------------

//------------Evento al dar ENTER sobre txt cantidad de servicios---------
$(document).keyup(function (e) {
    if ($("#txtCantServ").is(":focus") && (e.keyCode == 13)) {
        var cant = $('#txtCantServ').val();

        if (cant > 0) {
            $('#txtCantServ').val('');
                console.log(cant);
                $('#lblcant').text('Cantidad: '+ cant);
                $('#jqxinput').focus();
            }else{
                alert('Ingrese cantidad.');
            }
    }
});

//------------------------------------------------------------------------

//-----------------------------------------------------------------------
$(document).keyup(function (e){
    if ($("#txtnrooa").is(":focus") && (e.keyCode == 13)) {
        var nrocargo = $('#txtnrooa').val();
        $.ajax({
            type: "POST",
            url: '../common/dibuja_cargo.php',
                                                                                
            data: {"nrocargo":nrocargo},

            error: function(){
                alert("error peticion ajax");
            },
            success: function(data){
                //$('#response-container').append(data);
                console.log(data);
                //alert(data);
            }
        });
    };
});
//---------------------------------------------------------------