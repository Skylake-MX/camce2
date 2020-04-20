
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="views/login.css">
</head>
<body>
    <nav>
            Bienvenido <?php echo $user->getNombre();  ?>
    </nav>
    <div class="modal-dialog text-center">
    <br>
    <h5>¿Que deseas hacer?</h5>
    </div>
    <div class="list-group">
      <a href="scripts/logout.php" class="list-group-item list-group-item-action">Crear Folio</a>
      <a href="scripts/logout.php" class="list-group-item list-group-item-action">Cerrar Folio</a>
      <a href="views/registro.php" class="list-group-item list-group-item-action">Agregar Registro</a>
      <a href="views/edit_users.php" class="list-group-item list-group-item-action">Editar Usuario</a>
      <a href="scripts/logout.php" class="list-group-item list-group-item-action">Salir</a>
    </div>

</script>
</body>
</html>
