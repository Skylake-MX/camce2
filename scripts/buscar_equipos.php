<?php

    require_once 'connect.php';
    $salida="";

    $query = "SELECT * FROM base ORDER By razon_social";

    if(isset($_POST['consulta'])){
        
        $q=$_POST['consulta'];
        
        
        $query = "SELECT *  FROM base WHERE 
                id_equipo LIKE '%" . $q . "%' OR
                estatus LIKE '%" . $q . "%' OR
                razon_social LIKE '%" . $q . "%' OR
                unidad_de_negocio LIKE '%" . $q . "%' OR
                segmento LIKE '%" . $q . "%' OR
                proveedor LIKE '%" . $q . "%' OR
                modelo LIKE '%" . $q . "%' OR
                serie LIKE '%" . $q . "%' OR
                capacidad LIKE '%" . $q . "%' OR
                banco LIKE '%" . $q . "%' OR
                tipo_de_acreditacion LIKE '%" . $q . "%' OR
                sucursal_gsi LIKE '%" . $q . "%' OR
                direccion LIKE '%" . $q . "%'";
        
    }   
        
        
    $queryResult = $pdo->query($query);


    echo "<div class='' style='margin-left: 20%; margin-top: 2%'><label for='resultado'>" . $queryResult->rowCount() . "  Resultados</label></div>";    


        if(true){

            $salida.="<table class='table' style='margin:auto; margin-top:1%; width: 60%'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Estatus</th>
                                <th scope='col'>Razon Social</th>
                                <th scope='col'>Unidad de negocio</th>
                                <th scope='col'>Segmento</th>
                                <th scope='col'>Proveedor</th>
                                <th scope='col'>Modelo</th>
                                <th scope='col'>Serie</th>
                                <th scope='col'>Capacidad</th>
                                <th scope='col'>Banco</th>
                                <th scope='col'>Acreditacion</th>
                                <th scope='col'>Sucursal</th>
                                <th scope='col'>Direccion</th>
                                <th scope='col'>Editar</th>
                                <th scope='col'>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>";
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC)){
                $salida.="<tr>
                            <td>".$fila['id_equipo']."</td>
                            <td>".$fila['estatus']."</td>
                            <td>".$fila['razon_social']."</td>
                            <td>".$fila['unidad_de_negocio']."</td>
                            <td>".$fila['segmento']."</td>
                            <td>".$fila['proveedor']."</td>
                            <td>".$fila['modelo']."</td>
                            <td>".$fila['serie']."</td>
                            <td>".$fila['capacidad']."</td>
                            <td>".$fila['banco']."</td>
                            <td>".$fila['tipo_de_acreditacion']."</td>
                            <td>".$fila['sucursal_gsi']."</td>
                            <td>".$fila['direccion']."</td>
                            <td><a href='update_registro.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-edit'></a></td>
                            <td><a href='#' onclick='preguntar(" . $fila['id'] . " )'> <i class='fas fa-trash-alt'></a></td> 
                        </tr>";

                        $salida.="    <script type='text/javascript'>
                        function preguntar(id){
                            if(confirm('¿Estas seguro que deseas eliminar este registro? " . $fila['id']. "')){
                                window.location.href = '../scripts/delete_registro.php?id=" . $fila['id'] . "';
                            }
                        }
                    </script>";
            }

            $salida.="</tbody></table>";

            
 
        }

        echo $salida;

?>