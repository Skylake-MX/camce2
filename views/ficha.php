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

  <?php
// var_dump($_POST);
require_once '../scripts/connect.php';

if(!empty($_POST)){

  echo "post vacio";

}else{
  // var_dump($_GET['id']);
  $id = $_GET['id'];

  $sql="SELECT * FROM bitacora WHERE id=:id";
  $query=$pdo->prepare($sql);
  $query->execute([
    'id' => $id
  ]);

}

$row=$query->fetch(PDO::FETCH_ASSOC);

// var_dump($row);


echo '<table border="1px" style="width: 300px; height: 300px;text-align: center; margin: auto; margin-top:1px;width: 35%;">
<th bgcolor="#0070C0"; colspan="4">Ficha de reporte</th>
<tr>
  <td bgcolor="#C5D9F1" style="width: 200px;">Folio Camce</td>
  <td style="width: 200px;">'; echo $row['folio']; echo '</td> 
  <td bgcolor="#C5D9F1" style="width: 200px;">Fecha de Levantamiento</td>
  <td style="width: 200px;">'; echo $row['datetime_reporte']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" >Marca del Cofre</td>
  <td>'; echo $row['proveedor']; echo '</td> 
  <td bgcolor="#C5D9F1" >Cita Fecha programada</td>
  <td>'; echo $row['datetime_cita']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" >Numero de Serie</td>
  <td>'; echo $row['serie']; echo '</td> 
  <td bgcolor="#C5D9F1" >Cita Horario Establecido</td>
  <td>'; echo $row['datetime_llegada']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" >Monitor Camce</td>
  <td>'; echo $row['cierra_folio']; echo '</td> 
  <td bgcolor="#C5D9F1" >Ruta ETV</td>
  <td>NO</td>
</tr>

<tr>
  <td bgcolor="#C5D9F1" rowspan="2">Falla Reportada</td>
  <td colspan="3">Falla en Equipo</td>
</tr>
<tr>
  <td colspan="3">'; echo $row['falla']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" rowspan="1">Empresa GSI</td>
  <td colspan="3">'; echo $row['empresa']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" rowspan="1">Sucursal ETV</td>
  <td colspan="3">'; echo $row['sucursal']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" rowspan="1">Cliente GSI</td>
  <td colspan="3">'; echo $row['cliente']; echo '</td>
</tr>
<tr>
  <td bgcolor="#C5D9F1" rowspan="1">Sucursal Cliente</td>
  <td colspan="3">'; echo $row['sucursal_cliente']; echo '</td>
</tr>

</table>'

?> 

</body>
</html>
