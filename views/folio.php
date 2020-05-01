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
    </div>
	<form action="" method="POST">
	<div class="container" style="margin:auto;">
		<div class="row">		
			<div class="col">
				<br>

				<label class="registro" for="">Folio</label><br>
				<input class="registro-input" type="text" maxlength="15" name="folio" value=""><br>

				<label class="registro" for="">Recibe reporte</label><br>
				<input class="registro-input" type="text" maxlength="35" name="recibe_reporte" id="razonsocial" value=""><br>

				<label class="registro" for="">Reporta fallo</label><br>
				<input class="registro-input" type="text" maxlength="35" name="reporta_fallo" value=""><br>

				<label class="registro" for="">Medio de Reporte</label><br>
				<input class="registro-input" type="text"  maxlength="15" name="medio_de_reporte" value=""><br>

				<label class="registro" for="">Del daño</label><br>
                <input class="registro-input" type="text" maxlength="15" name="del_daño" value=""><br>	

			</div>

			<div class="col">
				<br>

                <label class="registro" for="">Cliente</label><br>
				<input class="registro-input" type="text" maxlength="30" name="cliente" value=""><br>

				<label class="registro" for="">Sucursal Cliente</label><br>
				<input class="registro-input" type="text" maxlength="20" name="sucursal_cliente" value=""><br>
		
				<label class="registro" for="">Equipo</label><br>
				<input class="registro-input" type="text" maxlength="15" name="equipo" value=""><br>

				<label class="registro" for="">Serie</label><br>
				<input class="registro-input" type="text" maxlength="20" name="serie" value=""><br>

				<label class="registro" for="">Proveedor</label><br>
				<input class="registro-input" type="text" maxlenght="20" name="proveedor" value=""><br>
		
            </div>

            <div class="col">
                <br>

				<label class="registro" for="">Sucursal</label><br>
				<input class="registro-input" type="text" maxlength="20" name="sucursal" value=""><br>

				<label class="registro" for="">Banco</label><br>
				<input class="registro-input" type="text" maxlength="20" name="banco" value=""><br>

                <label class="registro" for="">Division</label><br>
				<input class="registro-input" type="text" maxlength="15" name="division" value=""><br>

                <label class="registro" for="">Estatus</label><br>
                <input class="registro-input" type="text" maxlength="15" name="estatus" value=""><br>

                <label class="registro" for="">Cierra Folio</label><br>
                <input class="registro-input" type="text" maxlength="35" name="cierra_folio" value=""><br>

            </div>
			
			<div class="col">
				<br>
				

				<label class="registro" for="">Fecha/Hora de reporte</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_reporte" value=""><br>

				<label class="registro" for="">Fecha/Hora de cita</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_cita" value=""><br>

				<label class="registro" for="">Fecha/Hora de llegada</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_llegada" value=""><br>
                
                <label class="registro" for="">Fecha/Hora de termino</label><br>
				<input class="registro-input" type="datetime-local" maxlength="6" name="datetime_termino" value=""><br>		
		
                <label class="registro" for="">Tir</label><br>
				<input class="registro-input" type="datetime-local" maxlength="8" name="tir" value=""><br>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<br>
                <label class="registro" for="">Falla</label><br>
				<input class="registro-direccion" type="costo" maxlength="50" name="falla" value=""><br>
            </div>

  
            <div class="col">
                <br>    
				<label class="registro" for="">Solucion</label><br>
				<input class="registro-direccion" type="costo" maxlength="150" name="solucion" value=""><br><br>

			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<label class="registro" for="">Piezas proveedor</label><br>
				<input class="registro-direccion" type="costo" maxlength="100" name="piezas_proveedor" value=""><br>
			</div>

  
            <div class="col">

				<label class="registro" for="">Piezas Sepsa</label><br>
				<input class="registro-direccion" type="costo" maxlength="100" name="piezas_sepsa" value=""><br>
			</div>
        </div>
		<br>
		<div class="row">
			<div class="col">
                <input type="hidden" name="id" value="">
				<input style="margin: auto;" type="submit" value="Update"><br>
			</div>
		</div>
        <br>

<!--         <?php 
    if($result){
        echo '<div class="alert alert-success" role="alert">' . $estatusOp; 
        }  
    ?> -->

	</div>
	</body>

</html>