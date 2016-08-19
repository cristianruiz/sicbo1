/**
 * 
 */
var ano, mes=0;
var idhonorario=0;

function GuardarPS(){
	alert("HOLA");
	$('#cargando').html("HADASASSASASSA");
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
            { name: 'selec'},
        ],
        id: 'id',
        url: url1
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    $("#gridsociedades").jqxGrid(
    {
        width: 500,
        height: 250,
        source: dataAdapter,
        ready: function () {
            $("#gridsociedades").jqxGrid('hidecolumn', 'name');
        },
        columnsresize: true,
        columns: [
            { text: 'RUT SOCIEDAD', datafield: 'rutsociedad', width: 100 },
            { text: 'RAZON SOCIAL', datafield: 'razonsocial', width: 350 },
            { text: '-', datafield: 'selec', width: 50, columntype: 'checkbox',editable: true, resizable: false }
        ]
    }); 
   
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
        console.log("fila"+row);
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
                    	
                        
                    //    setTimeout(function () {
                        	$('#jqxLoader').jqxLoader('close');
                        	$('#cargando').html(d.res1);
                        	idhonorario=d.res1;
                        	cargagrilla();
                     //   }, 2000); 
                        
                    }
                });
            });
            
           /* $("#btnBuscar").on('click', function () {
            	$('#cargando').html('<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            	
            	$.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "../example.php",
                    success: function (d) {
                    	
                        
                        setTimeout(function () {
                        	$('#cargando').html('');
                        	$('#cargando').html(d.res1);
                        }, 2000); 
                        
                    }
                });
            });
            */
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
            //$("#btnGuardarS").jqxButton({ width: '80', height: '25'});
  });
            