<!-- <?php
var_dump($_POST);
require_once '../scripts/connect.php';
?> -->

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
	<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">		
			<div class="col">
				<br>
  				<label class="registro" for="">Id Equipo</label><br>
				<input class="registro-input" type="text"  maxlength="20" name="idequipo" id="idequipo"><br>

				<label class="registro" for="">Estatus</label><br>
				<input class="registro-input" type="text" maxlength="20" name="estatus" id="estatus"><br>

				<label class="registro" for="">Razon social</label><br>
				<input class="registro-input" type="text" maxlength="20" name="razonsocial" id="razonsocial"><br>

				<label class="registro" for="">Segmento</label><br>
				<input class="registro-input" type="text" maxlength="20" name="segmento" id="segmento"><br>

				<label class="registro" for="">Unidad de negocio</label><br>
				<input class="registro-input" type="text"  maxlength="20" name="unidaddenegocio" id="unidaddenegocio"><br>

				<label class="registro" for="">Cofre electronico</label><br>
				<input class="registro-input" type="text" maxlength="20" name="cofreelectronico" id="cofreelectronico"><br>

			</div>

			<div class="col">
				<br>
				<label class="registro" for="">Capacidad</label><br>
				<input class="registro-input" type="text" maxlength="20" name="capacidad" id="capacidad"><br>
		
				<label class="registro" for="">Proveedor</label><br>
				<input class="registro-input" type="text" maxlength="20" name="proveedor" id="proveedor"><br>

				<label class="registro" for="">Modelo</label><br>
				<input class="registro-input" type="text" maxlength="20" name="modelo" id="modelo"><br>

				<label class="registro" for="">Serie</label><br>
				<input class="registro-input" type="text" maxlenght="40" name="serie" id="serie"><br>
		
				<label class="registro" for="">Banco</label><br>
				<input class="registro-input" type="text" maxlength="20" name="banco" id="banco"><br>

				<label class="registro" for="">Tipo de Acreditacion</label><br>
				<input class="registro-input" type="text" maxlength="20" name="tipodeacreditacion" id="tipodeacreditacion"><br>

			</div>

			<div class="col">
				<br>
				<label class="registro" for="">Contenedor</label><br>
				<input class="registro-input" type="text" maxlength="20" name="contenedor" id="contenedor"><br>

				<label class="registro" for="">Empresa</label><br>
				<input class="registro-input" type="text"" maxlength="20" name="empresa" id="empresa"><br>

				<label class="registro" for="">Sucursal GSI</label><br>
				<input class="registro-input" type="text" maxlength="20" name="sucursalgsi" id="sucursalgsi"><br>

				<label class="registro" for="">Division</label><br>
				<input class="registro-input" type="text" maxlength="20" name="division" id="division"><br>		
		
			</div>
		</div>
		<div class="row">
			<div class="col">
				<br>
				<label class="registro" for="">Direccion</label><br>
				<input class="registro-direccion" type="costo" maxlength="80" name="direccion" id="direccion"><br><br>

			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<label class="registro" for="">Fecha de Instalacion</label><br>
				<input class="registro-input" type="date" maxlength="20" name="fechadeinstalacion" id="fechadeinstalacion"><br>
			</div>

			<div class="col">
				<label class="registro" for="">Fecha de Retiro</label><br>
				<input class="registro-input" type="date" maxlength="20" name="fechaderetiro" id="fechaderetiro"><br>
			</div>

			<div class="col">
				<label class="registro" for="">Costo</label><br>
				<input class="registro-input" type="text" maxlength="20" name="costo" id="costo"><br>		
			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<br><br>
				<input action="" style="margin: auto;" type="submit" value="Guardar">
				<?php
					if(!empty($_POST)){
						$idequipo = $_POST['idequipo'];
						$estatus = $_POST['estatus'];
						$razonsocial = $_POST['razonsocial'];
						$segmento = $_POST['segmento'];
						$unidaddenegocio = $_POST['unidaddenegocio'];
						$cofreelectronico = $_POST['cofreelectronico'];
						$capacidad = $_POST['capacidad'];
						$proveedor = $_POST['proveedor'];
						$modelo = $_POST['modelo'];
						$serie = $_POST['serie'];
						$banco = $_POST['banco'];
						$tipodeacreditacion = $_POST['tipodeacreditacion'];
						$contenedor = $_POST['contenedor'];
						$empresa = $_POST['empresa'];
						$sucursalgsi = $_POST['sucursalgsi'];
						$division = $_POST['division'];
						$direccion = $_POST['direccion'];
						$fechadeinstalacion = $_POST['fechadeinstalacion'];
						$fechaderetiro = $_POST['fechaderetiro'];
						$costo = $_POST['costo'];

						$sql = "INSERT INTO base(id, fecha, id_equipo, estatus, razon_social, segmento, unidad_de_negocio, cofre_electronico, capacidad, proveedor, modelo, serie, banco, tipo_de_acreditacion, contenedor, empresa, sucursal_gsi, division, direccion, fecha_de_instalacion, fecha_de_retiro, costo) VALUES (NULL, current_timestamp(), :id_equipo, :estatus, :razon_social, :segmento, :unidad_de_negocio, :cofre_electronico, :capacidad, :proveedor, :modelo, :serie, :banco, :tipo_de_acreditacion, :contenedor, :empresa, :sucursal_gsi, :division, :direccion, :fecha_de_instalacion, :fecha_de_retiro, :costo)";
						$query = $pdo->prepare($sql);
						$query->execute([
 						'id_equipo' => $idequipo,
						'estatus' => $estatus,
						'razon_social' => $razonsocial,
						'segmento' => $segmento,
						'unidad_de_negocio' => $unidaddenegocio,
						'cofre_electronico' => $cofreelectronico,
						'capacidad'=> $capacidad,
						'proveedor' => $proveedor,
						'modelo' => $modelo,
						'serie' => $serie,
						'banco' => $banco,
						'tipo_de_acreditacion' => $tipodeacreditacion,
						'contenedor' => $contenedor,
						'empresa' => $empresa,
						'sucursal_gsi' => $sucursalgsi,
						'division' => $division,
						'direccion' => $direccion,
						'fecha_de_instalacion' => $fechadeinstalacion,
						'fecha_de_retiro' => $fechaderetiro,
						'costo' => $costo
						]);
					}
				?>
			</div>
		</div>
	</div>
	</form>


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