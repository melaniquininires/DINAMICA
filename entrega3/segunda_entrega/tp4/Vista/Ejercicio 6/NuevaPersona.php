<?php
$tituloPagina= "Formulario Nueva Persona";
    include_once '../estructura/cabecera.php';
    ?>
<body>

    
    <div class="container">
    <h1>Agregar un cliente</h1>
    <form id="nuevaPersonaForm" action="../accion/accionNuevaPersona.php" method="post" onsubmit="return validarPersona()">
        <label for="nroDni">Número de DNI:</label>
        <input type="text" id="nroDni" name="NroDni" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="Nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="Apellido" required><br><br>

        <label for="fecNac">Fecha de Nacimiento:</label>
        <input type="date" id="fecNac" name="fechaNac" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="Telefono" required><br><br>

        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="Domicilio" required><br><br>

        <input type="submit" value="Agregar Persona">
    </form>
    
    </div>
    <div id="mensaje"></div>
    <?php
    include_once '../estructura/footer.php';
    ?>
  
</body>

