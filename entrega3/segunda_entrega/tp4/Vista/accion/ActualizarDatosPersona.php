<?php 
$tituloPagina= "Actualizar Datos Persona";
    include_once '../estructura/cabecera.php';
    $param = data_submitted();
    $abmPersona= new AbmPersona();
?>


<body>
    <div>
    <?php 
    
            if($abmPersona->modificacion($param)){
                $cadena="Se pudo cambiar los datos";
            }else{
                $cadena="No se pudo cambiar los datos";
            }
    echo "<p>".$cadena."</p>";
    ?>
    <button class="mi-boton m-3"><a href="../Ejercicio 9/BuscarPersona.php">Volver</a></button>
    </div>
   <?php
include_once("../estructura/footer.php");
?>   
</body>
