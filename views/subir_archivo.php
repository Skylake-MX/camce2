<?php

    include_once '../scripts/connect.php';
    $result=false;
    $camce="";

    if(!empty($_POST)){
        $id=$_POST['id'];
        $camce="";
        $query = "SELECT * FROM base WHERE id = '" . $id . "'";
        $queryResult=$pdo->query($query);
        $cliente = $queryResult->fetch(PDO::FETCH_ASSOC);
        
        $today=getdate();
        $y=$today['year'];
        $m=$today['mon'];
        $d=$today['mday'];
        $fecha=$y."-".$m."-".$d;
        
        $camce=$_POST['folioCamce'];
        $razon=$cliente['razon_social'];
        $unidad=$cliente['unidad_de_negocio'];
        $serie=$cliente['serie'];

        $nombreTemporal=$_FILES['archivo']['tmp_name'];
        $nombre=basename($_FILES["archivo"]["name"]);
        $extension=substr($_FILES['archivo']['type'],strrpos($_FILES['archivo']['type'],'/')+1,0);
       /*  echo $_FILES['archivo']['type'];
        echo strrpos($_FILES['archivo']['type'],'/')+1; */
        
        $privilegio=$_POST['privilegio'];

        switch($privilegio){
          case 'Orden de Servicio':   
                                    if(!is_dir("../Operaciones/Tirs")){
                                      mkdir("../Operaciones/Tirs",0777);
                                    }
                                      if(move_uploaded_file($nombreTemporal,"../Operaciones/Tirs/".$fecha." ".$camce." ".$razon." ".$unidad." ".$serie.".".substr($nombre, -(strlen($nombre)-strpos($nombre,'.')-1)))){
                                        echo "el archivo se subio correctamente";
                                      }
                                      else{
                                        echo "No se pudo subir archivo";
                                      }
                                    
                                    break;

          case 'Acta de Entrega':   if(!is_dir("../Operaciones/Actas")){
                                      mkdir("../Operaciones/Actas",0777);
                                    }
                                      if(move_uploaded_file($nombreTemporal,"../Operaciones/Actas/".$fecha." ".$razon." ".$unidad." ".$nombre)){
                                        echo "el archivo se subio correctamente";
                                      }
                                      else{
                                        echo "No se pudo subir archivo";
                                      }
                                    
                                    break;
                                                            
          case 'Evaluacion Tecnica':  if(!is_dir("../Operaciones/CheckList")){
                                        mkdir("../Operaciones/CheckList",0777);
                                      }
                                        if(move_uploaded_file($nombreTemporal,"../Operaciones/CheckList/".$fecha." ".$razon." ".$unidad." ".$nombre)){
                                          echo "el archivo se subio correctamente";
                                        }
                                        else{
                                          echo "No se pudo subir archivo";
                                        }
                                      
                                      break;
          case 'Otro Formato':  if(!is_dir("../Operaciones/Otro Formato")){
                                  mkdir("../Operaciones/Otro Formato",0777);
                                }
                                  if(move_uploaded_file($nombreTemporal,"../Operaciones/Otro Formato/".$fecha." ".$camce." ".$razon." ".$unidad." ".$nombre)){
                                    echo "el archivo se subio correctamente";
                                  }
                                  else{
                                    echo "No se pudo subir archivo";
                                  }
                                
                                break;
                            
          case 'Foto':  if(!is_dir("../Operaciones/Fotos")){
                          mkdir("../Operaciones/Fotos",0777);
                        }
                          if(move_uploaded_file($nombreTemporal,"../Operaciones/Fotos/".$fecha." ".$razon." ".$unidad." ".$serie." ".$nombre)){
                            echo "el archivo se subio correctamente";
                          }
                          else{
                            echo "No se pudo subir archivo";
                          }
                        
                        break;
        }

    }
    else{
    $id = $_GET['id'];

    $query = "SELECT * FROM base WHERE id = '" . $id . "'";
    $queryResult=$pdo->query($query);
    $cliente = $queryResult->fetch(PDO::FETCH_ASSOC);
    }
    
    if(!is_dir("../Operaciones")){
      mkdir("../Operaciones",0777) or die ( "No se puede crear carpeta");
    }
