/**
 * 
 */
$.calculaDigitoVerificador = function (rut) {
	// type check
	if (!rut || !rut.length || typeof rut !== 'string') {
		return -1;
	}
	// serie numerica
	var secuencia = [2,3,4,5,6,7,2,3];
	var sum = 0;
	//
	for (var i=rut.length - 1; i >=0; i--) {
		var d = rut.charAt(i)
		sum += new Number(d)*secuencia[rut.length - (i + 1)];
	};
	// sum mod 11
	var rest = 11 - (sum % 11);
	// si es 11, retorna 0, sino si es 10 retorna K,
	// en caso contrario retorna el numero
	return rest === 11 ? 0 : rest === 10 ? "K" : rest;
};
function newAjax()
{
        /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
        lo que se puede copiar tal como esta aqui */
        var xmlhttp=false;
        try
        {
                // Creacion del objeto AJAX para navegadores no IE
                xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {
                try
                {
                        // Creacion del objet AJAX para IE
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(E) { xmlhttp=false; }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); }

        return xmlhttp;
}

function trim (myString)
{
return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
}