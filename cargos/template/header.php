	<!DOCTYPE html>
	<html>
	<head>
		<title>Orden de Atención</title>
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

		<link rel="stylesheet" href="../gui/js/jqw/jqwidgets/styles/jqx.base.css" type="text/css" />

		<link rel="stylesheet" href="../gui/css/fontawesome/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="../gui/css/toastr.css" type="text/css" />

		<! JQUERY ALERT -->
		<link rel="stylesheet" href="../gui/js/jquery-confirm/css/jquery-confirm.css" type="text/css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

		<!--  REFERENCIAS AL FRAMEWORK JQW -->
		<script type="text/javascript" src="../gui/js/jqw/scripts/demos.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcore.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxdata.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxinput.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxbuttons.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxscrollbar.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxlistbox.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxcombobox.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxdropdownlist.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxloader.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.selection.js"></script>
		<script type="text/javascript" src="../gui/js/jqw/jqwidgets/jqxgrid.columnsresize.js"></script>

		<script type="text/javascript" src="../gui/js/util.js"></script>

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

		<script type="text/javascript" src="../gui/js/toastr.min.js"></script>
        <script type="text/javascript" src="./js/script_venta.js"></script>
		<script type="text/javascript" src="./js/adm_paciente.js"></script>

		<! JQUERY ALERT -->
		<script type="text/javascript" src="../gui/js/jquery-confirm/js/jquery-confirm.js"></script>
		<![endif]-->

		<script type="text/javascript">
                //--------AUTOCOMPLETAR  BUSCADOR DE SERVICIOS----------------------------------
            $(document).ready(function () {
            	var action = "buscaServ";
                var url = "../common/oa_autocompletadores.php?action="+action;

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
                $("#jqxInput").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Servicios/Prestaciones:", displayMember: "descripcion", valueMember: "codigoservicio", width: 400, height: 25});
                $("#jqxInput").on('select', function (event) {
					$("#jqxInput").focus();
					if (event.args) {
						var item = event.args.item;
						if (item) {
							/*var valueelement = $("<div id='codpres'></div>");
							valueelement.text("Codigo: " + item.value);
							var labelelement = $("<div></div>");
							labelelement.text("Item: " + item.label);

							$("#selectionlog").children().remove();
							$("#selectionlog").append(labelelement);
							$("#selectionlog").append(valueelement);*/

							$('#jqxInput').val('');
							var nombre = item.label;
							var codigo = item.value;
							$('#txtcodserv').val(codigo);
							$('#txtNomServ').val(nombre);
							$('#txtCantServ').focus();
							$('#myModal3').modal('hide');
						}
					}
                });
            });
            //---------------------------------------------------------------

                //------------Buscador de secciones--------------------------
                $(document).ready(function () {
					var action = 'buscaSec';
                    var url = "../common/oa_autocompletadores.php?action="+action;

                    // prepare the data
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            { name: 'codigoseccion' },
                            { name: 'descripcion' }
                        ],
                        url: url,
						action: action
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source);

                    // Create a jqxInput
                    $("#jqxInput2").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Secciones", displayMember: "descripcion", valueMember: "codigoseccion", width: 400, height: 25});
					$('#jqxInput2').focus();
					$("#jqxInput2").on('select', function (event) {
                        if (event.args) {
                            var item = event.args.item;
                            if (item) {
                                $('#txtcodsec').val(item.value);
                                var nombre = item.label;
                                $('#lblsec').text(nombre.substr(4,20)+'  ');
                                $('#myModal2').modal('hide');
                                $('#jqxInput2').val('');
                                //$('#txtnrooa').focus();
                            }
                        }
                    });
                });

				//------------Buscador de profesionales--------------------------
				$(document).ready(function () {

					var action = 'buscaProf';
					var url = "../common/oa_autocompletadores.php?action="+action;
					// prepare the data
					var source =
					{
						datatype: "json",
						datafields: [
							{ name: 'rutnum' },
							{ name: 'fullname' }
						],
						url: url

					};
					var dataAdapter = new $.jqx.dataAdapter(source);
					var codprof1 = $('#cboRolProf').val();
					// Create a jqxInput
					$("#jqxInput3").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Profesionales", displayMember: "fullname", valueMember: "rutnum", width: 200, height: 25});
					$("#jqxInput3").focus();
					$("#jqxInput3").on('select', function (event) {

						if (event.args) {
							var item = event.args.item;
							if (item) {
								var rutprof = item.value;
								var nombre = item.label;

								switch (codprof1){
									case 1:
										$('#ruttra').val(rutprof);
										$('#txtMedtra').val(nombre);
										console.log(codprof1);
										break;
									case 2:
										console.log(codprof1);
										$('#rutminf').val(rutprof);
										$('#txtmedInf').val(nombre);
										break;
									case 3:
										console.log(codprof1);
										$('#ruttecno').val(rutprof);
										$('#txttecnologo').val(nombre);
										break;
									default:
										break;
								}

								console.log(nombre+rutprof);
								$("#jqxInput3").val('');
							}
						}
					});
				});

				//--------AUTOCOMPLETAR  BUSCADOR DE INSUMOS----------------------------------
				$(document).ready(function () {
					var action = 'buscaInsumo';
					var url = "../common/oa_autocompletadores.php?action="+action;

					// prepare the data
					var source =
					{
						datatype: "json",
						datafields: [
							{ name: 'codigoinsumo' },
							{ name: 'descripcion' }
						],
						url: url
					};
					var dataAdapter = new $.jqx.dataAdapter(source);

					// Create a jqxInput
					$("#jqxInput4").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Insumos:", displayMember: "descripcion", valueMember: "codigoinsumo", width: 400, height: 25});
					$("#jqxInput4").on('select', function (event) {
						$("#jqxInput4").focus();
						if (event.args) {
							var item = event.args.item;
							if (item) {

								$('#jqxInput4').val('');
								var nombre = item.label;
								var codigo = item.value;
								$('#txtcodins').val(codigo);
								$('#txtNomIns').val(nombre);
								$('#txtCantIns').focus();
								$('#myModal4').modal('hide');
							}
						}
					});
				});

		</script>
			
	</head>
	<body>
	<div id="wrapper">
		