/*     else{
      echo "La carpeta Operaiones ya exitse";
    } */
?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Subir Archivo</title>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="uploadEstilos.css">
</head>
<body>
    <nav>
        <div value="nav_option"></option>
            <ul class="nav_lista">
                <li><a href="../views/listar_cofres.php">Atrás</a></li>
                <li><i class="fas fa-cloud-upload-alt"></i></li>
                <li><a href="../scripts/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
  <form action ="" class="resultado" method="post" enctype="multipart/form-data">
  <div class="upload">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4"><h4><?=$cliente['razon_social']. "   " . $cliente['unidad_de_negocio'] . "   " . $cliente['serie']?></h4></div>
      <div class="col-sm-4"></div>
      <br><br><br><br>
    </div>
    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-1">Selecciona Formato</div>
      <div class="col-sm-1">
        <select type="text" style="width:185px" class="formato" onchange="this.style.width=185" name="privilegio" required>
          <option value="">Selecciona una opcion</option>
          <option value="Orden de Servicio" >Orden de Servicio</option>
          <option value="Acta de Entrega">Acta de Entrega</option>
          <option value="Evaluacion Tecnica">Evaluacion Tecnica</option>
          <option value="Otro Formato">Otro Formato</option>
          <option value="Foto">Foto</option>
        </select></div>

        <section class="tipoOS"></section>
      <div class="col-sm-5"></div>
    </div>
    <br>

    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1" id="tipoOS">
      </div>
      <div class="col-sm-5"></div>
    </div>
    <br>

    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-1"><label for="" class="etiqueta"></label></div>
      <div class="col-sm-1">
            <div class="folio"></div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <input type="file" name="archivo"></input>
            <br><br>
            <input type="submit" value="Upload"></input>
      </div>
      <div class="col-sm-5"></div>
    </div>
  </div>
  </form>
  <script type="text/javascript">

        var selectElement = document.querySelector('.formato');   

        selectElement.addEventListener('change', (event) => {
            var resultado = document.querySelector('.formato');
            if((event.target.value=='Orden de Servicio')||(event.target.value=='Otro Formato')){

              
              if(!document.querySelector('#OS')){
              var tipoDeOS = ["Falla", "Mtto", "Mtto y Act", "Actualizacion"];

                var theBody = document.querySelector('#tipoOS');
                var newRow = "<select type='text' id='OS' style='width:185px' onchange='this.style.width=185' name='tipoOS' required>";
                var theOptions = "<option value=''>Selecciona una opcion</option>";
                tipoDeOS.forEach(function(index) {
                  theOptions += "<option value='" + index + "'>" + index + "</option>";
                });
                newRow += theOptions;
                newRow += "</select>";

                theBody.insertAdjacentHTML('beforeend', newRow);

              }
              
              var newInput = document.createElement('input');
              newInput.className ="camce";
              newInput.setAttribute("name", "folioCamce")
              
              if((document.querySelector('.camce')==null)){
                document.querySelector('.folio').appendChild(newInput);
              }            
              
              var etiqueta = document.querySelector('.etiqueta');
              if(event.target.value=='Orden de Servicio'){
                
                etiqueta.innerHTML = "Folio Camce";

              }else{
                etiqueta.innerHTML = "Nombre del Archivo";
              }
              
            }else if((event.target.value=='Acta de Entrega')||(event.target.value=='Evaluacion Tecnica')||(event.target.value=='Foto')){

              document.querySelector("#OS").remove();

              var d = document.querySelector('.folio');
              var d_nested = document.querySelector('.camce');
              var throwawayNode = d.removeChild(d_nested);

              var etiqueta = document.querySelector('.etiqueta');
              etiqueta.innerHTML = "";
            }         
        });
    </script> 
</body>
</html>