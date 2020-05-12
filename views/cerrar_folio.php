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

        $sqlDireccion="SELECT direccion FROM base WHERE serie=:serie";
        $queryDireccion=$pdo->prepare($sqlDireccion);
        $queryDireccion->execute([
            'serie'=>$_POST['serie']
        ]);

        $rowDireccion=$queryDireccion->fetch(PDO::FETCH_ASSOC);

        $newTir = $_POST['tir'];
        $newSolucion  = $_POST['solucion'];
        $newPiezasProveedor  = $_POST['piezas_proveedor'];
        $newPiezasSepsa  = $_POST['piezas_sepsa'];
        $newDelDaño  = $_POST['del_dano'];
        $newEstatus  = $_POST['estatus'];
        $newDatetimeDeLlegada  = $_POST['datetime_llegada'];
        $newDateTermino  = $_POST['datetime_termino'];
        $newCierraFolio  = $_POST['cierra_folio'];
        $newAsesoriaTelefonica=$_POST['asesoria_telefonica'];
        $newIngeniero=$_POST['ingeniero'];

        $sql = "UPDATE bitacora SET
            tir=:tir,
            solucion=:solucion,
            piezas_proveedor=:piezas_proveedor,
            piezas_sepsa=:piezas_sepsa,
            del_dano=:del_dano,
            estatus=:estatus,
            asesoria_telefonica=:asesoria_telefonica,
            datetime_llegada=:datetime_llegada,
            datetime_termino=:datetime_termino, 
            cierra_folio=:cierra_folio,
            ingeniero=:ingeniero WHERE id=:id";

        $query = $pdo->prepare($sql);

        $result = $query->execute([
            'id'=>$id,
            'tir'=>$newTir,
            'solucion'=>$newSolucion,
            'piezas_proveedor'=>$newPiezasProveedor,
            'piezas_sepsa'=>$newPiezasSepsa,
            'del_dano'=>$newDelDaño,
            'estatus'=>$newEstatus,
            'asesoria_telefonica'=>$newAsesoriaTelefonica,
            'datetime_llegada'=>$newDatetimeDeLlegada,
            'datetime_termino'=>$newDateTermino,
            'cierra_folio'=>$newCierraFolio,
            'ingeniero'=>$newIngeniero
            ]);

            $folioValue=$_POST['folio'];
            $fechaDeCitaValue=$_POST['datetime_cita'];
            $tirValue=$newTir;
            $clienteValue=$_POST['cliente'];
            $sucursalClienteValue=$_POST['sucursal_cliente'];
            $fallaValue=$_POST['falla'];
            $serieValue=$_POST['serie'];
            $proveedorValue=$_POST['proveedor'];
            $equipoValue=$_POST['equipo'];
            $direccionValue=$rowDireccion['direccion'];
            $solucionValue=$newSolucion;
            $piezasProveedorValue=$newPiezasProveedor;
            $piezasSepsaValue=$newPiezasSepsa;
            $delDañoValue=$newDelDaño;
            $estatusValue=$newEstatus;
            $asesoriaTelefonicaValue=$newAsesoriaTelefonica;
            $fechaDeLlegadaValue=$newDatetimeDeLlegada;
            $fechaDeTerminoValue=$newDateTermino;
            $CierraFolioValue=$newCierraFolio;
            $ingenieroValue=$newIngeniero;

            /* var_dump($result); */
            $estatusOp="El registro para " . $folioValue . " se actualizo correctamente. ";



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

        $folioValue=$row['folio'];
        $fechaDeCitaValue=$row['datetime_cita'];
        $tirValue=$row['tir'];
        $clienteValue=$row['cliente'];
        $sucursalClienteValue=$row['sucursal_cliente'];
        $fallaValue=$row['falla'];
        $serieValue=$row['serie'];
        $proveedorValue=$row['proveedor'];
        $equipoValue=$row['equipo'];
        $direccionValue=$rowDireccion['direccion'];
        $solucionValue=$row['solucion'];
        $piezasProveedorValue=$row['piezas_proveedor'];
        $piezasSepsaValue=$row['piezas_sepsa'];
        $delDañoValue=$row['del_dano'];
        $estatusValue=$row['estatus'];
        $asesoriaTelefonicaValue=$row['asesoria_telefonica'];
        $fechaDeLlegadaValue=$row['datetime_llegada'];
        $fechaDeTerminoValue=$row['datetime_termino'];
        $CierraFolioValue=$row['cierra_folio'];
        $ingenieroValue=$row['ingeniero'];
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
			    <input class="registro-input" type="text" maxlength="15" name="folio" value="<?php echo $folioValue; ?>" readonly><br>
            </div>
			
            <div class="col"><br>   

                <label class="registro" for="">Fecha/Hora de cita</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_cita" value="<?php echo $fechaDeCitaValue; ?>" readonly><br>
            </div>

            <div class="col"><br>
                <label class="registro" for="">Tir</label><br>
			    <input class="registro-input" type="text" maxlength="8" name="tir" value="<?php echo $tirValue; ?>"><br>
            </div>
        </div>

        <div class="row">
            <div class="col"><br>
                <label class="registro" for="">Cliente</label><br>
			    <input class="registro-input" type="text" maxlength="30" name="cliente" value="<?php echo $clienteValue; ?>" readonly><br> 
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Sucursal Cliente</label><br>
			    <input class="registro-input" type="text" maxlength="20" name="sucursal_cliente" value="<?php echo $sucursalClienteValue; ?>" readonly><br>
            
            </div>

            <div class="col"><br>
                <label class="registro" for="">Falla</label><br>
				<input class="registro-input" type="costo" maxlength="50" name="falla" value="<?php echo $fallaValue?>" readonly><br>
            
            </div>


        </div>
        <div class="row">

            <div class="col"><br>
                <label class="registro" for="">Serie</label><br>
				<input class="registro-input" type="text" maxlength="20" name="serie" value="<?php echo $serieValue; ?>" readonly><br>
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Proveedor</label><br>
				<input class="registro-input" type="text" maxlenght="20" name="proveedor" value="<?php echo $proveedorValue; ?>" readonly><br>
            
            </div>
            <div class="col"><br>
                <label class="registro" for="">Equipo</label><br>
				<input class="registro-input" type="text" maxlength="15" name="equipo" value="<?php $equipoValue; ?>" readonly><br>
            
            </div>
        
        </div>

        <div class="row">
            <div class="col">

           <br>
                <label class="registro" for="">Direccion</label><br>
			    <input class="registro-direccion" type="costo" maxlength="50" name="direccion" value="<?php echo $direccionValue; ?>" readonly><br>
            
            </div>
        
        </div>

        <div class="row">
            <div class="col"><br>
                <label class="registro" for="">Solucion</label><br>
			    <input class="registro-direccion" type="costo" maxlength="150" name="solucion" value="<?php echo $solucionValue; ?>"><br>
            </div>


        </div>

        <div class="row">

            <div class="col"><br>
                <label class="registro" for="">Piezas proveedor</label><br>
                <input class="registro-input" type="text" maxlength="50" name="piezas_proveedor" value="<?php echo $piezasProveedorValue; ?>"><br>

            </div>

            <div class="col"><br>
                <label class="registro" for="">Piezas Sepsa</label><br>
                <input class="registro-input" type="text" maxlength="50" name="piezas_sepsa" value="<?php echo $piezasSepsaValue; ?>"><br>

            </div>

            <!-- <div class="col"><br>
                <label class="registro" for="">Del daño</label><br>
                <input class="registro-input" type="text" maxlength="50" name="del_dano" value="<?php echo $newDelDaño; ?>"><br>	
            </div> -->

            <div class="col"><br>
                <label class="registro" style="padding-top: 10px;" for="">Del daño</label><br>
                <select type="text" style="width:185px;border:5px;font-size:19px;" onchange="this.style.width=200" name="del_dano">
							
                <?php

                $option1=NULL;
                $option1=NULL;
                $option1=NULL;

                switch($delDañoValue){

                    case "CLIENTE":     $option1="selected";
                                        break;

                    case "DESGASTE":    $option2="selected";
                                        break;

                    case "VANDALIZMO":  $option3="selected";
                                        break;
                }
                ?>

                <option value='' ></option>
                <option value='CLIENTE' <?=$option1;?>>CLIENTE</option>
                <option value='DESGASTE' <?=$option2;?>>DESGASTE</option>
                <option value='VANDALIZMO' <?=$option3;?>>VANDALIZMO</option>                       
				</select><br>
            </div>

        </div>

        <div class="row">

          <!--   <div class="col"><br>
            <label class="registro" for="">Estatus</label><br>
                <input class="registro-input" type="text" maxlength="15" name="estatus" value="<?php echo $estatusValue; ?>"><br>
            </div> -->

            <div class="col"><br>
                <label class="registro" style="padding-top: 10px;" for="">Estatus</label><br>
                <select type="text" style="width:185px;border:5px;font-size:19px;" onchange="this.style.width=200" name="estatus">
                            							
                <?php

                    $option1=NULL;
                    $option2=NULL;
                    $option3=NULL;
                    $option4=NULL;

                    switch($estatusValue){

                        case "CANCELADO":   $option1="selected";
                                            break;

                        case "CERRADO":     $option2="selected";
                                            break;

                        case "PENDIENTE":   $option3="selected";
                                            break;

                        case "PENDIENTE POR PIEZA":     $option4="selected";
                                                        break;
                    }
                ?>

                <option value='' ></option>
                <option value='CANCELADO' <?=$option1;?>>CANCELADO</option>
                <option value='CERRADO' <?=$option2;?>>CERRADO</option>
                <option value='PENDIENTE' <?=$option3;?>>PENDIENTE</option>                       
                <option value='PENDIENTE POR PIEZA' <?=$option4;?>>PENDIENTE POR PIEZA</option>  
                </select><br>
            </div>

            <div class="col"><br>
                
            <label class="registro" for="">Fecha/Hora de llegada</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_llegada" value="<?php echo $fechaDeLlegadaValue; ?>"><br>
            </div>

            <div class="col"><br>
            <label class="registro" for="">Fecha/Hora de termino</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_termino" value="<?php echo $fechaDeTerminoValue; ?>"><br>	    
            
            </div>
        
        </div>

        <div class="row">
            <div class="col"><br>
                <label class="registro" for="">Nombre del ingeniero </label><br>
                <input class="registro-input" type="text" maxlength="35" name="ingeniero" value="<?php echo $ingenieroValue; ?>"><br>	
            
            </div>
           <!--  <div class="col"><br>
                <label class="registro" for="">Valida en sitio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value=""><br>	
            
            </div> -->

            <div class="col"><br>
                <label class="registro" style="padding-top: 10px;" for="">Asesoria Telefonica</label><br>
                <select type="text" style="width:185px;border:5px;font-size:19px;" onchange="this.style.width=200" name="asesoria_telefonica">
                            							
                <?php

                    $option1=NULL;
                    $option2=NULL;

                    switch($asesoriaTelefonicaValue){

                        case "PROGRAMACION":   $option1="selected";
                                            break;

                        case "VANDALIZMO":     $option2="selected";
                                            break;
                    }
                ?>

                <option value='' ></option>
                <option value='PROGRAMACION' <?=$option1;?>>PROGRAMACION</option>
                <option value='VANDALIZMO' <?=$option2;?>>VANDALIZMO</option>
                </select><br>
            </div>

            <div class="col"><br>
                <label class="registro" for="">Cierra Folio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value="<?=$currentUser->getNombre();?>" readonly><br>	
            
            </div>
        </div>
        <div class="row">
            <div class="col"><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
				<input style="margin: auto;" type="submit" value="Update"><br>
            </div>
        </div>

        <div class="row">
            <div class="col"><br>   
                <?php 
                    if($result){
                        echo '<div class="alert alert-success" role="alert">' . $estatusOp; 
                        }  
                ?>
            
            </div>
        </div>
    </div>
    </form>          	
		
	</body>

</html>