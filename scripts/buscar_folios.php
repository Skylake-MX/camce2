<?php
    require_once 'connect.php';
    require_once 'user_session.php';
	require_once 'user.php';

 	error_reporting(E_ALL ^ E_NOTICE); 
    session_start();
    $currentUser = new User();
    $currentUser->setUser($_SESSION['user']);
    $localidad = $currentUser->getLocalidad();
    $privilegio = $currentUser->getPrivilegio();
    $likeUser = $currentUser->getNombre();

    if($privilegio=="administrador"){


     }

    $salida="";

    if($privilegio=="tecnico"){ 
        $query = "SELECT * FROM bitacora WHERE ingeniero LIKE '%" . $likeUser . "%' ORDER By folio asc";
    }
    else{
        $query = "SELECT * FROM bitacora ORDER By folio asc";
    }

    //$query = "SELECT * FROM bitacora ORDER By datetime_reporte DESC";

    if(isset($_POST['consulta'])){
        $q=$_POST['consulta'];
        
        $query = "SELECT *  FROM bitacora WHERE 
                folio LIKE '%" . $q . "%' OR
                cliente LIKE '%" . $q . "%' OR
                sucursal_cliente LIKE '%" . $q . "%' OR
                equipo LIKE '%" . $q . "%' OR
                serie LIKE '%" . $q . "%' OR
                proveedor LIKE '%" . $q . "%' OR
                sucursal LIKE '%" . $q . "%' OR
                empresa LIKE '%" . $q . "%' OR
                banco LIKE '%" . $q . "%' OR
                division LIKE '%" . $q . "%' OR
                falla LIKE '%" . $q . "%' OR
                solucion LIKE '%" . $q . "%' OR
                del_dano LIKE '%" . $q . "%' OR
                estatus LIKE '%" . $q . "%' OR
                ingeniero LIKE '%" . $q . "%'";
        
    }   
        
    $queryResult = $pdo->query($query);


    echo "<div class='resultado' style='margin-left: 10%; margin-top: 2%'><label for='resultado'>" . $queryResult->rowCount() . "  Resultados</label></div>";    


        if(true){

            $salida.="<table class='table' style='margin:auto; margin-top:2%; width: 80%; font-size: 11px;'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>FOLIO</th>
                                <th scope='col'>CLIENTE</th>
                                <th scope='col'>SERIE</th>
                                <th scope='col'>ETV</th>
                                <th scope='col'>SUCURSAL GSI</th>
                                <th scope='col'>REPORTE</th>
                                <th scope='col'>FECHA DE REPORTE</th>
                                <th scope='col'>FECHA DE CITA</th>
                                <th scope='col'>ESTATUS</th>
                                <th scope='col'>VER</th>
                                <th scope='col'>CERRAR</th>
                            </tr>
                        </thead>
                        <tbody>";
            
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC )){
                $archivo=glob("../Operaciones/Ordenes/".str_replace("/","",$fila['folio'])."*");

                $salida.="<tr>
                            <td>".$fila['folio']."</td>
                            <td>".$fila['cliente']."/".$fila['sucursal_cliente']."</td>
                            <td>".$fila['serie']."</td>
                            <td>".$fila['empresa']."</td>
                            <td>".$fila['sucursal']."</td>
                            <td>".$fila['falla']."</td>
                            <td>".$fila['datetime_reporte']."</td>
                            <td>".$fila['datetime_cita']."</td>
                            <td>".$fila['estatus']."</td>
                            <td><a href='ficha.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-eye'></i></a></td>
                            <td><a href='cerrar_folio.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-edit'></i></a></td> 
                        </tr>";
            }
            $salida.="</tbody></table>";           
        }
        echo $salida;
?>