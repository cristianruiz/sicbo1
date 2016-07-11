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

