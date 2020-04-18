<!-- <?php
var_dump($_GET);

 ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add User</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <nav>
      <div value="nav_option"></option>
        <ul class="nav_lista">
            <li><a href="../index.php">Atrás</a></li>
            <form class="user-icon" id="add-user">
            <li></li>
            </form>
            <li><a href="../scripts/logout.php">Salir</a></li>
        </ul>
      </div>
  </nav>

  <div class="container">
  <form action="" class="add_user" method="get">
      <br><label for=""><h5>Usuario Nuevo:</h5></label><br><br>
      <input type="text" style="width:185px" name="username"placeholder="Nombre de usuario"><br></br>
      <select style="width:185px;border:5px;font-size:19px" onchange="this.style.width=200">
        <option value="value1" selected>Usuario</option>
        <option value="value2">Administrador</option>
        <option value="value3">Tecnico</option>
      </select>
      <br>
      <br>
      <input type="password" style="width:185px" name="password" placeholder="Contraseña"><br></br>
      <input type="password" style="width:185px"name="c_password" placeholder="Confirma Contraseña"><br></br>
      <p class="center"><input type="submit" value="Añadir"></p>
      <br>
  </form>
  </div>
</body>
</html>
