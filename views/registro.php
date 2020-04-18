
<!doctype html>
	<html lang="en">
	<head>
 		<meta charset="UTF-8">
		<title>BITACORACAMCE</title>
		<link rel="stylesheet" type="text/css" href="registro.css">
	</head>
</head>
	<body>
		<div class="form">
			<form action="" method="POST">
				<p>BASE DE DATOS</p>
			<Hr size="5">
		<p>Id Equipo
		<input type="idequipo" placeholder="" maxlength="40" name="idequipo" id="idequipo">

		Estatus
		<input type="estatus" placeholder=""maxlength="40" name="estatus" id="estatus">

		Razón Social
		<input type="razonsocial" placeholder="" maxlength="40" name="razonsocial" id="razonsocial">

		Segmento
		<input type="segmento" placeholder="" maxlength="40" name="segmento" id="segmento">
</p><br><p>
		Unidad de Negocio
		<input type="unidaddenegocio" placeholder="" maxlength="40" name="unidaddenegocio" id="unidaddenegocio">

		Cofre Electronico
		<input type="cofreelectronico" placeholder="" maxlength="40" name="cofreelectronico" id="cofreelectronico">

		Capacidad
		<input type="capacidad" placeholder="" maxlength="40" name="capacidad" id="capacidad">

		Proveedor
		<input type="proveedor" placeholder="" maxlength="40" name="proveedor" id="proveedor">
</p><br><p>

		Modelo
		<input type="modelo" placeholder="" maxlength="40" name="modelo" id="modelo">

		Serie
		<input type="serie" placeholder="" maxlenght="40" name="serie" id="serie">

		Banco
		<input type="banco" placeholder="" maxlength="40" name="banco" id="banco">

		Tipo de Acreditación
		<input type="tipodeacreditacion" placeholder="" maxlength="40" name="tipodeacreditacion" id="tipodeacreditacion">
</p><br><p>
		Contenedor
		<input type="contenedor" placeholder="" maxlength="40" name="contenedor" id="contenedor">

		Empresa
		<input type="empresa" placeholder="" maxlength="40" name="empresa" id="empresa">

		Sucursal GSI
		<input type="sucursalgsi" placeholder="" maxlength="40" name="sucursalgsi" id="sucursalgsi">

		División
		<input type="division" placeholder="" maxlength="40" name="division" id="division">
</p><br><p>
		Dirección
		<input type="direccion" placeholder="" maxlength="250" name="direccion" id="direccion">
<br>
<br>
<br>
		Fecha de Instalación
		<input type="fechadeinstalacion" placeholder="" maxlength="20" name="fechadeinstalacion" id="fechadeinstalacion">

		Fecha de Retiro
		<input type="fechaderetiro" placeholder="" maxlength="20" name="fechaderetiro" id="fechaderetiro">

		Costo
		<input type="costo" placeholder="" maxlength="20" name="costo" id="costo">
</p>
<br>
<input type="submit" value="GUARDAR">

<form action="" method="post">
    <input type="submit" name="respuesta" value="atras">
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
				if($_POST["respuesta"]==="atras"){
					header("location: ../index.php");
				}
		?>
</form>
	</form>
	</body>

</html>
