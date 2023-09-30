<?php
    $tituloPagina ="Cambio Dueño";
    include_once '../estructura/cabecera.php';
    ?>


<body> 
    <div class="container">
    <h1>Cambio de Dueño</h1>
    <form action="../accion/accionCambioDuenio.php" method="post" onsubmit="return validarCambioDuenio()">
    <label for="patente">Patente:</label>
        <input type="text" placeholder="Patente (ABC 123)" name="Patente" id="Patente" required>
        <label for="dniduenio">DNI del proximo propietario:</label>
        <input type="text" placeholder="Número de Documento (8 dígitos)" name="NroDni" id="NroDni" required>
        <button type="submit">Cambiar</button>
    </form>
</div>
<?php
    include_once '../estructura/footer.php';
    ?>
</body>
