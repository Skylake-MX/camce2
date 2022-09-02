<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Base de Equipos</title>
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
                <li><i class="fas fa-file-alt"></i></li>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>

    <div class="" style="text-align: center; margin-top:2%;">   
    <h5>Base de datos</h5>
    </div>

    <label for="caja_busqueda" style="margin-left: 10%; margin-top: 2%;">Busqueda</label>
    <input type="text" name="caja_busqueda_equipos" id="caja_busqueda_equipos" placeholder="Id, Equipo, cliente.."></input>
    
    
    <a href="registro.php" style="padding-left:60%;"><i class="far fa-plus-square"></i><label for="agregar_registro" style="padding-left:5px;">Agregar registro</label> </a>
    <div id="datos_equipos"></div>


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/main_equipos.js"></script>
</body>
</html>