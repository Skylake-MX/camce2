<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bitacora</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
	<body>

	<nav>
        <div value="nav_option"></option>
            <ul class="nav_lista">
                <li><a href="../index.php">Atrás</a></li>
                <li><i class="fas fa-database"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
	</nav>

	<div class="" style="text-align: center;">   
    <h5>Base de datos</h5>
    </div>

		<div class="form">
			<form action="" method="POST">

		<label class="registro" for="">Id Equipo</label>
		<input class="registro-input" type="idequipo" placeholder="" maxlength="20" name="idequipo" id="idequipo">

		<label class="registro" for="">Estatus</label>
		<input class="registro-input" type="estatus" placeholder=""maxlength="20" name="estatus" id="estatus">

		<label class="registro" for="">Razon social</label>
		<input class="registro-input" type="razonsocial" placeholder="" maxlength="20" name="razonsocial" id="razonsocial">

		<label class="registro" for="">Segmento</label>
		<input class="registro-input" type="segmento" placeholder="" maxlength="20" name="segmento" id="segmento">

		<label class="registro" for="">Unidad de negocio</label>
		<input class="registro-input" type="unidaddenegocio" placeholder="" maxlength="20" name="unidaddenegocio" id="unidaddenegocio">

		<label class="registro" for="">Cofre electronico</label>
		<input class="registro-input" type="cofreelectronico" placeholder="" maxlength="20" name="cofreelectronico" id="cofreelectronico">

		<label class="registro" for="">Capacidad</label>
		<input class="registro-input" type="capacidad" placeholder="" maxlength="20" name="capacidad" id="capacidad">

		<label class="registro" for="">Proveedor</label>
		<input class="registro-input" type="proveedor" placeholder="" maxlength="20" name="proveedor" id="proveedor">

		<label class="registro" for="">Modelo</label>
		<input class="registro-input" type="modelo" placeholder="" maxlength="20" name="modelo" id="modelo">

		<label class="registro" for="">Serie</label>
		<input class="registro-input" type="serie" placeholder="" maxlenght="40" name="serie" id="serie">

		<label class="registro" for="">Banco</label>
		<input class="registro-input" type="banco" placeholder="" maxlength="20" name="banco" id="banco">

		<label class="registro" for="">Tipo de Acreditacion</label>
		<input class="registro-input" type="tipodeacreditacion" placeholder="" maxlength="20" name="tipodeacreditacion" id="tipodeacreditacion">

		<label class="registro" for="">Contenedor</label>
		<input class="registro-input" type="contenedor" placeholder="" maxlength="20" name="contenedor" id="contenedor">

		<label class="registro" for="">Empresa</label>
		<input class="registro-input" type="empresa" placeholder="" maxlength="20" name="empresa" id="empresa">

		<label class="registro" for="">Sucursal GSI</label>
		<input class="registro-input" type="sucursalgsi" placeholder="" maxlength="20" name="sucursalgsi" id="sucursalgsi">

		<label class="registro" for="">Division</label>
		<input class="registro-input" type="division" placeholder="" maxlength="20" name="division" id="division">

		<label class="registro" for="">Fecha de Instalacion</label>
		<input class="registro-input" type="fechadeinstalacion" placeholder="" maxlength="20" name="fechadeinstalacion" id="fechadeinstalacion">

		<label class="registro" for="">Fecha de Retiro</label>
		<input class="registro-input" type="fechaderetiro" placeholder="" maxlength="20" name="fechaderetiro" id="fechaderetiro">

		<label class="registro" for="">Costo</label>
		<input class="registro-input" type="costo" placeholder="" maxlength="20" name="costo" id="costo">

		<label class="registro" for="">Direccion</label>
		<input class="registro-input" type="direccion" placeholder="" maxlength="250" name="direccion" id="direccion">


<input type="submit" value="GUARDAR">

<!-- <form action="" method="post">
    <input type="submit" name="respuesta" value="atras">
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
				if($_POST["respuesta"]==="atras"){
					header("location: ../index.php");
				}
		?>
</form> -->
	</form>
	</body>

</html>
