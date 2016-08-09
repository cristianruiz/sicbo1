/**
 * 
 */
var ano, mes=0;
function buscar(){
	document.getElementById('lblstatus').innerHTML="hols";
	var hilo = new newAjax();
    var url= "../controller/honorarios.php?action=estadoperiodo";
    hilo.open("GET",url,true);
    console.log("abriendo");
    hilo.onreadystatechange=function(){
        if (hilo.readyState == 1){
        	console.log("aki 1");
       	 document.getElementById('lblstatus').innerHTML="CArgandoa";
        }
        if (hilo.readyState == 4){
        	console.log("aki 2");
           /*jsonObject = JSON.parse(hilo.responseText);

           document.getElementById('td_conductor').innerHTML=jsonObject[0].nombre;
            document.getElementById('td_colegio').innerHTML=jsonObject[0].colegio;

        } */
       	// alert("HOLA: "+hilo.responseText);
    }
    hilo.send(null);
    
    }
    console.log("HOLA loooooo");
}    
function __buscar(){
	document.getElementById('lblstatus').innedrHTML="";
	 var hilo = new newAjax();
     var url= "../controller/honorarios.php?action=estadoperiodo";
     hilo.open("GET",url,true);
     hilo.onreadystatechange=function(){
         if (hilo.readyState == 1){
        	 document.getElementById('lblstatus').innerHTML="CArgandoa";
         }
         if (hilo.readyState == 4){
            /*jsonObject = JSON.parse(hilo.responseText);

            document.getElementById('td_conductor').innerHTML=jsonObject[0].nombre;
             document.getElementById('td_colegio').innerHTML=jsonObject[0].colegio;

         } */
        	 alert("HOLA: "+hilo.responseText);
     }
     hilo.send(null);
}
}
function _buscar(){
	var url="";
    var data =
    {
        datatype: "json",
        datafields: [
            { name: 'FECHADIGITACION'},
            { name: 'PACIENTE'},
            { name: 'CODIGO'},
            { name: 'MEDICO'},
            { name: 'PACIENTE'},
        ],
        id: 'id',
        url: "beverages.txt"
    };
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
            $("#btnBuscar").on('click', function () {
                buscar();
            });
            
            $("#comboAno").on('change', function (event) {
            ano=event.args.item.value;           
            });
            $("#comboMes").on('change', function (event) {
                mes=event.args.item.value;           
            });
            
            

  });
            