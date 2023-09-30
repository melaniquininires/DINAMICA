<?php

include_once "../../configuracion.php" ;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../menu/css/estiloMenu.css">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../js/validaciones.js"></script>
</head>

<body>
    <header>
        <div class="logo">
           <a href="../../../menu/index.php"><img src="../../../menu/imagenes/descarga.jpeg" alt="LogoUnco"></a> 
            <div style="text-align: center; margin: auto;">
                <h1>TECNICATURA EN DESARROLLO WEB</h1>
                <h2>Programacion web Dinamica</h2>
            </div>
            
        </div>
        <div class="botones-container">
                <a class="boton" href="../Ejercicio 3/VerAutos.php">Ver autos</a>
                <a class="boton" href="../Ejercicio 4/buscarAuto.php">Buscar autos</a>
                <a class="boton" href="../Ejercicio 5/listaPersonas.php">Listar Clientes</a>
                <a class="boton" href="../Ejercicio 6/NuevaPersona.php">Agregar Cliente</a>
                <a class="boton" href="../Ejercicio 7/nuevoAuto.php">Agregar Auto</a> 
                <a class="boton" href="../Ejercicio 8/CambioDuenio.php">Cambiar de dueño</a>
                <a class="boton" href="../Ejercicio 9/BuscarPersona.php">Buscar cliente</a>
            </div>
    </header>

</body>