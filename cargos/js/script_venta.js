
//Valida que se ingrese rut en panel admision paciente
$(document).ready(function(){

    var boton_rut;

    boton_rut = $('#btnokPac');

    boton_rut.on('click', function(){

        var valor_input, valor_rut;

        valor_input = $('#txtRutNum2');
        valor_rut = valor_input.val();

        if(valor_rut === ''){
            toastr.warning('Ingrese Rut');

            $('#txtRutNum2').focus();
            return false;
        }else{
            return true;
        }

    });

});
//-------------------------------------------------------------------------
function guarda_pac(){
	toastr.success('Paciente registrado exitosamente');
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

/*---------------------Textbox codigo servicios--------------- -------*/
$(document).keyup(function (e) {
    if($("#txtcodserv").is(":focus") && (e.keyCode == 13)) {
        var nrocargo = $('#txtnrooa').val();
        var cod_sec = $('#txtcodsec').val();
        var cod_ser = $('#txtcodserv').val();
        var action = "getServicio";

        if(cod_ser > 0){
            $.ajax({
                type: "GET",
                url: "../common/dibuja_cargo.php",
                data: {nrocargo: nrocargo, cod_sec: cod_sec, action: action, codigo: cod_ser},

                error: function () {
                    alert('Error peticion Ajax al buscar Servicio.');
                },
                success: function (data) {
                    if(data.length > 0){
                        var parsedData = JSON.parse(data);
                        $('#txtNomServ').val(parsedData.descripcion);
                        $('#txtprecio').focus();
                    }else {
                        toastr.info('No hay datos');
                    }
                }
            });
        }else {
            toastr.warning('Ingrese código de servicio');
        }
    }
});

/*-----------------------------------------------------------*/

$(document).keyup(function (e) {
    if ($("#txtprecio").is(":focus") && (e.keyCode == 13)) {
        $('#txtCantServ').focus();
    }
});

//------------Evento al dar ENTER sobre txt cantidad de servicios---------

$(function() {
    // Declaración del datasource
    var dataGrilla = [];

    var source = {
        localdata: dataGrilla,
        datatype: "array"
    };

    // Creación del widget
    $("#jqxgrid").jqxGrid({
        width: 900,
        source: source,
        height: 200,
        columns: [
            { text: 'CODIGO', datafield: 'colcodigos', width: 100 },
            { text: 'PRESTACION', datafield: 'colnombres', cellsformat: 'D',width: 500 },
            { text: 'CANTIDAD', datafield: 'colcantidades', width: 80 },
            { text: 'PRECIO', datafield: 'colprecios', width: 80, cellsalign: 'right' },
            { text: 'TOTAL', datafield: 'coltotales', width: 100, cellsalign: 'right', cellsformat: 'c2' },
        ]
    });

    $(document).keyup(function (e) {
        if ($("#txtCantServ").is(":focus") && (e.keyCode == 13)) {
            var cant = $('#txtCantServ').val();
            var punit = $('#txtprecio').val();
            if (cant > 0) {

                var codigo = $('#txtcodserv').val();
                var nombre = $('#txtNomServ').val();
                var total = punit * cant;

                var codigos = [codigo];
                var nombres = [nombre];
                var cantidades = [cant];
                var precios = [punit];
                var totales = [total];

                var row = {};
                row.colcodigos = codigos;
                row.colnombres = nombres;
                row.colcantidades = cantidades;
                row.colprecios = precios;
                row.coltotales = totales;
                dataGrilla.push(row);

                console.log(dataGrilla);

                // Actualizar el data source
                $("#jqxgrid").jqxGrid({ source: source });

                $('#txtcodserv').val('');
                $('#txtNomServ').val('');
                $('#txtprecio').val('');
                $('#txtCantServ').val('');
                $('#txtcodserv').focus();
            }else{
                toastr.warning('Ingrese cantidad.');
            }
        }
    });

    // delete row.
    $("#btnEliminaServ").bind('click', function () {
        var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
        var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
        if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
            var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
            var commit = $("#jqxgrid").jqxGrid('deleterow', id);
            $('#txtcodserv').focus();
        }
    });
});

//----------------------------------------------------------------------

//------------Evento al dar ENTER sobre txt codigo de INSUMOS---------

