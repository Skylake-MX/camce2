<!-- <?php
var_dump($_POST);
require_once '../scripts/connect.php';
?>  -->



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
  <form action="" class="add_user" method="post">
      <br><label for=""><h5>Usuario Nuevo:</h5></label><br><br>
      <input type="text" style="width:185px" name="username"placeholder="Nombre de usuario"><br></br>
      <select type="text" style="width:185px;border:5px;font-size:19px" onchange="this.style.width=200" name="privilegio">
        <option value="usuario" selected>Usuario</option>
        <option value="administrador">Administrador</option>
        <option value="tecnico">Tecnico</option>
      </select>
      <br>
      <br>
      <input type="password" style="width:185px" name="password" placeholder="Contraseña"><br></br>
      <input type="password" style="width:185px"name="c_password" placeholder="Confirma Contraseña"><br></br>
      <p class="center"><input type="submit" value="Añadir"></p>
      <br>
      <?php
        if (!empty($_POST)){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $c_password = $_POST['c_password'];
          $privilegio = $_POST['privilegio'];
          if ($password == $c_password){
            $name = ucwords(str_replace ( "." , " " , $_POST['username']));
            $sql = "INSERT INTO usuarios(id, nombre, username, password, privilegio) VALUES (NULL, :nombre, :username, :password, :privilegio)";
            $query = $pdo->prepare($sql);
            $query->execute([
              'nombre' => $name,
              'username' => $username,
              'password' => $password,
              'privilegio' => $privilegio
            ]);
            $AddUser = "Se agrego usuario: " . $username . " correctamente";
            echo '<div class="alert alert-success" role="alert">' . $AddUser;
          }
          else{
            $errorAddUser = "La contraseña no coincide, verifica tus datos";
            echo '<div class="alert alert-danger" role="danger">' . $errorAddUser;
          }
        }       
      ?>
  </div>
</body>
</html>
