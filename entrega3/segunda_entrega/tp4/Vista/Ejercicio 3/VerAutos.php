<?php 
$tituloPagina="Ejercicio 3 - TP4";
include_once '../estructura/cabecera.php'; 


$objAbmAuto = new AbmAuto();
$listaAuto = [];
$null= NULL;
$listaAuto = $objAbmAuto->buscar($null);

?>	

<body>
<h3>Autos cargados</h3>

  <button class="mi-boton m-3" style="float: right;"><a href="../accion/ejemplo.php" target="_blank">
  <img src="../img/pdf.png" alt="PDF" width="30" height="30"> Generar PDF </a></button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Patente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Nombre Dueño</th>
            <th>Apellido Dueño</th>
 
        </tr>
    </thead>
    <tbody>
    <?php
    if (is_array($listaAuto) && count($listaAuto) > 0) {
        foreach ($listaAuto as $objAuto) {
            echo '<tr>';
            echo '<td>' . $objAuto["Patente"] . '</td>';
            echo '<td>' . $objAuto["Marca"] . '</td>';
            echo '<td>' . $objAuto["Modelo"] . '</td>';
            echo '<td>' . $objAuto["DniDuenio"]["Nombre"] . '</td>';
            echo '<td>' . $objAuto["DniDuenio"]["Apellido"]. '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">No hay datos cargados.</td></tr>';
    }
    ?>
    </tbody>
</table>
<?php
include_once("../estructura/footer.php");
?>
</body>





