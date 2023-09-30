<?php
    $tituloPagina= "Buscar Persona";
    include_once '../estructura/cabecera.php';
    ?>
<body>
    <div class="container">
        <h1>Buscar cliente por número de DNI</h1>
        <form action="../accion/accionBuscarPersona.php" method="post" id="buscarPersonaForm" onsubmit="return validarDni()">
            <input type="text" id="NroDni" name="NroDni" required>
            <button type="submit">Buscar</button>
        </form>
    </div>

    <?php
    include_once '../estructura/footer.php';
    ?>
</body>
