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
                serie LIKE '%" . $q . "%' OR
                modelo LIKE '%" . $q . "%'";
        
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
                                <th scope='col'>Modelo</th>
                                <th scope='col'>Sucursal</th>
                                <th scope='col'>Folio</th>
                            </tr>
                        </thead>
                        <tbody>";
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC)){
                $salida.="<tr>
                            <td>".$fila['id_equipo']."</td>
                            <td>".$fila['estatus']."</td>
                            <td>".$fila['razon_social']."</td>
                            <td>".$fila['unidad_de_negocio']."</td>
                            <td>".$fila['modelo']."</td>
                            <td>".$fila['sucursal_gsi']."</td>
                            <td><a href='../views/folio.php?id=" . $fila['id'] . "' style='text-align:center;'><i class='fas fa-plus-circle'></i></a></td>
                        </tr>";
            }

            $salida.="</tbody></table>";

        }

        echo $salida;

?>