$(document).keyup(function (e) {
    if($("#txtcodins").is(":focus") && (e.keyCode == 13)) {
        var nrocargo = $('#txtnrooa').val();
        var cod_sec = $('#txtcodsec').val();
        var cod_ins = $('#txtcodins').val();
        var action = "getNombreInsumo";

        if(cod_ins > 0){
            $.ajax({
                type: "GET",
                url: "../common/dibuja_cargo.php",
                data: {nrocargo: nrocargo, cod_sec: cod_sec, action: action, codigo: cod_ins},

                error: function () {
                    alert('Error peticion Ajax al buscar Insumo.');
                },
                success: function (data) {
                    if(data.length > 0){
                        var parsedData = JSON.parse(data);
                        $('#txtNomIns').val(parsedData.descripcion);
                        $('#txtprecioIns').focus();
                    }else {
                        toastr.warning('No hay datos');
                    }
                }
            });
        }else {
            toastr.warning('Ingrese Código de Insumo.');
        }
    }
});

// - - - -  TXT PRECIO INSUMO - - - -

$(document).keyup(function (e) {
    if ($("#txtprecioIns").is(":focus") && (e.keyCode == 13)) {
        $('#txtCantIns').focus();
    }
});

//txt cantidad insumos- - - - - - -  - - - - - -
    $(function() {
        // Declaración del datasource
        var dataGrilla = [];

        var source = {
            localdata: dataGrilla,
            datatype: "array"
        };

        // Creación del widget
        $("#jqxgrid2").jqxGrid({
            width: 900,
            source: source,
            height: 200,
            columns: [
                { text: 'CODIGO', datafield: 'colcodigos', width: 100 },
                { text: 'INSUMO', datafield: 'colnombres', cellsformat: 'D',width: 500 },
                { text: 'CANTIDAD', datafield: 'colcantidades', width: 80 },
                { text: 'PRECIO', datafield: 'colprecios', width: 80, cellsalign: 'right' },
                { text: 'TOTAL', datafield: 'coltotales', width: 100, cellsalign: 'right', cellsformat: 'c2' },
            ]
        });

        $(document).keyup(function (e) {
            if ($("#txtCantIns").is(":focus") && (e.keyCode == 13)) {
                var cant = $('#txtCantIns').val();
                var punit = $('#txtprecioIns').val();
                if (cant > 0) {

                    var codigo = $('#txtcodins').val();
                    var nombre = $('#txtNomIns').val();
                    var total = punit * cant;

                    var codigos = [codigo];
                    var nombres = [nombre];
                    var cantidades = [cant];
                    var precios = [punit];
                    var totales = [total];

                    var row = {};
                    row.colcodigos = codigos;
                    row.colnombres = nombres;
                    row.colcantidades = cantidades;
                    row.colprecios = precios;
                    row.coltotales = totales;
                    dataGrilla.push(row);

                    console.log(dataGrilla);

                    // Actualizar el data source
                    $("#jqxgrid2").jqxGrid({ source: source });

                    $('#txtcodins').val('');
                    $('#txtNomIns').val('');
                    $('#txtprecioIns').val('');
                    $('#txtCantIns').val('');
                    $('#txtcodins').focus();
                }else{
                    alert('Ingrese cantidad.');
                }
            }
        });

        // delete row.
        $("#btnEliminaIns").bind('click', function () {
            var selectedrowindex = $("#jqxgrid2").jqxGrid('getselectedrowindex');
            var rowscount = $("#jqxgrid2").jqxGrid('getdatainformation').rowscount;
            if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                var id = $("#jqxgrid2").jqxGrid('getrowid', selectedrowindex);
                var commit = $("#jqxgrid2").jqxGrid('deleterow', id);
                $('#txtcodins').focus();
            }
        });
    });

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
            toastr.warning('Ingrese Rut del paciente');
        }

    }
});

//------------ Enter sobre text codigo seccion--------------
$(document).keyup(function(e){
    if ($('#txtcodsec').is(":focus") && (e.keyCode == 13)) {

        var nrocargo = $('#txtnrooa').val();
        var cod_sec = $('#txtcodsec').val();
        var action = "getNombreSec";

        if (cod_sec > 1){
            $.ajax({
                type: "GET",
                url: "../common/dibuja_cargo.php",
                data: {cod_sec: cod_sec,action: action,nrocargo: nrocargo},

                error: function () {
                    alert('Error peticion Ajax al traer nombre de seccion.');
                },
                success: function (data) {

                    if(data.length > 0){
                        var parsedData = JSON.parse(data);
                        //console.log(parsedData);
                        $('#lblsec').text(parsedData.descripcion);
                        $('#txtnrooa').focus();

                    }else {
                        toastr.info('Código se sección no encontrado.');
                        $('#lblsec').val('');
                    }
                }
            });
        }else{
            toastr.warning('Ingrese código de sección!');
            $('#txtnrooa').val('');
        }

    }
});


