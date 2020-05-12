<?php


    include_once '../scripts/connect.php';
    $result=false;

    if(!empty($_POST)){

        $id=$_POST['id'];  
       /*  var_dump($id); */

        $newidEquipo  = $_POST['idequipo'];
        $newestatus  = $_POST['estatus'];
        $newrazonSocial  = $_POST['razonsocial'];
        $newsegmento  = $_POST['segmento'];
        $newunidadDeNegocio  = $_POST['unidaddenegocio'];
        $newcofreElectronico  = $_POST['cofreelectronico'];
        $newcapacidad  = $_POST['capacidad'];
        $newproveedor  = $_POST['proveedor'];
        $newmodelo  = $_POST['modelo'];
        $newserie  = $_POST['serie'];
        $newbanco  = $_POST['banco'];
        $newtipoDeAcreditacion  = $_POST['tipodeacreditacion'];
        $newcontenedor  = $_POST['contenedor'];
        $newempresa  = $_POST['empresa'];
        $newsucursalGsi  = $_POST['sucursalgsi'];
        $newdivision  = $_POST['division'];
        $newdireccion  = $_POST['direccion'];
        $newfechaDeInstalacion  = $_POST['fechadeinstalacion'];
        $newfechaDeRetiro  = $_POST['fechaderetiro'];
        $newcosto  = $_POST['costo'];

        $sql = "UPDATE base SET 
            id_equipo=:id_equipo,
            estatus=:estatus,
            razon_social=:razon_social,
            segmento=:segmento,
            unidad_de_negocio=:unidad_de_negocio,
            cofre_electronico=:cofre_electronico,
            capacidad=:capacidad,
            proveedor=:proveedor,
            modelo=:modelo,
            serie=:serie,
            banco=:banco,
            tipo_de_acreditacion=:tipo_de_acreditacion,
            contenedor=:contenedor,
            empresa=:empresa,
            sucursal_gsi=:sucursal_gsi,
            division=:division,
            direccion=:direccion,
            fecha_de_instalacion=:fecha_de_instalacion,
            fecha_de_retiro=:fecha_de_retiro,
            costo=:costo WHERE id=:id";

        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'id_equipo' => $newidEquipo,
            'estatus' => $newestatus,
            'razon_social' => $newrazonSocial,
            'segmento' => $newsegmento,
            'unidad_de_negocio' => $newunidadDeNegocio,
            'cofre_electronico' => $newcofreElectronico,
            'capacidad' => $newcapacidad,
            'proveedor' => $newproveedor,
            'modelo' => $newmodelo,
            'serie' => $newserie,
            'banco' => $newbanco,
            'tipo_de_acreditacion' => $newtipoDeAcreditacion,
            'contenedor' => $newcontenedor,
            'empresa' => $newempresa,
            'sucursal_gsi' => $newsucursalGsi,
            'division' => $newdivision,
            'direccion' => $newdireccion,
            'fecha_de_instalacion' => $newfechaDeInstalacion,
            'fecha_de_retiro' => $newfechaDeRetiro,
            'costo' => $newcosto
            ]);

            $idEquipoValue = $newidEquipo;
            $estatusValue = $newestatus;
            $razonSocialValue = $newrazonSocial;
            $segmentoValue = $newsegmento;
            $unidadDeNegocioValue = $newunidadDeNegocio;
            $cofreElectronicoValue = $newcofreElectronico;
            $capacidadValue = $newcapacidad;
            $proveedorValue = $newproveedor;
            $modeloValue = $newmodelo;
            $serieValue = $newserie;
            $bancoValue = $newbanco;
            $tipoDeAcreditacionValue = $newtipoDeAcreditacion;
            $contenedorValue = $newcontenedor;
            $empresaValue = $newempresa;
            $sucursalGsiValue = $newsucursalGsi;
            $divisionValue = $newdivision;
            $direccionValue = $newdireccion;
            $fechaDeInstalacionValue = $newfechaDeInstalacion;
            $fechaDeRetiroValue = $newfechaDeRetiro;
            $costoValue = $newcosto;

            /* var_dump($result); */
            $estatusOp="El registro para " . $idEquipoValue . " se actualizo correctamente. ";
    }
    else{
    $id = $_GET['id'];
    /* var_dump($id); */

    $sql="SELECT * FROM base WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);

    $row=$query->fetch(PDO::FETCH_ASSOC);

    $idEquipoValue = $row['id_equipo'];
    $estatusValue = $row['estatus'];
    $razonSocialValue = $row['razon_social'];
    $segmentoValue = $row['segmento'];
    $unidadDeNegocioValue = $row['unidad_de_negocio'];
    $cofreElectronicoValue = $row['cofre_electronico'];
    $capacidadValue = $row['capacidad'];
    $proveedorValue = $row['proveedor'];
    $modeloValue = $row['modelo'];
    $serieValue = $row['serie'];
    $bancoValue = $row['banco'];
    $tipoDeAcreditacionValue = $row['tipo_de_acreditacion'];
    $contenedorValue = $row['contenedor'];
    $empresaValue = $row['empresa'];
    $sucursalGsiValue = $row['sucursal_gsi'];
    $divisionValue = $row['division'];
    $direccionValue = $row['direccion'];
    $fechaDeInstalacionValue = $row['fecha_de_instalacion'];
    $fechaDeRetiroValue = $row['fecha_de_retiro'];
    $costoValue = $row['costo'];

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
                <li><a href="listar_cofres.php">Atrás</a></li>
                <li><i class="fas fa-edit"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
	</nav>

	<div class="" style="text-align: center;">   
    	<h5>Editar registro</h5>
    </div>
	<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">		
			<div class="col">
				<br>
  				<label class="registro" for="">Id Equipo</label><br>
				<input class="registro-input" type="text"  maxlength="20" name="idequipo" id="idequipo" value="<?php echo $idEquipoValue; ?>"><br>

				<label class="registro" for="">Estatus</label><br>
				<input class="registro-input" type="text" maxlength="20" name="estatus" id="estatus" value="<?php echo $estatusValue; ?>"><br>

				<label class="registro" for="">Razon social</label><br>
				<input class="registro-input" type="text" maxlength="20" name="razonsocial" id="razonsocial" value="<?php echo $razonSocialValue; ?>"><br>

				<label class="registro" for="">Segmento</label><br>
				<input class="registro-input" type="text" maxlength="20" name="segmento" id="segmento" value="<?php echo $segmentoValue; ?>"><br>

				<label class="registro" for="">Unidad de negocio</label><br>
				<input class="registro-input" type="text"  maxlength="20" name="unidaddenegocio" id="unidaddenegocio" value="<?php echo $unidadDeNegocioValue; ?>"><br>

				<label class="registro" for="">Cofre electronico</label><br>
				<input class="registro-input" type="text" maxlength="20" name="cofreelectronico" id="cofreelectronico" value="<?php echo $cofreElectronicoValue; ?>"><br>

			</div>

			<div class="col">
				<br>
				<label class="registro" for="">Capacidad</label><br>
				<input class="registro-input" type="text" maxlength="20" name="capacidad" id="capacidad" value="<?php echo $capacidadValue; ?>"><br>
		
				<label class="registro" for="">Proveedor</label><br>
				<input class="registro-input" type="text" maxlength="20" name="proveedor" id="proveedor" value="<?php echo $proveedorValue; ?>"><br>

				<label class="registro" for="">Modelo</label><br>
				<input class="registro-input" type="text" maxlength="20" name="modelo" id="modelo" value="<?php echo $modeloValue; ?>"><br>

				<label class="registro" for="">Serie</label><br>
				<input class="registro-input" type="text" maxlenght="40" name="serie" id="serie" value="<?php echo $serieValue; ?>"><br>
		
				<label class="registro" for="">Banco</label><br>
				<input class="registro-input" type="text" maxlength="20" name="banco" id="banco" value="<?php echo $bancoValue; ?>"><br>

				<label class="registro" for="">Tipo de Acreditacion</label><br>
				<input class="registro-input" type="text" maxlength="20" name="tipodeacreditacion" id="tipodeacreditacion" value="<?php echo $tipoDeAcreditacionValue; ?>"><br>

			</div>

			<div class="col">
				<br>
				<label class="registro" for="">Contenedor</label><br>
				<input class="registro-input" type="text" maxlength="20" name="contenedor" id="contenedor" value="<?php echo $contenedorValue; ?>"><br>

				<label class="registro" for="">Empresa</label><br>
				<input class="registro-input" type="text" maxlength="20" name="empresa" id="empresa" value="<?php echo $empresaValue; ?>"><br>

				<label class="registro" for="">Sucursal GSI</label><br>
				<input class="registro-input" type="text" maxlength="20" name="sucursalgsi" id="sucursalgsi" value="<?php echo $sucursalGsiValue; ?>"><br>

				<label class="registro" for="">Division</label><br>
				<input class="registro-input" type="text" maxlength="20" name="division" id="division" value="<?php echo $divisionValue; ?>"><br>		
		
			</div>
		</div>
		<div class="row">
			<div class="col">
				<br>
				<label class="registro" for="">Direccion</label><br>
				<input class="registro-direccion" type="costo" maxlength="80" name="direccion" id="direccion" value="<?php echo $direccionValue; ?>"><br><br>

			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<label class="registro" for="">Fecha de Instalacion</label><br>
				<input class="registro-input" type="date" maxlength="20" name="fechadeinstalacion" id="fechadeinstalacion" value="<?php echo $fechaDeInstalacionValue; ?>"><br>
			</div>

			<div class="col">
				<label class="registro" for="">Fecha de Retiro</label><br>
				<input class="registro-input" type="date" maxlength="20" name="fechaderetiro" id="fechaderetiro" value="<?php echo $fechaDeRetiroValue; ?>"><br>
			</div>

			<div class="col">
				<label class="registro" for="">Costo</label><br>
				<input class="registro-input" type="text" maxlength="20" name="costo" id="costo" value="<?php echo $costoValue; ?>"><br>		
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