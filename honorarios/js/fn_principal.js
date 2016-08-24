/**
 * 
 */
var ano, mes=0;
var idhonorario=0;
var selectedRowIndex=0; 
var unselectedRowIndex=0;
var idhonorarioconsolidado=0;
var ruthonorarioconsolidado=0;


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
            	$('#cargando').html(d.res1);
            	idhonorario=d.res1;
            	cargagrilla();
       
            
        }
    });
    
	
}
function GuardarPS(){
	var dat0 = new Object();
	dat0.action="guardaPS";
	dat0.ano=ano;
	dat0.mes=mes;
	var dataString=JSON.stringify(dat0);
	gridsociedades
	console.log(dataString);
	var rows = $("#gridsociedades").jqxGrid('selectedrowindexes');
	for (var m = 0; m < rows.length; m++) {
        var row = $("#gridsociedades").jqxGrid('getrowdata', rows[m]);
        //selectedRecords[selectedRecords.length] = row;
        console.log(row.razonsocial)
	}

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
        ],
        id: 'id',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#jqxgrid").jqxGrid(
    {
        width: 1000,
        
        source: dataAdapter,
        ready: function () {
            $("#jqxgrid").jqxGrid('hidecolumn', 'name');
        },
        columnsresize: true,
        columns: [
            { text: 'RUT PROFESIONAL', datafield: 'rutmed', width: 150 },
            { text: 'NOMBRE PROFESIONAL', datafield: 'medico', width: 300 },
            { text: 'NOMBRE PAD', datafield: 'nombrepad', width: 300 },
            { text: 'VALOR', datafield: 'total', width: 150 },
            { text: '-', datafield: 'receptor', minwidth: 50 }
        ]
    }); 
    $("#jqxgrid").bind('rowselect', function (event) {
        var row = event.args.rowindex;
        //console.log("fila"+row);
        var data = $('#jqxgrid').jqxGrid('getrowdata', event.args.rowindex);
        console.log("Seleccionando: "+data.id);
        idhonorarioconsolidado=data.id;
        ruthonorarioconsolidado=data.rutmed;
        cargadatospersonanatural();
        
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
       // $('#myModal').modal('hide');
    });
}

$(document).ready(function () {
            var meses = [{text:'Enero', value:'ENERO'},{text:'Febrero', value:'FEBRERO'},{text:'Marzo', value:'MARZO'},
                         {text:'Abril', value:'ABRIL'},{text:'Mayo', value:'MAYO'},{text:'Junio', value:'JUNIO'},
                         {text:'Julio', value:'JULIO'},{text:'Agosto', value:8},{text:'Septiembre', value:9},
                         {text:'Octubre', value:10},{text:'Noviembre', value:11},{text:'Diciembre', value:12}];

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
            
            
            $("#btnBuscar").jqxButton({ width: '80', height: '25'});
            
            $("#jqxLoader").jqxLoader({ width: 250, height: 150, autoOpen: false,text:"Buscando en SICBO" });
             
            $("#btnBuscar").on('click', function () {
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
  });
            