//------------------Buscar cargo--------------------------------
$(document).keyup(function (e){
    if ($("#txtnrooa").is(":focus") && (e.keyCode == 13)) {
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();
        var action="cargo_cabecera";

        if (nrocargo > 0){
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
                        toastr.info('No hay datos.');
                        $('#txtnrooa').focus();
                    }
                    console.log(data);
                }
            });
        }else{
            toastr.warning('Ingrese nro de cargo!');
        }
    };
});


//------------- DETALLE CARGO--------------------*/
$(document).keyup(function(e){
    if ($('#txtnrooa').is(":focus") && (e.keyCode == 13)) {
        var action="cargo_det";
        var nrocargo=$('#txtnrooa').val();
        var cod_sec=$('#txtcodsec').val();

        if (nrocargo > 0){
            $('#jqxLoader').jqxLoader('open');

            $("#jqxLoader").jqxLoader({ width: 250, height: 150, autoOpen: false,text:"Buscando en SICBO" });

            $.ajax({
                type: "GET",
                data: {action: action, nrocargo: nrocargo, cod_sec: cod_sec},
                dataType: "json",
                url: "../common/dibuja_cargo.php",
                success: function (d) {
                    //console.log(d);
                    $('#jqxLoader').jqxLoader('close');
                    cargagrilla();
                }
            });

            //GRILLA DETALLE INSUMOS
            cargaInsumos();
        }
    }
});

function cargaInsumos(){
    var action="getDetInsumos";
    var nrocargo=$('#txtnrooa').val();
    var cod_sec=$('#txtcodsec').val();

    $.ajax({
        type: "GET",
        data: {action: action, nrocargo: nrocargo, cod_sec: cod_sec},
        //dataType: "json",
        url: "../common/dibuja_cargo.php",
        success: function (d2) {
            console.log(d2);
            //$('#jqxLoader').jqxLoader('close');
            cargagrillaInsumos();
        }
    });
}

