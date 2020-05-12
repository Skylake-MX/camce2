<?php

	include '../scripts/connect.php';
	include '../scripts/user_session.php';
	include '../scripts/user.php';

	error_reporting(E_ALL ^ E_NOTICE); 
	session_start();
	
	$q=str_ireplace(",", "", date("d,m,y"));
	$query="SELECT folio FROM bitacora WHERE folio LIKE '%" . $q . "%'";
	$query=$pdo->query($query);
	$query->rowCount();

	/* echo $query->rowCount(); */

	$contador=$query->rowCount() + 1;

	while(strlen($contador)<3){
		
		$contador="0".$contador;

	}
	$folioCAMCE= str_ireplace(",", "", date("d,m,y")) . "-" . $contador;

	$result=false;

	if(!empty($_POST)){

	}else{
		$id = $_GET['id'];

		$sql="SELECT * FROM base WHERE id=:id";
		$query=$pdo->prepare($sql);
		$query->execute([
			'id' => $id
		]);

	}

	$row=$query->fetch(PDO::FETCH_ASSOC);

	$currentUser = new User();
	$currentUser->setUser($_SESSION['user']);
	/* echo $currentUser->getPrivilegio(); 
 */	
	if(!empty($_POST)){
		$id=$_POST['id'];
		$folio=$_POST['camce'] . $_POST['folio'];
		$recibe_reporte=$_POST['recibe_reporte'];
		$reporta_fallo=$_POST['reporta_fallo'];
		$medio_de_reporte=$_POST['medio_de_reporte'];
		$cliente=$_POST['cliente'];
		$sucursal_cliente=$_POST['sucursal_cliente'];
		$equipo=$_POST['equipo'];
		$serie=$_POST['serie'];
		$proveedor=$_POST['proveedor'];
		$sucursal=$_POST['sucursal'];
		$banco=$_POST['banco'];
		$division=$_POST['division'];
		$datetime_reporte=$_POST['datetime_reporte'];
		$datetime_cita=$_POST['datetime_cita'];
		$estatus=$_POST['estatus'];
		$direccion=$_POST['direccion'];
		$falla=$_POST['falla'];

		$sql="INSERT INTO bitacora(id, folio, recibe_reporte, reporta_fallo, medio_de_reporte, cliente, sucursal_cliente, equipo, serie, proveedor, sucursal, banco, division, fecha, datetime_reporte, datetime_cita, falla, estatus) VALUES 
								(NULL, :folio, :recibe_reporte, :reporta_fallo, :medio_de_reporte, :cliente, :sucursal_cliente, :equipo, :serie, :proveedor, :sucursal, :banco, :division, current_timestamp(), :datetime_reporte, :datetime_cita, :falla, :estatus)";

		$query=$pdo->prepare($sql);
		$result=$query->execute([
			'folio'=>$folio,
			'recibe_reporte'=>$recibe_reporte,
			'reporta_fallo'=>$reporta_fallo,
			'medio_de_reporte'=>$medio_de_reporte,
			'cliente'=>$cliente,
			'sucursal_cliente'=>$sucursal_cliente,
			'equipo'=>$equipo,
			'serie'=>$serie,
			'proveedor'=>$proveedor,
			'sucursal'=>$sucursal,
			'banco'=>$banco,
			'division'=>$division,
			'datetime_reporte'=>$datetime_reporte,
			'datetime_cita'=>$datetime_cita,
			'falla'=>$falla,
			'estatus'=>$estatus
		]);

		$row['folio']=$folio;
		$row['recibe_reporte']=$recibe_reporte;
		$row['reporta_fallo']=$reporta_fallo;
		$row['medio_de_reporte']=$medio_de_reporte;
		$row['cliente']=$cliente;
		$row['sucursal_cliente']=$sucursal_cliente;
		$row['equipo']=$equipo;
		$row['serie']=$serie;
		$row['proveedor']=$proveedor;
		$row['sucursal']=$sucursal;
		$row['banco']=$banco;
		$row['division']=$division;
		$row['datetime_reporte']=$datetime_reporte;
		$row['datetime_cita']=$datetime_cita;
		$row['falla']=$falla;
		$row['estatus']=$estatus;

		$estatusOp="El folio " . $folio . " se creo correctamente ";
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
                <li><a href="crear_folio.php">Atrás</a></li>
                <li><i class="fas fa-edit"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
	</nav>
    <br>
	<div class="" style="text-align: center;">   
    	<h5>Crear folio</h5> 
		<form action="" method="POST">
			<div class="container" style="margin:auto;">
				<div class="row">		
					<div class="col">
						<br>

						<label class="registro" style="padding-top: 10px;" for="">CAMCE</label><br>
						<!-- <input class="registro-input" type="text"  maxlength="15" name="medio_de_reporte" value=""><br> -->

						<select type="text" style="width:185px;border:5px;font-size:19px" onchange="this.style.width=200" name="camce" required	>
							<option value="<?=NULL;?>"></option>
							<option value="CAMCE2-">CAMCE2</option>
        					<option value="CAMCE5-">CAMCE5</option>
      					</select><br>

						<label class="registro" style="padding-top: 10px;" for="">Folio</label><br>
						<input class="registro-input" type="text" maxlength="15" name="folio" value="<?=$folioCAMCE ?>" readonly><br>

						<label class="registro" for="">Recibe reporte</label><br>
						<input class="registro-input" type="text" maxlength="35" name="recibe_reporte" value="<?=$currentUser->getNombre();?>" readonly><br>

						<label class="registro" for="">Reporta fallo (cliente)</label><br>
						<input class="registro-input" type="text" maxlength="35" name="reporta_fallo" value="" required><br>

						<label class="registro" style="padding-top: 10px;" for="">Medio de Reporte</label><br>
						<!-- <input class="registro-input" type="text"  maxlength="15" name="medio_de_reporte" value=""><br> -->

						<select type="text" style="width:185px;border:5px;font-size:19px" onchange="this.style.width=200" name="medio_de_reporte" required	>
							<option value="<?=NULL;?>"></option>
							<option value="TELEFONO">TELEFONO</option>
        					<option value="CORREO">CORREO</option>
      					</select>

					</div>

					<div class="col">
						<br>

                		<label class="registro" for="">Cliente</label><br>
						<input class="registro-input" type="text" maxlength="30" name="cliente" value="<?=$row['razon_social']?>" readonly><br>

						<label class="registro" for="">Sucursal Cliente</label><br>
						<input class="registro-input" type="text" maxlength="20" name="sucursal_cliente" value="<?=$row['unidad_de_negocio']?>" readonly><br>
		
						<label class="registro" for="">Equipo</label><br>
						<input class="registro-input" type="text" maxlength="15" name="equipo" value="<?=$row['modelo']?>" readonly><br>

						<label class="registro" for="">Serie</label><br>
						<input class="registro-input" type="text" maxlength="20" name="serie" value="<?=$row['serie']?>" readonly><br>

						<label class="registro" for="">Proveedor</label><br>
						<input class="registro-input" type="text" maxlenght="20" name="proveedor" value="<?=$row['proveedor']?>" readonly><br>
		
            		</div>

            		<div class="col">
               			<br>

						<label class="registro" for="">Sucursal</label><br>
						<input class="registro-input" type="text" maxlength="20" name="sucursal" value="<?=$row['sucursal_gsi']?>" readonly><br>

						<label class="registro" for="">Banco</label><br>
						<input class="registro-input" type="text" maxlength="20" name="banco" value="<?=$row['banco']?>" readonly><br>

                		<label class="registro" for="">Division</label><br>
						<input class="registro-input" type="text" maxlength="15" name="division" value="<?=$row['division']?>" readonly><br>


            		</div>
			
					<div class="col">
						<br>
				
						<label class="registro" for="">Fecha/Hora de reporte</label><br>
						<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_reporte" value="" required><br>

						<label class="registro" for="">Fecha/Hora de cita</label><br>
						<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_cita" value="" required><br>

						<label class="registro" style="padding-top: 10px;" for="">Estatus</label><br>
            		    <!-- <input class="registro-input" type="text" maxlength="15" name="estatus" value=""><br> -->
						<select type="text" style="width:185px;border:5px;font-size:19px;" onchange="this.style.width=200" name="estatus" required> 
							<option value="<?=NULL;?>"></option>
							<option value="PENDIENTE">PENDIENTE</option>
        					<option value="PENDIENTE POR PIEZA">PENDIENTE POR PIEZA</option>
							<option value="CANCELADO">CANCELADO</option>
        					<option value="CERRADO">CERRADO</option>
      					</select>

					</div>
				</div>

				
				<div class="row">
					<div class="col">
						<br>
        		        <label class="registro" for="">Direccion</label><br>
						<input class="registro-direccion" type="text" maxlength="50" name="direccion" value="<?=$row['direccion']?>" readonly><br>
        			</div>
				</div>

				<div class="row">
					<div class="col">
						<br>
        		        <label class="registro" for="">Falla</label><br>
						<input class="registro-direccion" type="text" maxlength="50" name="falla" value="" required><br>
        			</div>
				</div>

				<div class="row">
					<div class="col">
						<br>
        		        <input type="hidden" name="id" value="<?php echo $id; ?>">
						<input style="margin: auto;" type="submit" value="Generar folio"><br>
					</div>
				</div>
			</div>
		</form>

		<?php 
    if($result){
        echo '<div class="alert alert-success" role="alert">' . $estatusOp; 
        }  
    ?> 
	</div>



	
	</body>

</html>