/**
 * 
 */
var ano=2016;
var mes=1;
var idhonorario=0;
var selectedRowIndex=0; 
var unselectedRowIndex=0;
var idhonorarioconsolidado=0;
var ruthonorarioconsolidado=0;

function eliminaPS(){
	$("#jqxLoader").jqxLoader({text:"Restaurando Informacion..." });
	$('#jqxLoader').jqxLoader('open');
	var dat0 = new Object();
	dat0.action="deldatospersonanatural";
	dat0.idhonorarioconsolidado=idhonorarioconsolidado;
	
	var dataString=JSON.stringify(dat0);
	console.log(dataString);
	$.ajax({
        type: "GET",
        data: {parametros:dataString},
        dataType: "json",
        url: "../common/honorarios.php",
        success: function (d) {
        	$('#jqxLoader').jqxLoader('close');
           //console.log(JSON.stringify(d));
           //console.log(d["rutmed"]);
           if(d.res="OK"){
        	   toastr.info('Datos Listos para actualizar');
           } else {
        	   toastr.error('Error preparando información');
           }
            
        }
    });
	
}
function cargadatospersonanatural(){
	console.log("DIGVER "+ruthonorarioconsolidado.slice(0,-2)+": "+$.calculaDigitoVerificador(ruthonorarioconsolidado.slice(0,-2)));
	$('#jqxLoader').jqxLoader('open');
	var dat0 = new Object();
	dat0.action="cargadatospersonanatural";
	dat0.idhonorarioconsolidado=idhonorarioconsolidado;
	
	var dataString=JSON.stringify(dat0);
	console.log(dataString);
	$.ajax({
        type: "GET",
        data: {parametros:dataString},
        dataType: "json",
        url: "../common/honorarios.php",
        success: function (d) {
        	$('#jqxLoader').jqxLoader('close');
           //console.log(JSON.stringify(d));
           //console.log(d["rutmed"]);
           $('#rutnum').val(d.rutmed);
           $('#rutver').val($.calculaDigitoVerificador(ruthonorarioconsolidado.slice(0,-2)));
           $('#nombre').val(d.nombre);
            
        }
    });
    
	
}
function GuardarPS(){
	var dat0 = new Object();
	console.log("Hor consolidado: "+ idhonorarioconsolidado);
	dat0.action="guardapersonanatural"
	dat0.idhonorario=idhonorario;
	dat0.rutnum=$('#rutnum').val()
	dat0.rutver=$('#rutver').val()
	dat0.nombre=$('#nombre').val()
	dat0.checked = $('#chkpn').jqxCheckBox('checked');
	if (dat0.checked) {
		console.log("Si")
		var row = $("#gridsociedades").jqxGrid('getrowdata', selectedRowIndex);
		dat0.rutsociedad=row.rutsociedad
		console.log("id sociedad: "+dat0.rutsociedad)
	} else {
		console.log("no")
	}
	var dataString=JSON.stringify(dat0);
	
	$.ajax({
        type: "GET",
        data: {parametros:dataString},
        dataType: "json",
        url: "../common/honorarios.php",
        success: function (d) {
        	console.log("RESULTADO"+d.res)
            
        }
    });
	
	/*
	toastr.info('Are you the 6 fingered man?')
	toastr.error('Aasfdafqwdgfergwer')
	*/
	/*
	var dat0 = new Object();
	dat0.action="guardaPS";
	dat0.ano=ano;
	dat0.mes=mes;
	var dataString=JSON.stringify(dat0);
	
	console.log(dataString);
	var rows = $("#gridsociedades").jqxGrid('selectedrowindexes');
	for (var m = 0; m < rows.length; m++) {
        var row = $("#gridsociedades").jqxGrid('getrowdata', rows[m]);
        //selectedRecords[selectedRecords.length] = row;
        console.log(row.razonsocial)
	}
*/
}
function cargagrillasociedades(){
	var dat1 = new Object();
	dat1.action="getall";
	var dataString=JSON.stringify(dat1);
	var url1="../common/sociedades.php?parametros="+dataString;
    var source =
    {
        datatype: "json",
        datafields: [
            { name: 'rutsociedad'},
            { name: 'razonsocial'},
            { name: 'selec',type:'bool'},
        ],
        id: 'id',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#gridsociedades").jqxGrid(
    {
        width: 520,
        height: 250,
        source: dataAdapter,
        editable: true,
        selectionmode:'checkbox',
        ready: function () {
            $("#gridsociedades").jqxGrid('hidecolumn', 'name');
        },
        columnsresize: true,
        
        columns: [
            { text: 'Rut Soc.', datafield: 'rutsociedad', width: 100,cellclassname: "smallFont" },
            { text: 'Razon Social', datafield: 'razonsocial', width: 350,cellclassname: "smallFont" }
           // { text: '-', datafield: 'selec', width: 50, columntype: 'checkbox',editable: false, resizable: false,cellclassname: "smallFont" }
        ]
    }); 
    $("#gridsociedades").bind('rowselect', function (event) {
    	$("#gridsociedades").jqxGrid('unselectrow', selectedRowIndex);
         selectedRowIndex = event.args.rowindex;
    });
    $("#gridsociedades").bind('rowunselect', function (event) {
        var unselectedRowIndex = event.args.rowindex;
        selectedRowIndex=0;
    });
  /*  $("#gridsociedades").bind('cellendedit', function (event) {
        if (event.args.value) {
                $("#gridsociedades").jqxGrid('selectrow', event.args.rowindex);
                //alert(event.args.rowindex);
                var data = $('#gridsociedades').jqxGrid('getrowdata', event.args.rowindex);
                //console.log(data.razonsocial);
                //arreglo_docs_selected.push()
        }       else {
                $("#gridsociedades").jqxGrid('unselectrow', event.args.rowindex);
                }
        });*/
    
   
}
function cargagrilla(){
	var dat0 = new Object();
	dat0.action="listhonorarioconsolidado";
	dat0.idhonorario=idhonorario;
	
	var dataString=JSON.stringify(dat0);
	var url1="../common/honorarios.php?parametros="+dataString;
    var source =
    {
        datatype: "json",
        datafields: [
            { name: 'id'},         
            { name: 'rutmed'},
            { name: 'medico'},
            { name: 'nombrepad'},
            { name: 'total'},
            { name: 'receptor'},
            { name: 'razonsocial'},
        ],
        id: 'id',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    var cellsrenderer = function (row, column, value,rowData) {
    	//return '<div style="text-align: center; margin-top: 5px;color: #ff0000;">' + value + '</div>';
    	var row1 = $("#jqxgrid").jqxGrid('getrowdata', row);
    	
    	console.log(row1.medico);
    	var celda="";
    	if(row1.medico=='-'){
    		celda= '<div style="text-align: left;padding-left:5px;background-color:#FFFF00; margin-top: 5px;color: #ff0000;">' + value + '</div>';
    	} else {
    		celda= '<div style="text-align: left;padding-left:5px; margin-top: 5px;">' + value + '</div>';
    	}
    	if (row1.medico!='-' && row1.receptor==1){
    		celda= '<div style="text-align: left;padding-left:5px; margin-top: 5px;background-color: #32cdb0;">' + value + '</div>';
    	}
        return celda;
    }
    $("#jqxgrid").jqxGrid(
    {
        width: 1100,
        
        source: dataAdapter,
        ready: function () {
            $("#jqxgrid").jqxGrid('hidecolumn', 'name');
        },
        columnsresize: true,
        columns: [
            { text: 'RUT MEDICO', datafield: 'rutmed', width: 100,cellsrenderer: cellsrenderer },
            { text: 'NOMBRE PROFESIONAL', datafield: 'medico', width: 200,cellsrenderer: cellsrenderer },
            { text: 'NOMBRE PAD', datafield: 'nombrepad', width: 300,cellsrenderer: cellsrenderer },
            { text: 'VALOR', datafield: 'total', width: 100,cellsrenderer: cellsrenderer },
            { text: 'RECEPTOR HONORARIO', datafield: 'razonsocial', minwidth: 400,cellsrenderer: cellsrenderer }
        ]
    }); 
    $("#jqxgrid").bind('rowselect', function (event) {
        var row = event.args.rowindex;
        //console.log("fila"+row);
        var data = $('#jqxgrid').jqxGrid('getrowdata', event.args.rowindex);
        console.log("Seleccionando: "+data.id);
        idhonorarioconsolidado=data.id;
        ruthonorarioconsolidado=data.rutmed;
        if(data.medico=='-'){
        	cargadatospersonanatural();
        	$('#myModal').modal('toggle');
            $('#myModal').modal('show');
        } else {
        	$('#lblNombreamodificar').html(data.medico);
        	$('#frmModReceptor').modal('toggle');
            $('#frmModReceptor').modal('show');
        }
       
        
        
       // $('#myModal').modal('hide');
    });
}

$(document).ready(function () {
            var meses = [{text:'Enero', value:'ENERO'},{text:'Febrero', value:'FEBRERO'},{text:'Marzo', value:'MARZO'},
                         {text:'Abril', value:'ABRIL'},{text:'Mayo', value:'MAYO'},{text:'Junio', value:'JUNIO'},
                         {text:'Julio', value:'JULIO'},{text:'Agosto', value:'AGOSTO'},{text:'Septiembre', value:'SEPTIEMBRE'},
                         {text:'Octubre', value:'OCTUBRE'},{text:'Noviembre', value:'NOVIEMBRE'},{text:'Diciembre', value:'DICIEMBRE'}];

            $("#comboMes").jqxComboBox({
            source: meses,
            theme: 'highcontrast',
            width: '150px',
            height: '20px',
            displayMember: 'text',
            selectedIndex: 0,
            valueMember: 'value'
        });
           	
                    
            var anos = [{text:'2015', value:2015},{text:'2016', value:2016},{text:'2017', value:2017},{text:'2018', value:2018},{text:'2019', value:2019}];

            $("#comboAno").jqxComboBox({
            source: anos,
            theme: 'highcontrast',
            width: '80px',
            height: '20px',
            displayMember: 'text',
            selectedIndex: 0,
            valueMember: 'value'
        });
            
            $("#jqxLoader").jqxLoader({ width: 250, height: 150, autoOpen: false});
            
            $("#btnBuscar").jqxButton({ width: '80', height: '25'});
            $("#btnExcel").jqxButton({ width: '80', height: '25',disabled:true});
            $("#btnExcel").on('click', function () {
            	$("#jqxLoader").jqxLoader({text:"Generando EXCEL" });
            	$('#jqxLoader').jqxLoader('open');
            	var dat0 = new Object();
            	dat0.action="excel";
            	dat0.idhonorario=idhonorario;
            	var dataString=JSON.stringify(dat0);
            	console.log(dataString);
            	var url1="../common/honorarios.php/?parametros="+dataString;
            	document.location=url1;
            	$('#jqxLoader').jqxLoader('close');
            	$('#cargando').html("excel ok");
            	/*$.ajax({
                    type: "GET",
                    data: {parametros:dataString},
                    dataType: "json",
                    url: "../common/honorarios.php",
                    success: function (d) {
                    	$('#jqxLoader').jqxLoader('close');
                    	$('#cargando').html("excel ok: "+ d.res1);
                    }
            	});*/
            });	
            
            
             
            $("#btnBuscar").on('click', function () {
            	$("#jqxLoader").jqxLoader({text:"Buscando en SICBO" });
            	$('#jqxLoader').jqxLoader('open');
            	var dat0 = new Object();
            	dat0.action="honorariosmensual";
            	dat0.ano=ano;
            	dat0.mes=mes;
            	var dataString=JSON.stringify(dat0);
            	console.log(dataString);
            	$.ajax({
                    type: "GET",
                    data: {parametros:dataString},
                    dataType: "json",
                    url: "../common/honorarios.php",
                    success: function (d) {
                    	
                        
                    
                        	$('#jqxLoader').jqxLoader('close');
                        	$('#cargando').html(d.res1);
                        	idhonorario=d.res1;
                        	cargagrilla();
                        	$("#btnExcel").jqxButton({disabled:false});
                        
                    }
                });
            });
          
            $("#comboAno").on('change', function (event) {
            ano=event.args.item.value;           
            });
            $("#comboMes").on('change', function (event) {
                mes=event.args.item.value;           
            });
            
            
            $("#rutnum").jqxInput({placeHolder: "aasdads", height: 25, width: 80, minLength: 1 });
            $("#rutver").jqxInput({placeHolder: "?", height: 25, width: 20, minLength: 1 });
            $("#nombre").jqxInput({placeHolder: "Nombre", height: 25, width: 400, minLength: 1 });
            $("#chkpn").jqxCheckBox({ width: 120, height: 25 });
            //$("#btnGuardarPN").jqxButton({ width: '80', height: '25'});
            $("#titulo").hide();
            $("#titulo1").hide();
            $("#chkpn").on('change', function (event) {
                var checked = event.args.checked;
                if (checked){
                	//$("#btnGuardarPN").jqxButton({disabled:true});
                	$("#titulo").show();
                	$("#titulo1").show();
                } else {
                	//$("#btnGuardarPN").jqxButton({disabled:false});
                	$("#titulo").hide();
                	$("#titulo1").hide();
                }    	
            });
            cargagrillasociedades();
            $("#btnGuardarPS").jqxButton({ width: '80', height: '35'});
            $("#btnGuardarPS").on('click', function () {
            	GuardarPS();
            });
            
            //  M O D A L   M O D I F I C A C I O N     
            $("#btnAceptaModifica").jqxButton({ width: '80', height: '35'});
            $("#btnAceptaModifica").on('click', function () {
            	eliminaPS();
            });
            
            
            // F I N     M O D A L   M O D I F I C A C I O N==================================================
  });
            