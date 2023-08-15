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

            sleep(1);

            $sql="SELECT * FROM bitacora WHERE folio='".$folioValue."'";
            $query=$pdo->prepare($sql);
            $query->execute([
                'folio' => $folio
            ]);
            $row=$query->fetch(PDO::FETCH_ASSOC);
            //var_dump($row['id']);
    
            header( "refresh:5;url=ficha.php?id=".$row['id']);


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
    	<h5>CERRAR FOLIO: <?php echo $folioValue; ?></h5>
    </div>
	<form action="" method="POST">
	<div class="form" style="margin:0 auto; ">

			    <input class="registro-input" type="hidden" name="folio" value="<?php echo $folioValue; ?>" readonly><br>
			    <input class="registro-input" type="hidden" name="tir" value="<?php echo $tirValue; ?>"><br>

                
                <table border="1px" style="width: 300px; height: 300px;text-align: center; margin: auto; margin-top:1px;width: 500px; font-size: 11px">
                <th bgcolor="#0070C0"; colspan="2">INFORMACION GENERAL</th>
                <tr>
                    <td bgcolor="#C5D9F1">CLIENTE: </td>
                    <td><b><?php echo $clienteValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">SUCURSAL: </td>
                    <td><b><?php echo $sucursalClienteValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">DIRECCION: </td>
                    <td><b><?php echo $direccionValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">PROVEEDOR: </td>
                    <td><b><?php echo $proveedorValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">EQUIPO: </td>
                    <td><b><?php $equipoValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">NO. SERIE: </td>
                    <td><b><?php echo $serieValue; ?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">FALLA REPORTADA: </td>
                    <td><b><?php echo $fallaValue?></b></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">FECHA Y HORA DE CITA: </td>
                    <td><b><?php echo $fechaDeCitaValue; ?></b></td>
                </tr>
                <th bgcolor="#0070C0"; colspan="2">COMENTARIOS DE HOJA DE SERVICIO</th>
                <tr>
                    <td bgcolor="#C5D9F1">FECHA Y HORA DE LLEGADA: </td>
                    <td><input class="registro-input" type="datetime-local" style="width:185px;border:5px;font-size:11px;" maxlength="6" name="datetime_llegada" value="<?php echo $fechaDeLlegadaValue; ?>" required><br></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">FECHA Y HORA DE TERMINO: </td>
                    <td><input class="registro-input" type="datetime-local" style="width:185px;border:5px;font-size:11px;" maxlength="6" name="datetime_termino" value="<?php echo $fechaDeTerminoValue; ?>" required><br>	</td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">SOLUCION DEL PROBLEMA REPORTADO: </td>
                    <td><textarea name="solucion" rows="4" cols="41" value="<?php echo $solucionValue; ?>" required><?php echo $solucionValue; ?></textarea></td>
                </tr>

                <tr>
                    <td bgcolor="#C5D9F1">REFACCIONES REQUERIDAS: </td>
                    <td><input class="registro-input" type="text" style="width:185px;border:5px;font-size:11px;" name="piezas_proveedor" value="<?php echo $piezasProveedorValue; ?>"></td>
                </tr>

                <tr>
                    <td bgcolor="#C5D9F1">C. REFACCIONES POR: </td>
                    <td>                
                            <select type="text" style="width:185px; text-align: center; border:5px;font-size:11px;" onchange="this.style.width=200" name="del_dano">
							
                            <?php
            
                            $option1=NULL;
                            $option2=NULL;
            
                            switch($delDañoValue){
            
                                case "CLIENTE":     $option1="selected";
                                                    break;
            
                                case "DESGASTE":    $option2="selected";
                                                    break;
                            }
                            ?>
            
                            <option value='' ></option>
                            <option value='COTIZACION' <?=$option1;?>>GARANTIA</option>
                            <option value='GARANTIA' <?=$option2;?>>COTIZACION</option>                     
                            </select>
                            </td>
                </tr>

                <tr>
                    <td bgcolor="#C5D9F1">ESTATUS DEL EQUIPO: </td>
                    <td><select type="text" style="width:185px; text-align: center; border:5px;font-size:11px;" onchange="this.style.width=200" name="asesoria_telefonica" required>
                            							
                                                        <?php
                                        
                                                            $option1=NULL;
                                                            $option2=NULL;
                                        
                                                            switch($asesoriaTelefonicaValue){
                                        
                                                                case "EN OPERACION":   $option1="selected";
                                                                                    break;
                                        
                                                                case "FUERA DE SERVICIO":     $option2="selected";
                                                                                    break;
                                                            }
                                                        ?>
                                        
                                                        <option value='' ></option>
                                                        <option value='EN OPERACION' <?=$option1;?>>EN OPERACION</option>
                                                        <option value='FUERA DE SERVICIO' <?=$option2;?>>FUERA DE SERVICIO</option>
                                                        </select></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">NOMBRE DEL INGENIERO: </td>
                    <td><input class="registro-input" type="text" style="width:185px;border:5px;font-size:11px;" maxlength="35" name="ingeniero" value="<?php echo $currentUser->getNombre(); ?>" required></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">NOMBRE DEL CLIENTE QUE FIRMA OS: </td>
                    <td><input class="registro-input" type="text" style="width:185px;border:5px;font-size:11px;" maxlength="50" name="piezas_sepsa" value="<?php echo $piezasSepsaValue; ?>" required></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">ESTATUS DEL FOLIO: </td>
                    <td><select type="text" style="width:185px;text-align: center; border:5px;font-size:11px;" onchange="this.style.width=200" name="estatus" required>
                            							
                                                        <?php
                                        
                                                            $option1=NULL;
                                                            $option2=NULL;
                                                            $option3=NULL;
                                                            $option4=NULL;
                                        
                                                            switch($estatusValue){
                                        
                                                                case "PENDIENTE":   $option1="selected";
                                                                                    break;
                                        
                                                                case "PENDIENTE POR PIEZA":     $option2="selected";
                                                                                    break;
                                        
                                                                case "CANCELADO":   $option3="selected";
                                                                                    break;
                                        
                                                                case "PRE-CERRADO":     $option4="selected";
                                                                                                break;
                                                            }
                                                        ?>
                                        
                                                        <option value='' ></option>
                                                        <option value='PENDIENTE' <?=$option1;?>>PENDIENTE</option>
                                                        <option value='PENDIENTE POR PIEZA' <?=$option2;?>>PENDIENTE POR PIEZA</option>
                                                        <option value='CANCELADO' <?=$option3;?>>CANCELADO</option>                       
                                                        <option value='PRE-CERRADO' <?=$option4;?>>PRE-CERRADO</option>  
                                                        </select></td>
                </tr>
                <tr>
                    <td bgcolor="#C5D9F1">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
				        <input style="margin: auto;" type="submit" value="Update"></td>
                    <td>
                        <br>
                        <?php 
                        if($result){
                            echo '<div class="alert alert-success" role="alert">' . $estatusOp; 

                            }  
                        ?>
                    </td>
                </tr>

            </table>

			    <input class="registro-input" type="hidden" name="cliente" value="<?php echo $clienteValue; ?>" >
			    <input class="registro-input" type="hidden" name="sucursal_cliente" value="<?php echo $sucursalClienteValue; ?>" >
			    <input class="registro-direccion" type="hidden" name="direccion" value="<?php echo $direccionValue; ?>" >
				<input class="registro-input" type="hidden" name="proveedor" value="<?php echo $proveedorValue; ?>" >
				<input class="registro-input" type="hidden" name="equipo" value="<?php $equipoValue; ?>" >
				<input class="registro-input" type="hidden" name="serie" value="<?php echo $serieValue; ?>" >
				<input class="registro-input" type="hidden" name="falla" value="<?php echo $fallaValue?>" >
				<input class="registro-input" type="hidden" name="datetime_cita" value="<?php echo $fechaDeCitaValue; ?>" > 
                <!-- <label class="registro" for="">CIERRA FOLIO: </label> -->
                <input class="registro-input" type="hidden" maxlength="35" name="cierra_folio" value="<?=$currentUser->getNombre();?>" readonly><br>	
            



  

            
            <!-- <div class="col"><br>
                <label class="registro" for="">Del daño</label><br>
                <input class="registro-input" type="text" maxlength="50" name="del_dano" value="<?php echo $newDelDaño; ?>"><br>	
            </div> -->

          <!--   <div class="col"><br>
            <label class="registro" for="">Estatus</label><br>
                <input class="registro-input" type="text" maxlength="15" name="estatus" value="<?php echo $estatusValue; ?>"><br>
            </div> -->

           <!--  <div class="col"><br>
                <label class="registro" for="">Valida en sitio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value=""><br>	
            
            </div> -->

    </form>          	
		
	</body>

</html>