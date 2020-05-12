<?php

    require_once 'connect.php';
    $salida="";

    $query = "SELECT * FROM bitacora ORDER By folio DESC";

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
                banco LIKE '%" . $q . "%' OR
                division LIKE '%" . $q . "%' OR
                falla LIKE '%" . $q . "%' OR
                solucion LIKE '%" . $q . "%' OR
                del_dano LIKE '%" . $q . "%' OR
                estatus LIKE '%" . $q . "%'";
        
    }   
        
    $queryResult = $pdo->query($query);


    echo "<div class='' style='margin-left: 20%; margin-top: 2%'><label for='resultado'>" . $queryResult->rowCount() . "  Resultados</label></div>";    


        if(true){

            $salida.="<table class='table' style='margin:auto; margin-top:1%; width: 60%'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>Folio</th>
                                <th scope='col'>ID</th>
                                <th scope='col'>Razon Social</th>
                                <th scope='col'>Sucursal</th>
                                <th scope='col'>Falla</th>
                                <th scope='col'>Fecha de reporte</th>
                                <th scope='col'>Fecha de cita</th>
                                <th scope='col'>Estatus</th>
                                <th scope='col'>Ver</th>
                                <th scope='col'>Cerrar</th>
                            </tr>
                        </thead>
                        <tbody>";
            
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC )){
                $salida.="<tr>
                            <td>".$fila['folio']."</td>
                            <td>".$fila['serie']."</td>
                            <td>".$fila['cliente']."</td>
                            <td>".$fila['sucursal']."</td>
                            <td>".$fila['falla']."</td>
                            <td>".$fila['datetime_reporte']."</td>
                            <td>".$fila['datetime_cita']."</td>
                            <td>".$fila['estatus']."</td>
                            <td><a href='ver_folio.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-eye'></i></a></td>
                            <td><a href='cerrar_folio.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-edit'></i></a></td> 
                        </tr>";
            }
            $salida.="</tbody></table>";           
        }
        echo $salida;
?>