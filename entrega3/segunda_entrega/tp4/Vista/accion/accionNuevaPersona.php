<?php
    $tituloPagina = "Resultado Nueva Persona";
    include_once '../estructura/cabecera.php';
    $datos = data_submitted();
    $arregloPersonas= array();
    //print_r($datos);
    $abmPersona = new AbmPersona();
    $arregloPersonas = $abmPersona->buscar($datos);

?>
<body>

    <?php
/*
$cuenta= count($arregloPersonas);
echo $cuenta;
print_r($arregloPersonas);*/ //trae el array vacio ¿¿¿¿¿¿
    if (!empty($arregloPersonas)) {
        echo '<div class="alert alert-info" role="alert">La persona ya está creada en la base de datos</div>';
    } else {
        if ($abmPersona->alta($datos)) {
            echo '<div class="alert alert-info" role="alert">La persona se ha cargado correctamente</div>';
        } else {
            echo '<div class="alert alert-info" role="alert">Error al cargar la persona</div>';
        }
    }

    ?>
    <button class="mi-boton"><a href="../Ejercicio 6/NuevaPersona.php">Volver</a></button>
    <?php
include_once("../estructura/footer.php");
?>
</body>

</html>
