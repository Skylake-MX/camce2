<?php


    include_once '../scripts/connect.php';
    $result=false;

    if(!empty($_POST)){

        $id=$_POST['id'];  
        /* var_dump($id); */

        $newcontratoArrendamiento  = $_POST['contrato_arrendamiento'];
        $newfechaPrimerPago  = $_POST['fecha_primer_pago'];
        $newpagoTotal = $_POST['pago_total'];
        $newmensualidad  = $_POST['mensualidad'];
        $newcofres  = $_POST['cofres'];
        $newserie  = $_POST['serie'];
        $newpagoMensualUnit  = $_POST['pago_mensual_unit'];
        $newrecepcionDelCofre  = $_POST['recepcion_del_cofre'];
        $newnumeroPedido  = $_POST['numero_pedido'];
        $newnumeroFacturaCompra  = $_POST['numero_factura_compra'];
        $newfechaEmisionFactura  = $_POST['fecha_emision_factura'];
        $newvalorFacturaUnit  = $_POST['valor_factura_unit'];
        $newtpropiedadETV  = $_POST['propiedad_etv'];
        $newentrega  = $_POST['entrega'];
        $newCECO  = $_POST['CECO'];


        $sql = "UPDATE adquisiciones SET 
            contrato_arrendamiento=:contrato_arrendamiento,
            fecha_primer_pago=:fecha_primer_pago,
            pago_total=:pago_total,
            mensualidad=:mensualidad,
            cofres=:cofres,
            serie=:serie,
            pago_mensual_unit=:pago_mensual_unit,
            recepcion_del_cofre=:recepcion_del_cofre,
            numero_pedido=:numero_pedido,
            numero_factura_compra=:numero_factura_compra,
            fecha_emision_factura=:fecha_emision_factura,
            valor_factura_unit=:valor_factura_unit,
            propiedad_etv=:propiedad_etv,
            entrega=:entrega,
            CECO=:CECO WHERE id=:id";

        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'contrato_arrendamiento' => $newcontratoArrendamiento,
            'fecha_primer_pago' => $newfechaPrimerPago,
            'pago_total' => $newpagoTotal,
            'mensualidad' => $newmensualidad,
            'cofres' => $newcofres,
            'serie' => $newserie,
            'pago_mensual_unit' => $newpagoMensualUnit,
            'recepcion_del_cofre' => $newrecepcionDelCofre,
            'numero_pedido' => $newnumeroPedido,
            'numero_factura_compra' => $newnumeroFacturaCompra,
            'fecha_emision_factura' => $newfechaEmisionFactura,
            'valor_factura_unit' => $newvalorFacturaUnit,
            'propiedad_etv' => $newtpropiedadETV,
            'entrega' => $newentrega,
            'CECO' => $newCECO
            ]);

            $contratoArrendamiento = $newcontratoArrendamiento;
            $fechaPrimerPago = $newfechaPrimerPago;
            $pagoTotal= $newpagoTotal;
            $mensualidad = $newmensualidad;
            $cofres = $newcofres;
            $serie = $newserie;
            $pagoMensualUnit = $newpagoMensualUnit;
            $recepcionDelCofre = $newrecepcionDelCofre;
            $numeroPedido = $newnumeroPedido;
            $numeroFacturaCompra = $newnumeroFacturaCompra;
            $fechaEmisionFactura = $newfechaEmisionFactura;
            $valorFacturaUnit = $newvalorFacturaUnit;
            $propiedadETV = $newtpropiedadETV;
            $entrega = $newentrega;
            $CECO = $newCECO;

            /* var_dump($result); */
            $estatusOp="El registro para " . $serie . " se actualizo correctamente. ";
    }
    else{
    $id = $_GET['id'];
    /*  var_dump($id); */

    $sql="SELECT * FROM adquisiciones WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);

    $row=$query->fetch(PDO::FETCH_ASSOC);

    $contratoArrendamiento = $row['contrato_arrendamiento'];
    $fechaPrimerPago = $row['fecha_primer_pago'];
    $pagoTotal = $row['pago_total'];
    $mensualidad = $row['mensualidad'];
    $cofres = $row['cofres'];
    $serie = $row['serie'];
    $pagoMensualUnit = $row['pago_mensual_unit'];
    $recepcionDelCofre = $row['recepcion_del_cofre'];
    $numeroPedido = $row['numero_pedido'];
    $numeroFacturaCompra = $row['numero_factura_compra'];
    $fechaEmisionFactura = $row['fecha_emision_factura'];
    $valorFacturaUnit = $row['valor_factura_unit'];
    $propiedadETV = $row['propiedad_etv'];
    $entrega = $row['entrega'];
    $CECO = $row['CECO'];

    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update</title>
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
                <li><a href="listar_adquisiciones.php">Atrás</a></li>
                <li><i class="fas fa-edit"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
	</nav>

	<div class="" style="text-align: center;">   
    	<h5>Editar Adquisicion</h5>
    </div>

		<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">		
			<div class="col">
				<br>
  				<label class="registro" for="">Contrato de Arrendamiento</label><br>
				<input class="registro-input" type="text"  maxlength="21" name="contrato_arrendamiento" id="contrato_arrendamiento" value="<?php echo $contratoArrendamiento;?>"><br>

				<label class="registro" for="">Fecha del primer pago</label><br>
				<input class="registro-input" type="date" maxlength="15" name="fecha_primer_pago" id="fecha_primer_pago" value="<?php echo $fechaPrimerPago;?>"><br>

				<label class="registro" for="">Pago Total</label><br>
				<input class="registro-input" type="text" maxlength="15" name="pago_total" id="pago_total" value="<?php echo $pagoTotal;?>"><br>

				<label class="registro" for="">Mensualidad</label><br>
				<input class="registro-input" type="text" maxlength="15" name="mensualidad" id="mensualidad" value="<?php echo $mensualidad;?>"><br>

				<label class="registro" for="">Cofres</label><br>
				<input class="registro-input" type="text"  maxlength="3" name="cofres" id="cofres" value="<?php echo $cofres;?>"><br>

				

			</div>

			<div class="col">
				<br>

        <label class="registro" for="">No. de Serie</label><br>
				<input class="registro-input" type="text" maxlength="15" name="serie" id="serie" value="<?php echo $serie;?>" require><br>

				<label class="registro" for="">Pago Mensual Unit</label><br>
				<input class="registro-input" type="text" maxlength="15" name="pago_mensual_unit" id="pago_mensual_unit" value="<?php echo $pagoMensualUnit;?>"><br>

				<label class="registro" for="">Recepcion de Cofre</label><br>
				<input class="registro-input" type="date" maxlength="15" name="recepcion_del_cofre" id="recepcion_del_cofre" value="<?php echo $recepcionDelCofre;?>"><br>
		
				<label class="registro" for="">Numero de pedido</label><br>
				<input class="registro-input" type="text" maxlength="10" name="numero_pedido" id="numero_pedido" value="<?php echo $numeroPedido;?>"><br>

				<label class="registro" for="">Numero de factura de compra</label><br>
				<input class="registro-input" type="text" maxlength="10" name="numero_factura_compra" id="numero_factura_compra" value="<?php echo $numeroFacturaCompra;?>"><br>

				

			</div>

			<div class="col">
        <br>
        <label class="registro" for="">Fecha Emision de Factura</label><br>
				<input class="registro-input" type="date" maxlenght="15" name="fecha_emision_factura" id="fecha_emision_factura" value="<?php echo $fechaEmisionFactura;?>"><br>
		
				<label class="registro" for="">Valor de factura Unit USD</label><br>
				<input class="registro-input" type="text" maxlength="15" name="valor_factura_unit" id="valor_factura_unit" value="<?php echo $valorFacturaUnit;?>"><br>

				<label class="registro" for="">Propiedad ETV</label><br>
				<input class="registro-input" type="text" maxlength="9" name="propiedad_etv" id="propiedad_etv" value="<?php echo $propiedadETV;?>"><br>

				<label class="registro" for="">Entrega ETV</label><br>
				<input class="registro-input" type="date" maxlength="15" name="entrega" id="entrega" value="<?php echo $entrega;?>"><br>

        <label class="registro" for="">CECO</label><br>
				<input class="registro-input" type="text" maxlength="20" name="CECO" id="CECO" value="<?php echo $CECO;?>"><br>

			</div>
		</div>
    <div class="row">
			<div class="col"><br>
                <input type="hidden" name="id" value="<?php echo $id; echo "se genero id con get"; ?>">
				<input style="margin: auto;" type="submit" value="Update"><br>
			</div>
		</div>
        <br>
        <div class="row">
            <div class="col">
                <?php 
                    if($result){
                        echo '<div class="alert alert-success" role="alert">' . $estatusOp; 
                        }  
                ?>
            
            </div>
        </div>

	</div>
	</body>

</html>