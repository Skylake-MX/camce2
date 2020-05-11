<?php

    include '../scripts/connect.php';
    include '../scripts/user_session.php';
	include '../scripts/user.php';

 	error_reporting(E_ALL ^ E_NOTICE); 
    session_start();
    $currentUser = new User();
    $currentUser->setUser($_SESSION['user']);


	$result=false;

	if(!empty($_POST)){

        $id=$_POST['id'];  
       /*  var_dump($id); */

        $newTir = $_POST['tir'];
        $newSolucion  = $_POST['solucion'];
        $newPiezasProveedor  = $_POST['piezas_proveedor'];
        $newPiezasSepsa  = $_POST['piezas_sepsa'];
        $newDelDaño  = $_POST['del_daño'];
        $newEstatus  = $_POST['estatus'];
        $newDatetimeDeLlegada  = $_POST['datetime_llegada'];
        $newDateTermino  = $_POST['datetime_termino'];
        $newCierraFolio  = $_POST['cierra_folio'];

        $sql = "UPDATE bitacora SET 
            tir=:tir,
            solucion=:solucion,
            piezas_proveedor=:piezas_proveedor,
            piezas_sepsa=:piezas_sepsa,
            del_daño=:del_daño,
            estatus=:estatus,
            datetime_llegada=:datetime_llegada,
            datetime_termino=:date_termino,
            cierra_folio=:cierra_folio WHERE id=:id";

        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id,
            'tir' => $tir,
            'solucion'=>$solucion,

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
            $estatusOp="El registro para " . $idEquipoValue . " se actualizo correctamente ";



	}else{
		$id = $_GET['id'];

		$sql="SELECT * FROM bitacora WHERE id=:id";
		$query=$pdo->prepare($sql);
		$query->execute([
			'id' => $id
        ]);
        
        $row=$query->fetch(PDO::FETCH_ASSOC);
        
        $sqlDireccion="SELECT direccion FROM base WHERE serie=:serie";
        $queryDireccion=$pdo->prepare($sqlDireccion);
        $queryDireccion->execute([
            'serie'=>$row['serie']
        ]);

        $rowDireccion=$queryDireccion->fetch(PDO::FETCH_ASSOC);

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear Folio</title>
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
                <li><a href="listar_folios.php">Atrás</a></li>
                <li><i class="fas fa-edit"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
	</nav>
    <br>
	<div class="" style="text-align: center;">   
    	<h5>Cerrar folio</h5>
    </div>
	<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">	

            <div class="col"><br>
            <label class="registro" for="">Folio</label><br>
			    <input class="registro-input" type="text" maxlength="15" name="folio" value="<?=$row['folio']?>" readonly><br>
            </div>
			<div class="col"><br>
                

                <label class="registro" for="">Fecha/Hora de cita</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_cita" value="<?=$row['datetime_cita']?>" readonly><br>
            </div>

            <div class="col"><br>
                <label class="registro" for="">Tir</label><br>
			    <input class="registro-input" type="text" maxlength="8" name="tir" value=""><br>
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label class="registro" for="">Cliente</label><br>
			    <input class="registro-input" type="text" maxlength="30" name="cliente" value="<?=$row['cliente']?>" readonly><br> 
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Sucursal Cliente</label><br>
			    <input class="registro-input" type="text" maxlength="20" name="sucursal_cliente" value="<?=$row['sucursal_cliente']?>" readonly><br>
            
            </div>

            <div class="col"><br>
                <label class="registro" for="">Falla</label><br>
				<input class="registro-input" type="costo" maxlength="50" name="falla" value="<?=$row['falla']?>" readonly><br>
            
            </div>


        </div>
        <div class="row">

            <div class="col"><br>
                <label class="registro" for="">Serie</label><br>
				<input class="registro-input" type="text" maxlength="20" name="serie" value="<?=$row['serie']?>" readonly><br>
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Proveedor</label><br>
				<input class="registro-input" type="text" maxlenght="20" name="proveedor" value="<?=$row['proveedor']?>" readonly><br>
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Equipo</label><br>
				<input class="registro-input" type="text" maxlength="15" name="equipo" value="<?=$row['equipo']?>" readonly><br>
            
            </div>
        
        </div>

        <div class="row">
            <div class="col">

           <br>
                <label class="registro" for="">Direccion</label><br>
			    <input class="registro-direccion" type="costo" maxlength="50" name="direccion" value="<?=$rowDireccion['direccion']?>" readonly><br>
            
            </div>
        
        </div>

        <div class="row">
            <div class="col"><br>
                <label class="registro" for="">Solucion</label><br>
			    <input class="registro-direccion" type="costo" maxlength="50" name="solucion" value=""><br>
            </div>


        </div>

        <div class="row">

            <div class="col"><br>
                <label class="registro" for="">Piezas proveedor</label><br>
                <input class="registro-input" type="text" maxlength="50" name="piezas_proveedor" value=""><br>

            </div>

            <div class="col"><br>
                <label class="registro" for="">Piezas Sepsa</label><br>
                <input class="registro-input" type="text" maxlength="50" name="piezas_sepsa" value=""><br>

            </div>

            <div class="col"><br>
                <label class="registro" for="">Del daño</label><br>
                <input class="registro-input" type="text" maxlength="50" name="del_daño" value=""><br>	
            </div>

        </div>


        <div class="row">

            <div class="col"><br>
            <label class="registro" for="">Estatus</label><br>
                <input class="registro-input" type="text" maxlength="15" name="estatus" value=""><br>
            </div>


            <div class="col"><br>
                
            <label class="registro" for="">Fecha/Hora de llegada</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_llegada" value=""><br>
            </div>

            <div class="col"><br>
            <label class="registro" for="">Fecha/Hora de termino</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_termino" value=""><br>	    
            
            </div>
        
        </div>

        <div class="row">
        <div class="col"><br>
                <label class="registro" for="">Nombre del ingeniero </label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value=""><br>	
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Valida en sitio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value=""><br>	
            
            </div>

            <div class="col"><br>
                <label class="registro" for="">Cierra Folio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value="<?=$currentUser->getNombre();?>" readonly><br>	
            
            </div>
        </div>
    </div>          	
		
	</body>

</html>