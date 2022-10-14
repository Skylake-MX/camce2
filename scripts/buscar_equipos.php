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
        $query = "SELECT * FROM base WHERE asignado LIKE '%" . $likeUser . "%' ORDER By sucursal_gsi";
        
        
    }
    else{
        $query = "SELECT * FROM base ORDER By razon_social";
    }

    if(isset($_POST['consulta'])){
        
        $q=$_POST['consulta'];
        
        if($privilegio=="tecnico"){ 
        
            $query = "SELECT *  FROM base WHERE (
                    id_equipo LIKE '%" . $q . "%' OR
                    estatus LIKE '%" . $q . "%' OR
                    razon_social LIKE '%" . $q . "%' OR
                    unidad_de_negocio LIKE '%" . $q . "%' OR
                    segmento LIKE '%" . $q . "%' OR
                    proveedor LIKE '%" . $q . "%' OR
                    modelo LIKE '%" . $q . "%' OR
                    serie LIKE '%" . $q . "%' OR
                    capacidad LIKE '%" . $q . "%' OR
                    empresa LIKE '%" . $q . "%' OR
                    banco LIKE '%" . $q . "%' OR
                    tipo_de_acreditacion LIKE '%" . $q . "%' OR
                    direccion LIKE '%" . $q . "%' )" . " AND asignado LIKE '%" . $likeUser . "%'" ;
        }else{
            $query = "SELECT *  FROM base WHERE (
                    id_equipo LIKE '%" . $q . "%' OR
                    estatus LIKE '%" . $q . "%' OR
                    razon_social LIKE '%" . $q . "%' OR
                    unidad_de_negocio LIKE '%" . $q . "%' OR
                    segmento LIKE '%" . $q . "%' OR
                    proveedor LIKE '%" . $q . "%' OR
                    modelo LIKE '%" . $q . "%' OR
                    serie LIKE '%" . $q . "%' OR
                    capacidad LIKE '%" . $q . "%' OR
                    empresa LIKE '%" . $q . "%' OR
                    banco LIKE '%" . $q . "%' OR
                    tipo_de_acreditacion LIKE '%" . $q . "%' OR
                    direccion LIKE '%" . $q . "%' )";

        }
    }   
        
        
    $queryResult = $pdo->query($query);


    echo "<div class='resultado' style='margin-left: 10%; margin-top: 2%'><label for='resultado'>" . $queryResult->rowCount() . "  Resultados</label></div>";    


        if(true){

            $salida.="<table class='table' style='margin:auto; margin-top:2%; width: 80% font-size: 11px;'>
                        <thead class='thead-light'>
                            <tr>

                                <th scope='col'>Razon Social</th>
                                <th scope='col'>Unidad de negocio</th>
                                <th scope='col'>Proveedor</th>
                                <th scope='col'>Modelo</th>
                                <th scope='col'>Serie</th>
                                <th scope='col'>Empresa</th>"
                                // <th scope='col'>Banco</th>
                                // <th scope='col'>Acreditacion</th>
                                ."<th scope='col'>Sucursal</th>
                                <th scope='col'>Direccion</th>
                                <th scope='col'>Borrar</th>
                                <th scope='col'>Upload</th>
                            </tr>
                        </thead>
                        <tbody>";
            while($fila= $queryResult->fetch(PDO::FETCH_ASSOC)){
                $salida.="<tr>

                            <td>".$fila['razon_social']."</td>
                            <td>".$fila['unidad_de_negocio']."</td>
                            <td>".$fila['proveedor']."</td>
                            <td>".$fila['modelo']."</td>                         
                            <td><a href='update_registro.php?id=" . $fila['id'] . "' style='text-align:center;'>".$fila['serie']."</a></td>
                            <td>".$fila['empresa']."</td>"
                            // <td>".$fila['banco']."</td>
                            // <td>".$fila['tipo_de_acreditacion']."</td>
                            ."<td>".$fila['sucursal_gsi']."</td>
                            <td>".$fila['direccion']."</td>
                            <td><a href='../scripts/delete_registro.php?id=".$fila['id'] . "' onclick='return confirmacion()'> <i class='fas fa-trash-alt'></a></td>
                            <td><a href='subir_archivo.php?id=".$fila['id'] ."'><i class='fas fa-cloud-upload-alt'></i></a></td> 
                        </tr>";

                        $salida.="<script type='text/javascript'>
                        function confirmacion(){
                            var respuesta=confirm('¿Estas seguro de eliminar el registro?');
                            if (respuesta == true){
                                return true;
                            }else{
                                return false;
                            }
                        }
                    </script>";
            }

            $salida.="</tbody></table>";

            
 
        }

        echo $salida;

?>