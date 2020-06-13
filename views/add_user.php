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
  <title>Agregar Usuario</title>
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
    <div value="nav_option">
      </option>
      <ul class="nav_lista">
        <li><a href="edit_users.php">Atrás</a></li>
        <form class="user-icon" id="add-user">
          <li></li>
        </form>
        <li><a href="../scripts/logout.php">Salir</a></li>
      </ul>
    </div>
  </nav>

  <div class="contenedor" style="display: flex; justify-content: center; align-items: center;  ">
    <form action="" class="add_user" method="post">
      <br>
      <label for="">
        <h5>Usuario Nuevo:</h5>
      </label><br><br>
      <div class="prueba"><label for="noEmpleado">No Empleado:</label><br></div>
      <input type="text" style="width:185px" class="destacado" name="noEmpleado" placeholder="Ej. 170744" required><br><br>
      <label for="username">Nombre:</label><br>
      <input type="text" style="width:185px" class="destacado" name="nombre" placeholder="1 Nombre 1 Apellido" required><br></br>
      <label for="username">Localidad:</label><br>
      <input type="text" style="width:185px" class="destacado" name="localidad" placeholder="Sucursal SEPSA" required><br><br>
      <label for="username">Email:</label><br>
      <input type="email" style="width:185px" class="destacado" name="email" placeholder="email@gruposepsa.com.mx" required><br><br>
      <label for="username">Privilegio:</label><br>
      <select type="text" style="width:185px" class="destacado" onchange="this.style.width=200" name="privilegio">
        <option value="Usuario" selected>Usuario</option>
        <option value="Administrador">Administrador</option>
        <option value="Tecnico">Tecnico</option>
      </select>
      <br>
      <br>
      <label for="password">Contraseña:</label><br>
      <input type="password" style="width:185px" name="password" placeholder="RFC" required><br></br>
      <input type="password" style="width:185px" name="c_password" placeholder="Confirma RFC" required><br></br>
      <p style="display: flex; justify-content: center; align-items: center;"><input type="submit" value="Añadir"></p>
      <br>
      </form>
  </div>
  
  <div class="container" style="margin: auto; ">
  <?php
        if (!empty($_POST)){
          $nombre = $_POST['nombre'];
          $password = $_POST['password'];
          $c_password = $_POST['c_password'];
          $privilegio = $_POST['privilegio'];
          $email = $_POST['email'];
          $localidad=$_POST['localidad'];
          $noEmpleado=$_POST['noEmpleado'];
          
          $passwordLength=strlen($_POST['password']);
          $queryUsername = "SELECT * FROM usuarios WHERE noEmpleado='".$noEmpleado."'";
          $queryResult=$pdo->query($queryUsername);
          $row=$queryResult->fetch(PDO::FETCH_ASSOC);

          if (($password == $c_password )&&($passwordLength>9)&&($row==false)){
            $sql = "INSERT INTO usuarios(id, noEmpleado, nombre, localidad, email, password, privilegio) VALUES (NULL, :noEmpleado, :nombre, :localidad, :email, :password, :privilegio)";
            $query = $pdo->prepare($sql);
            $query->execute([
              'noEmpleado'=>$noEmpleado,
              'nombre' => $nombre,
              'localidad'=> $localidad,
              'email'=> $email,
              'password' => $password,
              'privilegio' => $privilegio
            ]);
            $AddUser = "Se agrego usuario: " . $nombre . " correctamente";
            echo '<div class="alert alert-success" role="alert">' . $AddUser;
          }
          else{
            $errorAddUser="Verifica tus datos:";
            if($password != $c_password ) $errorAddUser=$errorAddUser." contraseña no coincide";
            if($passwordLength<10) $errorAddUser=$errorAddUser." el tamaño de contraseña es incorrecto";
            if($row!=false) $errorAddUser=$errorAddUser." el usuario ya existe.";
            echo '<div class="alert alert-danger" role="danger">' . $errorAddUser;
          }
        }
      ?>
  </div>

</body>

</html>