<!doctype html>
<html lang="en">
<head>
	<meta name="google-site-verification" content="p-WnhxptRt0DjjwahRsIdz0adIHwSIlGmhsZwiLeEIk" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css"/>
	<link href="css/bootstrap-switch.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jardinAmistad.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css"/>
	<script src="javascript/jquery-3.1.1.min.js"></script>
	<script src="javascript/Chart.bundle.js"></script>
	<script src="javascript/Chart.js"></script>
	<script src="javascript/bootstrap.js"></script>
    <script src="javascript/utils.js"></script>
	<script src="javascript/jardinAmistad.js"></script>
	<script src="javascript/bootstrap-switch.js"></script>
	<script src="javascript/bootstrap-select.js"></script>
	<script src="javascript/bootstrap-slider.js"></script>
	<script type="text/javascript" src="javascript/loader.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>

    <title>Jardín de la Amistad</title>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<script type="text/javascript">

$(document).ready(function(){
	/*
	$('#admin').hide();
	$('#usuario').hide();
	$('#grafica').hide();
	cambiarVista('Info');
	*/
	cargarTablaMarcacionesHoy();
});

</script>
	  <nav class="navbar navbar-default  navbar-fixed-top ">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/"><img src="images/logoJardin.png" alt="Jardín de la Amistad">
	        </a>
	      </div>
	      <div id="navbar1" class="navbar-collapse collapse">
	        <ul class="nav navbar-nav">
	          <li data-toggle="collapse" data-target=".navbar-collapse" id="menuMarca" class="active"  ><a href="index.php">Inicio</a></li>
	          
	          
	          <!--li><a href="#">Login</a></li-->
	        </ul>
	      </div>
	      <!--/.nav-collapse -->
	    </div>
	    <!--/.container-fluid -->
	  </nav>
	<input type="hidden" id="menuElegido"/>
	<input type="hidden" id="local" value="1"/>
	<input type="hidden" id="usuarioLogueado" name="usuarioLogueado" />
		
		<div  class="col-md-10" style="margin-top: 80px; text-align: center;">
			<div id="info" style="margin-top: 2%; text-align: center;">
				<div  id="seccion1">
					<div class="form-group row">
						<div class="col-12">
							<label class="control-label" id="lblMsg" style="font: bold; color: blue; font-size: 24px;">Miraflores</label>
			  			</div>
					 </div>
					
					<div class="form-group row">
			
					  <div class="col-12">
					    <input class="form-control" type="number" maxlength="8" placeHolder="DNI"   name="documentoIdentidad" id="documentoIdentidad">
					    <button type="button" class="btn btn-primary" onclick="marcar();" >Marcar</button>
					  </div>
					  </div>
					  <div class="form-group row">
			
							  <label class="control-label" id="lblError" style="font: bold; color: red; font-size: 24px;"></label>
							  <label class="control-label" id="lblMsg" style="font: bold; color: blue; font-size: 24px;"></label>
					</div>
					</div>
			
			</div>
		</div>
		<div  class="col-md-10" style="margin-top: 80px; text-align: center;" id="tablaProfes">
			
			
			
		</div>
	


</body>
</html>