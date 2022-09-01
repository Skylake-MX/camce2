<?php
var_dump($_POST);
var_dump($_GET);
require_once '../scripts/connect.php';
?> 

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
    	<h5>Nuevo Registro</h5>
    </div>
	<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">		
			<div class="col">
				<br>
  				<label class="registro" for="">Contrato de Arrendamiento</label><br>
				<input class="registro-input" type="text"  maxlength="21" name="contrato_arrendamiento" id="contrato_arrendamiento" ><br>

				<label class="registro" for="">Fecha del primer pago</label><br>
				<input class="registro-input" type="date" maxlength="15" name="fecha_primer_pago" id="fecha_primer_pago" ><br>

				<label class="registro" for="">Pago Total</label><br>
				<input class="registro-input" type="text" maxlength="15" name="pago_total" id="pago_total" ><br>

				<label class="registro" for="">Mensualidad</label><br>
				<input class="registro-input" type="text" maxlength="15" name="mensualidad" id="mensualidad" ><br>

				<label class="registro" for="">Cofres</label><br>
				<input class="registro-input" type="text"  maxlength="3" name="cofres" id="cofres" ><br>

				

			</div>

			<div class="col">
				<br>

        <label class="registro" for="">No. de Serie</label><br>
				<input class="registro-input" type="text" maxlength="15" name="serie" id="serie" ><br>

				<label class="registro" for="">Pago Mensual Unit</label><br>
				<input class="registro-input" type="text" maxlength="15" name="pago_mensual_unit" id="pago_mensual_unit" ><br>

				<label class="registro" for="">Recepcion de Cofre</label><br>
				<input class="registro-input" type="date" maxlength="15" name="recepcion_del_cofre" id="recepcion_del_cofre" ><br>
		
				<label class="registro" for="">Numero de pedido</label><br>
				<input class="registro-input" type="text" maxlength="10" name="numero_pedido" id="numero_pedido" ><br>

				<label class="registro" for="">Numero de factura de compra</label><br>
				<input class="registro-input" type="text" maxlength="10" name="numero_factura_compra" id="numero_factura_compra" ><br>

				

			</div>

			<div class="col">
        <br>
        <label class="registro" for="">Fecha Emision de Factura</label><br>
				<input class="registro-input" type="date" maxlenght="15" name="fecha_emision_factura" id="fecha_emision_factura" ><br>
		
				<label class="registro" for="">Valor de factura Unit USD</label><br>
				<input class="registro-input" type="text" maxlength="15" name="valor_factura_unit" id="valor_factura_unit" ><br>

				<label class="registro" for="">Propiedad ETV</label><br>
				<input class="registro-input" type="text" maxlength="9" name="propiedad_etv" id="propiedad_etv" ><br>

				<label class="registro" for="">Entrega ETV</label><br>
				<input class="registro-input" type="date" maxlength="15" name="entrega" id="entrega" ><br>

        <label class="registro" for="">CECO</label><br>
				<input class="registro-input" type="text" maxlength="20" name="CECO" id="CECO" ><br>

			</div>
		</div>
		<div class="row">

		</div>
		
		<div class="row">
		
		</div>
		
		<div class="row">
			<div class="col">
				<br><br>
				<input action="" style="margin: auto;" type="submit" value="Guardar">
				<?php 
					$result = false;
					if(!empty($_POST)){
						$contratoArrendamiento = $_POST['contrato_arrendamiento'];
						$fechaPrimerPago = $_POST['fecha_primer_pago'];
						$pagoTotal = $_POST['pago_total'];
						$mensualidad= $_POST['mensualidad'];
						$cofres = $_POST['cofres'];
						$serie = $_POST['serie'];
						$pagoMensualUnit = $_POST['pago_mensual_unit'];
						$recepcionDelCofre = $_POST['recepcion_del_cofre'];
						$numeroPedido = $_POST['numero_pedido'];
						$numeroFacturaCompra = $_POST['numero_factura_compra'];
						$fechaEmisionFactura = $_POST['fecha_emision_factura'];
						$valorFacturaUnit = $_POST['valor_factura_unit'];
						$propiedad_etv = $_POST['propiedad_etv'];
						$entregaETV = $_POST['entrega'];
						$CECO = $_POST['CECO'];

						$sql = "INSERT INTO adquisiciones(id, 
                  contrato_arrendamiento, 
                  fecha_primer_pago, 
                  pago_total, 
                  mensualidad, 
                  cofres, 
                  serie, 
                  pago_mensual_unit, 
                  recepcion_del_cofre, 
                  numero_pedido, 
                  numero_factura_compra, 
                  fecha_emision_factura, 
                  valor_factura_unit, 
                  propiedad_etv, 
                  entrega, 
                  CECO) 
                  VALUES (NULL, 
                    :contrato_arrendamiento, 
                    :fecha_primer_pago, 
                    :pago_total, 
                    :mensualidad, 
                    :cofres, 
                    :serie, 
                    :pago_mensual_unit, 
                    :recepcion_del_cofre, 
                    :numero_pedido, 
                    :numero_factura_compra, 
                    :fecha_emision_factura, 
                    :valor_factura_unit, 
                    :propiedad_etv, 
                    :entrega, 
                    :CECO)";

						$query = $pdo->prepare($sql);
						$result = $query->execute([
 						'contrato_arrendamiento' => $contratoArrendamiento,
						'fecha_primer_pago' => $fechaPrimerPago,
						'pago_total' => $pagoTotal,
						'mensualidad' => $mensualidad,
						'cofres' => $cofres,
						'serie' => $serie,
						'pago_mensual_unit' => $pagoMensualUnit,
						'recepcion_del_cofre'=> $recepcionDelCofre,
						'numero_pedido' => $numeroPedido,
						'numero_factura_compra' => $numeroFacturaCompra,
						'fecha_emision_factura' => $fechaEmisionFactura,
						'valor_factura_unit' => $valorFacturaUnit,
						'propiedad_etv' => $propiedad_etv,
						'entrega' => $entregaETV,
						'CECO' => $CECO
						]);
					}
				?>
			</div>
		</div>
	</div>
	<div class="container" style="margin:auto;"><br>
	<?php
		if($result) { echo '<div class="alert alert-success" role="alert" style"text-center">' . "El registro para " . $serie . " se agrego correctamnte.";  }
	?>
	<div>
	</form>


<!-- <form action="" method="post">
    <input type="submit" name="respuesta" value="atras">
		<?php
	/*	error_reporting(E_ALL ^ E_NOTICE);
				if($_POST["respuesta"]==="atras"){
					header("location: ../index.php");
				}
	*/	?>
</form> -->
	</form>
	</body>

</html>