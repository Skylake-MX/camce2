<!-- <?php
var_dump($_POST);
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
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
      Administración CAMCE
    </nav>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="images/user.png" th:src="@{/img/user.png}"/>
                </div>
                <form action="" class="col-12" method="post">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de Usuario" name="username"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password"/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
                  </form>
                  <!-- <div class="col-12 forgot">
                    <a href="#">Agregar Usuario</a>
                  </div> -->
                  </div>
            </div>
        </div>
        <?php
           if(isset($errorLogin)){
            echo '<div class="alert alert-danger text-center" role="alert">' . $errorLogin;
           }
         ?>
    </div>

    <footer class="page-footer font-small indigo">
        <div class="container" style="margin: auto;">
            <hr class="rgba-white-light" style="margin: 0 15%;">
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
                <div class="col-md-10 col-12 mt-5">
                    <p style="line-height: 1.5rem">Dr. Barragán No. 160, Col. Doctores, México D.F. Tels: 01 (55) 5134-2204, 5134-2284 y 5761-2612</p>
                </div>
            </div>
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 0% 10% 0%;">
      </div>
      <div class="footer-copyright text-center py-3">
          <a href="http://www.gruposepsa.com.mx/"> www.gruposepsa.com.mx</a>
      </div>
    </footer>

</body>
</html>
