<!-- <?php
require_once '../scripts/connect.php';
$queryResult = $pdo->query("SELECT * FROM base");
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
                <li><i class="fas fa-database"></i></li>
                </form>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <div class="" style="text-align: center;">   
    <h5>Lista de equipos</h5>
    </div>
    <table class="table" style="margin: auto; margin-top:2%;width: 35%">
    <thead class="thead-light">
        <tr>
            <th>
         <!--    <th scope="col">id(base)</th> -->
            <th scope="col">Id Equipo</th>
            <th scope="col">Estatus</th>
            <th scope="col">Razon Social</th>
            <th scope="col">Segmento</th>
            <th scope="col">Unidad de Negocio</th>
          <!--   <th scope="col">Cofre electronico</th> -->
            <th scope="col">Capacidad</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Modelo</th>
            <th scope="col">Serie</th>
            <th scope="col">Banco</th>
            <th scope="col">Tipo de Acreditacion</th>
          <!--   <th scope="col">Contenedor</th> -->
        <!--     <th scope="col">Empresa</th> -->
            <th scope="col">Sucursal GSI</th>
        <!--     <th scope="col">Division</th> -->
            <th scope="col">Direccion</th>
        <!--     <th scope="col">Fecha de Instalacion</th> -->
         <!--    <th scope="col">Fecha de retiro</th> -->
        <!--     <th scope="col">Costo</th>   -->       
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>          
        </tr>
    </thead>
    </tbody>
        <?php //var_dump($queryResult); 
        foreach($queryResult as $row): ?>
     
        <tr>
        <th scope="row"></th>
         <!--    <td>    <?=$row['id'];?>                </td>  -->
            <td>    <?=$row['id_equipo'];?>         </td>
            <td>    <?=$row['estatus'];?>           </td>
            <td>    <?=$row['razon_social'];?>      </td>
            <td>    <?=$row['segmento'];?>          </td>
            <td>    <?=$row['unidad_de_negocio'];?> </td>
            <!-- <td>    <?=$row['cofre_electronico'];?> </td> -->
            <td>    <?=$row['capacidad'];?>         </td>
            <td>    <?=$row['proveedor'];?>         </td>
            <td>    <?=$row['modelo'];?>            </td>
            <td>    <?=$row['serie'];?>             </td>
            <td>    <?=$row['banco'];?>             </td>
            <td>    <?=$row['tipo_de_acreditacion'];?>    </td>
          <!--   <td>    <?=$row['contenedor'];?>        </td> -->
            <!-- <td>    <?=$row['empresa'];?>           </td> -->
            <td>    <?=$row['sucursal_gsi'];?>      </td>
          <!--   <td>    <?=$row['division'];?>          </td> -->
            <td>    <?=$row['direccion'];?>         </td>
            <!-- <td>    <?=$row['fecha_de_instalacion'];?>    </td> -->
            <!-- <td>    <?=$row['fecha_de_retiro'];?>   </td> -->
            <!-- <td>    <?=$row['costo'];?>             </td> -->
            <td> <a href="update_registro.php?id=<?=$row['id']?>"><i class="fas fa-edit"></a></td>
            <td> <a href="#" onclick="preguntar(<?php echo $row['id']?>)"><i class="fas fa-trash-alt"></a></td>            
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    
    <script type="text/javascript">
            function preguntar(id){
                if(confirm('¿Estas seguro que deseas eliminar este registro?')){
                    window.location.href = "../scripts/delete_registro.php?id=<?=$row['id']?>";
                }
            }
    </script>

    <br>
    <br>
</body>
</html