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
    // error_reporting(E_ALL ^ E_NOTICE); 

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


    echo '<table border="1px" style="width: 300px; height: 300px;text-align: center; margin: auto; margin-top:1px;width: 600px; font-size: 11px">
    <th bgcolor="#0070C0"; colspan="4">FICHA DE REPORTE</th>
    <tr>
      <td bgcolor="#C5D9F1" style="width: 200px;">Folio CAMCE</td>
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

    </table>';

    
    $archivo=glob("../Operaciones/Ordenes/".str_replace("/","",$row['folio'])."*");

    // if(strlen(basename($archivo[0]))>0){
    //   echo "Existe el archivo";
    // }
    

    if(strpos(basename($archivo[0]),'pdf') or strpos(basename($archivo[0]),'PDF')){
      $nombrePDF=basename($archivo[0]);
    }
    else{
      $nombreIMG=basename($archivo[0]);
    }

    ?> 

    <p></p>
    <div style="width: 600px; text-align: left; margin: auto; margin-top:1px;font-size: 11px">
      
    <table border="1px" style="width: 300px; height: 300px;text-align: center; margin: auto; margin-top:1px;width: 600px; font-size: 11px">
    <th bgcolor="#0070C0"; colspan="2">CAPTURA DE HOJA DE SERVICIO</th>
    <tr>
      <td bgcolor="#C5D9F1" style="width: 65px;">SOLUCION DEL REPORTE:</td>
      <td style="width: 200px;"><b><?=" ".$row['solucion'];?></td> 

    </tr>
    <tr>
      <td bgcolor="#C5D9F1" >ESTATUS DEL EQUIPO:</td>
      <td><b><?=" ".$row['asesoria_telefonica'];?></b></td> 

    </tr>
    <tr>
      <td bgcolor="#C5D9F1" >PIEZAS NECESARIAS:</td>
      <td><b><?=" ".$row['piezas_proveedor'];?></td> 
    </tr>
    <tr>
      <td bgcolor="#C5D9F1" >TIPO DEL CAMBIO:</td>
      <td><b><?=" ".$row['del_dano'];?></b></td> 
    </tr>

    <tr>
      <td bgcolor="#C5D9F1" rowspan="1">HORA DE LLEGADA:</td>
      <td colspan="3"><b><?=" ".$row['datetime_llegada'];?></b></td>
    </tr>
    <tr>
      <td bgcolor="#C5D9F1" rowspan="1">HORA DE SALIDA:</td>
      <td colspan="3"><b><?=" ".$row['datetime_termino'];?></b></td>
    </tr>
    <tr>
      <td bgcolor="#C5D9F1" rowspan="1">NOMBRE DEL INGENIERO:</td>
      <td colspan="3"><b><?=" ".$row['ingeniero'];?></b></td>
    </tr>
    <tr>
      <td bgcolor="#C5D9F1" rowspan="1">NOMBRE DEL CLIENTE QUE FIRMA:</td>
      <td colspan="3"><b><?=" ".$row['piezas_sepsa'];?></b</td>
    </tr>
    </table>


        <!-- SOLUCION DEL REPORTE: <b><?=" ".$row['solucion'];?></b><br>
        ESTATUS DEL EQUIPO: <b><?=" ".$row['asesoria_telefonica'];?></b><br>
        PIEZAS NECESARIAS: <b><?=" ".$row['piezas_proveedor'];?></b><br>
        TIPO DEL CAMBIO: <b><?=" ".$row['del_dano'];?></b><br>
        HORA DE LLEGADA: <b><?=" ".$row['datetime_llegada'];?></b><br>
        HORA DE SALIDA: <b><?=" ".$row['datetime_termino'];?></b><br>
        NOMBRE DEL INGENIERO: <b><?=" ".$row['ingeniero'];?></b><br>
        NOMBRE DEL CLIENTE QUE FIRMA: <b><?=" ".$row['piezas_sepsa'];?></b><br> -->

    </div>
    
    <p></p>


      <div style="text-align: center; margin: auto;">
      <img src="../Operaciones/Ordenes/<?=$nombreIMG?>" width="600px" alt="">
      <br>
      <object clas="pdfview" data="../Operaciones/Ordenes/<?=$nombrePDF?>" type="application/pdf" width="600px" height="750px"></object>
      </div>


    </body>
    </html>
