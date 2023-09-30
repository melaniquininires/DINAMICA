<?php 
    $tituloPagina= "Cambio Dueño";
    include_once '../estructura/cabecera.php';

    $param = data_submitted();
    $abmAuto= new AbmAuto();
    $array= $abmAuto->buscar($param);
    if(count($array)>0){
        $auto=$array[0];
    }else{
        $auto = null;
    }
    $abmPersona= new AbmPersona();
    $array= $abmPersona->buscar($param);
    if(count($array)>0){
        $persona=$array[0];
    }else{
        $persona = null;
    }
?>


<body>
    <?php 
    $cadena= "";
    if($persona==null){
     $cadena .= " No existe esa persona";  
    }
    if($auto==null){
        $cadena.=" No existe ese auto";
    }

    if($persona!=null && $auto!=null){
        if(strcmp($auto["DniDuenio"]["NroDni"],$persona["NroDni"])!==0){
            $auto['DniDuenio']= $persona["NroDni"];
            if($abmAuto->modificacion($auto)){
                $cadena="Se pudo cambiar el dueño";
            }else{
                $cadena="No se pudo cambiar el dueño";
            }
        }else{
            $cadena= "Esa persona ya es dueño de ese auto";
        }
    }
    echo "<p>".$cadena."</p>";
    ?>
    echo '<button class="mi-boton m-3"><a href="../Ejercicio 8/CambioDuenio.php">Volver</a></button>';
     <?php
include_once("../estructura/footer.php");
?>
</body>