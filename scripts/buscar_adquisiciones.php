<?php
     
    require_once 'connect.php';
    $salida="";

    $query = "SELECT * FROM adquisiciones ORDER By entrega DESC";

    if(isset($_POST['consulta'])){
        $q=$_POST['consulta'];
        
        $query = "SELECT *  FROM adquisiciones WHERE 
                contrato_arrendamiento LIKE '%" . $q . "%' OR
                fecha_primer_pago LIKE '%" . $q . "%' OR
                pago_total LIKE '%" . $q . "%' OR
                mensualidad LIKE '%" . $q . "%' OR
                cofres LIKE '%" . $q . "%' OR
                serie LIKE '%" . $q . "%' OR
                pago_mensual_unit LIKE '%" . $q . "%' OR
                recepcion_del_cofre LIKE '%" . $q . "%' OR
                numero_pedido LIKE '%" . $q . "%' OR
                numero_factura_compra LIKE '%" . $q . "%' OR
                fecha_emision_factura LIKE '%" . $q . "%' OR
                valor_factura_unit LIKE '%" . $q . "%' OR
                propiedad_etv LIKE '%" . $q . "%' OR
                entrega LIKE '%" . $q . "%' OR
                CECO LIKE '%" . $q . "%'";
        
    }   
        
    $queryResult = $pdo->query($query);


    echo "<div class='resultado' style='margin-left: 10%; margin-top: 2%'><label for='resultado'>" . $queryResult->rowCount() . "  Resultados</label></div>";    


        if(true){

            $salida.="<table class='table' style='margin:auto; margin-top:2%; width: 80%; font-size: 11px;'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col'>Contrato</th>
                                <th scope='col'>Fecha 1er Pago</th>
                                <th scope='col'>Pago Total</th>
                                <th scope='col'>Mensualidad</th>
                                <th scope='col'>Cofres</th>
                                <th scope='col'>No. Serie</th>
                                <th scope='col'>Pago Mensual U.</th>
                                <th scope='col'>Fecha de Recep</th>
                                <th scope='col'>No. Pedido</th>
                                <th scope='col'>No. Factura Compra</th>
                                <th scope='col'>Fecha Emi. Factura</th>
                                <th scope='col'>Valor U. Factura</th>
                                <th scope='col'>Propiedad ETV</th>
                                <th scope='col'>Fecha Entrega</th>
                                <th scope='col'>CECO</th>
                                <th scope='col'>Borrar</th>
                                <th scope='col'>Subir</th>
                            </tr>
                        </thead>
                        <tbody>";
            
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC )){
                $salida.="<tr>
                            <td>".$fila['contrato_arrendamiento']."</td>
                            <td>".$fila['fecha_primer_pago']."</td>
                            <td>".$fila['pago_total']."</td>
                            <td>".$fila['mensualidad']."</td>
                            <td>".$fila['cofres']."</td>
                            <td><a href='update_adquisicion.php?id=" . $fila['id'] . "' style='text-align:center;'>".$fila['serie']."</a></td>
                            <td>".$fila['pago_mensual_unit']."</td>
                            <td>".$fila['recepcion_del_cofre']."</td>
                            <td>".$fila['numero_pedido']."</td>
                            <td>".$fila['numero_factura_compra']."</td>
                            <td>".$fila['fecha_emision_factura']."</td>
                            <td>".$fila['valor_factura_unit']."</td>
                            <td>".$fila['propiedad_etv']."</td>
                            <td>".$fila['entrega']."</td>
                            <td>".$fila['CECO']."</td>
                            <td><a href='../scripts/borrar_adquisicion.php?id=" . $fila['id'] ."'><i class='fas fa-trash-alt'></i></a></td>
                            <td><a href='../scripts/borrar_adquisicion.php?id=" . $fila['id'] ."'><i class='fas fa-cloud-upload-alt'></i></a></td> 
                        </tr>";

                   
            }
            $salida.="</tbody></table>";   
            
        }
        echo $salida;
?>