function cargagrillaInsumos(){

    var action="getDetInsumos";
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
            { name: 'descripcion'},
            { name: 'nrocargo'},
            { name: 'preciounitario'},
            { name: 'total'},
        ],
        id: 'iddetalle',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);

    $("#jqxgrid2").jqxGrid(
        {
            width: 900,
            height: 200,
            source: dataAdapter,
            ready: function () {
                $("#jqxgrid").jqxGrid('hidecolumn', 'nrocargo');
            },
            columnsresize: true,
            columns: [

                { text: 'CODIGO', datafield: 'codigodetalle', width: 100 },
                { text: 'INSUMO', datafield: 'descripcion', width: 500},
                { text: 'CANTIDAD', datafield: 'cantidadentregada' , width: 80  },
                { text: 'P. UNITARIO', datafield: 'preciounitario', width: 100 },
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
            { name: 'descripcion'},
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
            width: 900,
            height: 200,
            source: dataAdapter,
            ready: function () {
                $("#jqxgrid").jqxGrid('hidecolumn', 'nrocargo');
            },
            columnsresize: true,
            columns: [

                { text: 'CODIGO', datafield: 'codigodetalle', width: 100 },
                { text: 'PRESTACION', datafield: 'descripcion', width: 500},
                { text: 'CANTIDAD', datafield: 'cantidadentregada' , width: 80  },
                { text: 'P. UNITARIO', datafield: 'preciounitario', width: 100 },
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

$(document).ready(function () {
    var codrol = 1;
    var codfin;

    //MODAL PROFESIONALES
    $("#cboRolProf").on('change', function (event) {
        codrol = $('#cboRolProf').val();
        $('#jqxInput3').focus();
    });

    if ($('#btnModalOk').on("click", function () {
        //var rutprof = $('#jqxInput3').val();
        var rutmtra = $('#ruttra').val();
        console.log(rutmtra);
    }));

    $('#cboFinan').change(function () {
        codfin = $('#cboFinan').val();
        //alert(codfin);
    });
//});


// - - - S E C C I O N  B O T O N E S   I N F E R I O R E S- - -  - - -  -

//obtiene ultimo nro de cargo por seccion
    $('#btnGuargaCargo').on("click",function () {
        //toastr.success('Cargo guardado!');
        var cod_sec = parseInt($('#txtcodsec').val());
        var fecha = new Date;
        var ano = fecha.getFullYear();
        var mes = parseInt(fecha.getMonth())+1;
        var globalData;
        var ultimo;
        var nuevo;
        var nroNuevo;
        var id;
        var periodo = parseInt(mes.toString()+ ano.toString());
        var hora = fecha.getHours();
        var minuto = fecha.getMinutes();
        var nrofi = $('#txtnroCta').val();
        var rutfin = $('#cboFinan').val();
        var rutpac = $('#txtRutNum3').val();
        var tipopac = 0;
        var tipo = 'AH';
        var tipopago = 'CBO';
        var idtoth = 0;
        var fecha2 = $('#txtfecha').val();
        var action2 = 'grabaCargo'
        //console.log(perido);

        $.ajax({
            type: 'GET',
            data: {action: 'buscaUltimo', cod_sec: cod_sec,mes: mes, ano: ano,nuevo:0},
            url: '../common/oa_cargo.php',
            //dataType: 'json',
            success: function (data) {
                var parsedData = JSON.parse(data);
                globalData = parsedData;
                if (parsedData.length > 0) {
                    //console.log(parsedData);
                    ultimo = parsedData[0].NUMERO;
                    nuevo = parseInt(ultimo)+1;
                    id = parsedData[0].id;

                    alert('el ID es: '+ id + 'El ultimo cargo es: '+ultimo + 'El NUEVO cargo es: '+nuevo);
                    updUltimo();
                    grabaCabecera();

                }else {
                    console.log('es primer cargo del mes');
                    insertUlt_oa();
                }

            },
            error: function () {
                alert('Error peticion Ajax al consultar tabla UTL_OA');
            }
        }).done(function () {
            window.nuevo = nuevo;
            nroNuevo = window.nuevo;
            window.id = id;
            id=window.id;
            var arreglo = [action2,cod_sec,nuevo,periodo,fecha2,nrofi,hora,minuto,rutfin,rutpac,tipopac,tipo,tipopago,idtoth];
            console.log(arreglo);
        });

        function updUltimo() {
            $.ajax({
                type: 'GET',
                data: {action: 'updUltimo',nuevo: nuevo,id:id},
                url: '../common/oa_cargo.php',
                success: function (d) {
                    console.log(d);
                },
                error: function () {
                    alert('error ajax');
                }
            });
        }

        function insertUlt_oa() {

            $.ajax({
                type: 'GET',
                data: {action: 'insertUltimo', cod_sec: cod_sec,mes: mes, ano: ano, nuevo:nuevo},
                url: '../common/oa_cargo.php',
                success: function () {
                    alert('Se agrego nuevo registro');
                },
                error: function () {
                    alert('Error peticion Ajax al actualizar ULT_OA.');
                }
            });
        }

        //- - - funcion que guarda la CABECERA DEL CARGO - - -

        function grabaCabecera() {

            $.ajax({
                type: 'GET',
                data: {action:action2,cod_sec:cod_sec,nro_oa:nuevo,periodo:periodo,fecha:fecha2,nro_fi:nrofi,hora:hora,min:minuto,rut_fin:rutfin,rut_pac:rutpac,tipo_pac:tipopac,tipo:tipo,tipo_pago:tipopago,idtoth:idtoth},
                url: '../common/oa_cargo.php',
                success: function () {
                    toastr.success('Cargo guardado exitosamente');
                },
                error: function () {
                    toastr.error('Error al guardar cargo');
                }
            });
        }
    });


    //- - - - - boton anular - - - - - - - -  - - - - - - - -
    $(".confirm").confirm({
        content: "Seguro que desea anular el cargo?",
        title: "Anulacion de cargos",
        confirm: function(button) {
            toastr.info('Cargo fue anulado');
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Si",
        cancelButton: "No",
        post: true,
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });
    //- - - - - - - - - - -  - - - - - - - - - - - - - - -- - - - - - - -

    //- - - - Guardar paciente - - - - - -
    $('#btnokPac').on('click',function () {
        //alert('ok');
        var data = $('#form2').serializeArray();

        $.ajax({
            type: 'GET',
            url: '../common/oa_cargo.php',
            data: data,
            dataType: 'json',
            success: function () {
                toastr.success('Paciente fue guardado');
            },
            error: function () {
                toastr.error('Error al guardar paciente');
            }
        });

        console.log(data);
    });
});

$(document).on('show.bs.modal','#myModal2', function () {
    $('#jqxInput2').focus();

});

