
<?php
$tituloPagina= "Lista Personas";
    include_once '../estructura/cabecera.php';
    $abmPersona= new AbmPersona();
    $personas = array();
    $personas = $abmPersona ->buscar(null);
?>

<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Personas</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Número DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                    <th>Autos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($personas) > 0) {
                    foreach ($personas as $persona) {
                        echo "<tr>";
                        echo "<td>" . $persona["NroDni"] . "</td>";
                        echo "<td>" . $persona["Apellido"] . "</td>";
                        echo "<td>" . $persona["Nombre"]. "</td>";
                        echo "<td>" . $persona["fechaNac"] . "</td>";
                        echo "<td>" . $persona["Telefono"] . "</td>";
                        echo "<td>" . $persona["Domicilio"] . "</td>";
                        echo '<td><form action="../accion/autosPersona.php" method="post">
                                <input type="hidden" name="NroDni" value="' . $persona["NroDni"] . '">
                                <button type="submit" class="btn btn-link">Ver Autos</button>
                              </form></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay Personas</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
   
</div>
<?php
    include_once '../estructura/footer.php';
    ?>
</body>
