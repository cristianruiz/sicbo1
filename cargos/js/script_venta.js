$(document).ready(function () {

});

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

/*---------------------Modal Secciones--------------- -------*/


/*-----------------------------------------------------------*/

//------------Evento al dar ENTER sobre txt cantidad de servicios---------
$(document).keyup(function (e) {
    if ($("#txtCantServ").is(":focus") && (e.keyCode == 13)) {
        var cant = $('#txtCantServ').val();

        if (cant > 0) {
            $('#txtCantServ').val('');
            console.log(cant);
            $('#lblcant').text('Cantidad: '+ cant);
            $('#jqxinput').focus();

            var datos = new Array();
            var cod = $('#codpres').text();
            var cod1 = cod.substr(8,15);
            var action = 'p_unit';
            var nrocargo=$('#txtnrooa').val();
            var cod_sec=$('#txtcodsec').val();

            $.ajax({
                type: "GET",
                url: "../common/dibuja_cargo.php",
                data: {codigo: cod1,nrocargo: nrocargo,cod_sec: cod_sec, action: action},

                error: function () {
                    alert('Error al consultar precio!');
                },
                success: function (data) {
                    //data = JSON.parse(data);
                    console.log(data);
                }

            });


            }else{
                alert('Ingrese cantidad.');
            }
    }
});

//------------------------------------------------------------------------

//-----------------BUSCAR NOMBRE DE PACIENTES----------------------------*/
$(document).keyup(function (e) {
    if ($("#txtRutNum3").is(":focus") && (e.keyCode == 13)) {
        var rut = $('#txtRutNum3').val();
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();
        if (rut > 0){
            var action = 'buscapac';

            $.ajax({
                type: "GET",
                url: "../common/dibuja_cargo.php",
                data: {action: action,rut: rut,nrocaro: nrocargo,cod_sec: cod_sec},
                dataType: "json",

                error: function () {
                    $("#response-container").html('Error petición Ajax');
                },
                success: function (data) {
                    if (data.length > 0){
                        $("#response-container").html('Nombre: '+ data[0].apellidopaterno + ' '+ data[0].apellidomaterno + ' '+ data[0].nombre);
                    }else{
                        $("#response-container").html('Rut no encontrado.');
                    }

                }
            });
        }else {
            alert('Ingrese Rut');
        }

    }
});

//------------ Enter sobre text codigo seccion--------------
$(document).keyup(function(e){
    if ($('#txtcodsec').is(":focus") && (e.keyCode == 13)) {
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();
        var codigo = $('#txtcodsec').val();
        var action = "getNombreSec";

        $.ajax({
            type: "GET",
            url: "../common/dibuja_cargo.php",
            data: {codigo: codigo,action: action},

            error: function () {
                alert('Error peticion Ajax al traer nombre de seccion.');
            },
            success: function (data) {
                console.log(data);
                alert('ok');
                $('#txtnrooa').focus();
            }
        });

    }
});


//------------------Buscar cargo--------------------------------
$(document).keyup(function (e){
    if ($("#txtnrooa").is(":focus") && (e.keyCode == 13)) {
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();
        var action="cargo_cabecera";

        $.ajax({
            type: "GET",
            url: "../common/dibuja_cargo.php",
            data: {nrocargo: nrocargo,cod_sec: cod_sec, action: action},

            error: function(){
                alert("error peticion ajax");
            },
            success: function(data){
                //$('#response-container').append(data);
                data = JSON.parse(data);
                if (data.length > 0) {
                    $('#txtnroCta').val(data[0].nroficha);
                    $('#txtRutNum3').val(data[0].rutpaciente);
                    
                }else{
                    data = [];
                    $('#txtnroCta').val('');
                    $('#txtRutNum3').val('');
                    alert('No hay datos.');
                    $('#txtnrooa').focus();
                }
                console.log(data);
            }
        });
    };
});


//------------- DETALLE CARGO--------------------*/
$(document).keyup(function(e){
    if ($('#txtnrooa').is(":focus") && (e.keyCode == 13)) {

        $('#jqxLoader').jqxLoader('open');
        var action="cargo_det";
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();

        //$("#jqxLoader").jqxLoader({ width: 250, height: 150, autoOpen: false,text:"Buscando en SICBO" });

        //console.log(dataString);
        $.ajax({
            type: "GET",
            data: {action: action, nrocargo: nrocargo, cod_sec: cod_sec},
            dataType: "json",
            url: "../common/dibuja_cargo.php",
            success: function (d) {
                console.log(d);
                $('#jqxLoader').jqxLoader('close');
                cargagrilla();
            }
        });
    }
});


function cargagrilla(){

    var action="cargo_det";
    var nrocargo=$('#txtnrooa').val();
    var cod_sec=$('#txtcodsec').val();

    var url1="../common/dibuja_cargo.php";
    var source =
    {
        data: {nrocargo: nrocargo,cod_sec: cod_sec,action: action},
        datatype: "json",
        datafields: [
            { name: 'cantidadentregada',type:'integer'},
            { name: 'codigodetalle'},
            { name: 'nrocargo'},
            { name: 'preciounitario'},
            { name: 'total'},
        ],
        id: 'iddetalle',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);

    $("#jqxgrid").jqxGrid(
        {
            width: 1000,
            source: dataAdapter,
            ready: function () {
                $("#jqxgrid").jqxGrid('hidecolumn', 'nrocargo');
            },
            columnsresize: true,
            columns: [
                { text: 'CARGO', datafield: 'nrocargo', width: 100 },
                { text: 'CODIGO', datafield: 'codigodetalle', width: 100 },
                { text: 'CANTIDAD', datafield: 'cantidadentregada' , width: 100  },
                { text: 'P. UNIT.', datafield: 'preciounitario', width: 150 },
                { text: 'TOTAL', datafield: 'total', width: 100 },
            ]
        });
    /*$("#jqxgrid").bind('rowselect', function (event) {
        var row = event.args.rowindex;
        console.log("fila"+row);
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
        // $('#myModal').modal('hide');
    });*/
}
/*-----------------------------------------------------------------------*/

/*
$(document).ready(function(){
    $('#btnokPac').click(function () {
        var objPac = new Object();
        var rut = $('#txtRutNum2').val();
        objPac.rut = rut.substr(0, -2);
        objPac.rutver = rut.substr(-1, 1);
        objPac.nombre = $("#txtNomPac").val();
        objPac.apat = $('#txtApat').val();
        objPac.amat = $('#txtAmat').val();
        objPac.fnac = $('#txtFnac').val();
        objPac.dir = $('#txtDireccion').val();
        objPac.tel = $('#txtTelefono').val();
        objPac.mail = $('#txtEmail').val();
        objPac.ciudad = $('#cboCiudad').val();
        console.log(objPac);

        jQuery.post('../drivers/pacientes/nuevoPaciente', {
            datos: objPac;
    }, function(data, textStatus{
            if(data == 1){
                alert('Paciente ha sido registrado');
            }else {
                alert('Error al guardar!');
            }
        }));
    });
});
*/




