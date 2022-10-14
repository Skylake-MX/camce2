<?php

    include_once '../scripts/connect.php';
    $result=false;
    $camce="";

    if(!empty($_POST)){
        $id=$_POST['id'];
        $camce="";
        $query = "SELECT * FROM bitacora WHERE id = '" . $id . "'";
        $queryResult=$pdo->query($query);
        $cliente = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $today=getdate();
        $y=$today['year'];
        $m=$today['mon'];
        $d=$today['mday'];
        $fecha=$y."-".$m."-".$d;
        
        $camce=$cliente['folio'];
        $razon=$cliente['cliente'];
        $unidad=$cliente['sucursal_cliente'];
        $serie=$cliente['serie'];
        $empresa=$cliente['empresa'];
        $sucursal=$cliente['sucursal'];
        

        $nombreTemporal=$_FILES['archivo']['tmp_name'];
        $nombre=basename($_FILES["archivo"]["name"]);
        $extension=substr($_FILES['archivo']['type'],strrpos($_FILES['archivo']['type'],'/')+1,0);
       /*  echo $_FILES['archivo']['type'];
        echo strrpos($_FILES['archivo']['type'],'/')+1; */

        if(!is_dir("../Operaciones/Ordenes")){
          mkdir("../Operaciones/Ordenes",0777);
          echo "HOLA";
        }

        if(move_uploaded_file($nombreTemporal,"../Operaciones/Ordenes/".$camce." ".$razon." ".$unidad." ".$serie." ".$empresa." ".$sucursal.".".substr($nombre, -(strlen($nombre)-strpos($nombre,'.')-1)))){
          echo "el archivo se subio correctamente";
        }
        else{
          echo "No se pudo subir archivo";
        }

    }
    else{
    $id = $_GET['id'];

    $query = "SELECT * FROM bitacora WHERE id = '" . $id . "'";
    $queryResult=$pdo->query($query);
    $cliente = $queryResult->fetch(PDO::FETCH_ASSOC);
    }
    
    if(!is_dir("../Operaciones")){
      mkdir("../Operaciones",0777) or die ( "No se puede crear carpeta");
    }
/*     else{
      echo "La carpeta Operaiones ya exitse";
    } */
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Subir Archivo</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="../views/uploadEstilos.css">
</head>
<body>
    <nav>
        <div value="nav_option"></option>
            <ul class="nav_lista">
                <li><a href="../views/listar_folios.php">Atrás</a></li>
                <li><i class="fas fa-cloud-upload-alt"></i></li>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
  <form action ="" class="resultado" method="post" enctype="multipart/form-data">
  <div class="upload">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4"><h7><?= $cliente['folio']. " " 
                                  . $cliente['cliente'] . " " 
                                  . $cliente['sucursal_cliente'] . " " 
                                  . $cliente['serie']?></h7></div>
      <div class="col-sm-4"></div>
      <br><br><br><br>
    </div>
   
    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-1"><label for="" class="etiqueta"></label></div>
      <div class="col-sm-1">
            <div class="folio"></div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <input type="file" name="archivo"></input>
            <br><br>
            <input type="submit" value="Upload"></input>
      </div>
      <div class="col-sm-5"></div>
    </div>
  </div>
  </form>
  
</body>
</html>