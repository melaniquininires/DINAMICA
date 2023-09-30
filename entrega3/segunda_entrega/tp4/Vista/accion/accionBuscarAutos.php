<?php
$tituloPagina= "Resultado de Búsqueda Autos";
include_once '../estructura/cabecera.php';
$mensaje = "";

$auto = null;

$datos = data_submitted();
$patente = $datos['patente'];
$abmAuto = new AbmAuto();
$autos = $abmAuto->buscar(['patente' => '%' . $patente . '%']); // Búsqueda parcial

if (!empty($autos)) {
    // Al menos un auto encontrado, buscar el auto que coincide exactamente con la patente
    foreach ($autos as $a) {
        if ($a["Patente"] === $patente) {
            $auto = $a;
            break; // Detener el bucle si se encuentra el auto deseado
        }
    }
}

if ($auto === null) {
    // No se encontró ningún auto con la patente ingresada
    $mensaje = "No se encontró ningún auto con la patente ingresada.";
}
?>



<body>
    <div class="container">
        <?php if ($auto !== null) : ?>
            <h2>Resultado de Búsqueda</h2>
            <table>
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Nombre del Dueño</th>
                    <th>Apellido del Dueño</th>
                </tr>
                <tr>
                    <td><?php echo $patente; ?></td>
                    <td><?php echo $auto["Marca"] ?></td>
                    <td><?php echo $auto["Modelo"] ?></td>
                    <td><?php echo $auto["DniDuenio"]["Nombre"] ?></td>
                    <td><?php echo $auto["DniDuenio"]["Apellido"]; ?></td>
                </tr>
            </table>
        <?php elseif ($mensaje !== "") : ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
    <!--    <a href="../buscarAuto.php">Volver al formulario de búsqueda</a> !-->
        <button class="mi-boton"><a href="../Ejercicio 4/buscarAuto.php">Volver al formulario de búsqueda</a></button>

    </div>
   
    <?php
include_once("../estructura/footer.php");
?>
</body>