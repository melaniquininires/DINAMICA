<?php 
    $tituloPagina="Resultado de Búsqueda Persona";
    include_once '../estructura/cabecera.php';
    $param = data_submitted();
    $abmPersona= new abmPersona();
    $array= $abmPersona->buscar($param);
    if(count($array)>0){
        $persona=$array[0];
    }else{
        $persona = null;
    }
    
?>

<body>
    <div>
    <div class="row border">
        <p class="col border fw-bold">Número DNI</p>
        <p class="col border fw-bold">Apellido</p>
        <p class="col border fw-bold">Nombre</p>
        <p class="col border fw-bold">Fecha Nacimiento</p>
        <p class="col border fw-bold">Teléfono</p>
        <p class="col border fw-bold">Domicilio</p>
        </div>
        <?php
            if($persona!=null){
                $cadena = '<form action="ActualizarDatosPersona.php" method="post">';
                $cadena .= '<div class="row border">';
                $cadena.= '<input type="text" placeholder='.$persona["NroDni"].' value='.$persona["NroDni"].' name="NroDni" readonly="true"  class="col border form-control" required>';
                $cadena.= '<div class="form-group"><input type="text" placeholder='.$persona["Apellido"].' value='.$persona["Apellido"].' name="Apellido" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" class="col border form-control" required>';
                $cadena.= '<div class="invalid-feedback">
                    El Apellido solo debe contener letras
                </div></div>';
                $cadena.= '<div class="form-group"><input type="text" placeholder='.$persona["Nombre"].' value='.$persona["Nombre"].' name="Nombre" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" class="col border form-control" required>';
                $cadena.= '<div class="invalid-feedback">
                    El Nombre solo contiene letras
                </div></div>';
                $cadena.= '<input type="date" placeholder='.$persona["fechaNac"].' value='.$persona["fechaNac"].' name="fechaNac" class="col border form-control" required>';
                $cadena.= '<div class="form-group"><input type="text" placeholder='.$persona["Telefono"].' value='.$persona["Telefono"].' name="Telefono" pattern="[0-9]{10}" class="col border form-control" required>';
                $cadena.= '<div class="invalid-feedback">
                    El Telefono solo contiene numeros
                </div></div>';
                $cadena.= '<input type="text" placeholder="'.$persona["Domicilio"].'" value="'.$persona["Domicilio"].'" name="Domicilio" class="col border form-control" required></div >';
                $cadena .= '<button type="submit" class="btn btn-info">Editar</button></div></form>';
                echo $cadena;
                    
            }else{
                echo '<div class="row border"> <p>No hay persona</p></div>';
            }
            
        ?>
    <button class="mi-boton m-3"><a href="../Ejercicio 9/BuscarPersona.php">Volver</a></button>

   
    <?php
include_once("../estructura/footer.php");
?>
</body>