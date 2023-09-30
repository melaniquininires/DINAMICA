<?php
$tituloPagina="TP4 EJER 7";
include_once '../estructura/cabecera.php';

?>

<body>
<div class="container">
    <h3>Agregar Auto</h3>

    <form id="agregarAuto" method="post" action="../accion/accionNuevoAuto.php">
        <div class="form-group">
            <label for="Patente">Patente</label>
            <input id="Patente" name="Patente" type="text" class="form-control" maxlength="7" pattern="[A-Za-z]{3} [0-9]{3}" title="Debe ingresar 3 letras, un espacio, seguido de 3 números" required>
            <div class="invalid-feedback">
            Debes ingresar 3 letras-un espacio-3 números.
            </div>
        </div>
        <div class="form-group">
            <label for="Marca">Marca</label>
            <input id="Marca" name="Marca" type="text" class="form-control" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Debe ingresar una marca" required>
            <div class="invalid-feedback">
                    Debes ingresar la marca del auto
            </div>
        </div>
        <div class="form-group">
            <label for="Modelo">Modelo (Año)</label>
            <input id="Modelo" name="Modelo" type="number" class="form-control" min="1920" max="2023" pattern="[0-9]{4}" title="Debe ingresar un apellido" required>
            <div class="invalid-feedback">
                    Debes ingresar un modelo valido 
            </div>
        </div>
        <div class="form-group">
            <label for="Duenio">Dni del dueño</label>
            <input id="Duenio" name="Duenio" type="text" class="form-control" minlength="7" maxlength="8"  pattern="[0-9]{7,8}" title="Debe ingresar un DNI" required>
            <div class="invalid-feedback">
                    Debes ingresar un DNI valido 
            </div>
        </div>
        <input id="accion" name="accion" value="nuevo" type="hidden">
        <?php
   


        ?>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <br><br>
</div>
<?php
    include_once '../estructura/footer.php';
    ?>

</body>

