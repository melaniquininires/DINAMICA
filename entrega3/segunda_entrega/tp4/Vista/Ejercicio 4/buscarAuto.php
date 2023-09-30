    <?php
    $tituloPagina= "Buscar Auto por Patente";
    include_once '../estructura/cabecera.php';
    ?>
<body>
    <div class="container">
        <h1>Buscar Auto por Patente</h1>
        <form action="../accion/accionBuscarAutos.php" method="post" id="buscarAutoForm" onsubmit="return validarPatente();">
            <label for="patente">Número de Patente:</label>
            <input type="text" id="patente" name="patente" required>
            <span id="mensajePatente" class="mensaje-error"></span>
            <button type="submit">Buscar</button>
        </form>
    </div>
    <?php
    include_once '../estructura/footer.php';
    ?>
</body>
