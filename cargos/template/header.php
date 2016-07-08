	<!DOCTYPE html>
	<html>
	<head>
		<title>Venta de servicios</title>
			<meta charset="UTF-8">
       		<meta http-equiv="X-UA-Compatible" content="IE=edge">
       		<meta name="viewport" content="width=device-width, initial-scale=1">

       		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

			<link rel="stylesheet" type="text/css" href="css/style_tabMenu.css">
			<link rel="stylesheet" type="text/css" href="css/styles.css">

			<link rel="stylesheet" href="../gui/js/jqw/jqwidgets/styles/jqx.base.css" type="text/css" />

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

			<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
			<script type="text/javascript" src="./js/script_venta.js"></script>

			<!--  REFERENCIAS AL FRAMEWORK JQW -->
			<script type="text/javascript" src="../gui/js/jqw/scripts/demos.js"></script>
	    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcore.js"></script>
	    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxdata.js"></script>
	    	<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxinput.js"></script>

	    	<script type="text/javascript">
            $(document).ready(function () {
                

                var url = "../common/dibuja_servicios_json.php";

                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'codigoservicio' },
                        { name: 'descripcion' }
                    ],
                    url: url
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                
                // Create a jqxInput
                $("#jqxInput").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Servicios/Prestaciones:", displayMember: "descripcion", valueMember: "codigoservicio", width: 600, height: 25});
                $("#jqxInput").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);

                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);
                        }
                       $('#jqxInput').on('select', 
							function () { $('#jqxInput').val(''); });
                    }
                });
            });
        </script>
			
	</head>
	<body>
	<div id="wrapper">
		
