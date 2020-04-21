<!-- <?php
require_once '../scripts/connect.php';
$queryResult = $pdo->query("SELECT * FROM usuarios");
var_dump($_GET);
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Usuario</title>
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
                <li><i class="fas fa-address-book"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <div class="" style="text-align: center;">   
    <h5>Lista de usuarios</h5>
    </div>
    <table class="table" style="margin: auto; margin-top:2%;width: 35%">
    <thead class="thead-light">
        <tr>
            <th>
    <!--         <th scope="col">Nombre</th> -->
            <th scope="col">Usuario</th>
            <th scope="col">Privilegio</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    </tbody>
        <?php foreach($queryResult as $row): ?>
        <tr>
        <th scope="row"></th>
        <!--     <td>    <?=$row['nombre'];?>        </td> -->
            <td>    <?=$row['username'];?>      </td>
            <td>    <?=$row['privilegio'];?>    </td>
            <td> <a href="">Delete</a>          </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <br>
    <br>
    <div class="" style="text-align:center;"> <a href="add_user.php">Agregar Usuario</a></div>
</body>
</html