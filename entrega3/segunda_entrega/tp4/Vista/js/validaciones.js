function validarPatente() {
    var patenteInput = document.getElementById("patente");
    var patente = patenteInput.value.trim();
    var mensajePatente = document.getElementById("mensajePatente");

    // Expresión regular para validar la patente (3 letras seguidas de un espacio y 3 números)
    var patenteRegex = /^[A-Za-z]{3}\s\d{3}$/;

    if (!patenteRegex.test(patente)) {
      mensajePatente.innerHTML = "La patente debe tener 3 letras seguidas de un espacio y 3 números.<br> EJEMPLO: xxx 999";
      patenteInput.focus();
      return false;
    } else {
      mensajePatente.innerHTML = ""; // Limpiar el mensaje de advertencia si la patente es válida
    }
  
    return true;
  }

   


  function validarPersona() {
    var nroDni = document.getElementById('nroDni').value;
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var fecNac = document.getElementById('fecNac').value;
    var telefono = document.getElementById('telefono').value;
    var domicilio = document.getElementById('domicilio').value;

    if (
        nroDni === "" ||
        nombre === "" ||
        apellido === "" ||
        fecNac === "" ||
        telefono === "" ||
        domicilio === ""
    ) {
        mostrarMensaje("Por favor, complete todos los campos.");
        return false;
    }

    // Validar el formato del número de DNI (8 dígitos numéricos).
    if (!/^\d{8}$/.test(nroDni)) {
        mostrarMensaje("El número de DNI debe tener 8 dígitos numéricos.");
        return false;
    }

   // Calcular la fecha actual y la fecha de nacimiento ingresada.
   var fechaActual = new Date();
   var fechaNacimiento = new Date(fecNac);

   // Calcular la diferencia en años.
   var edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();

   // Verificar si la persona es mayor de edad (mayor o igual a 18 años).
   if (edad < 18) {
       mostrarMensaje("Debes ser mayor de edad para registrarte.");
       return false;
   }
   // Validar que el nombre y el apellido no contengan números.
   if (/\d/.test(nombre) || /\d/.test(apellido)) {
    mostrarMensaje("El nombre y el apellido no deben contener números.");
    return false;
}

    // Validar el número de teléfono (10 dígitos, no comienza con 0, no contiene 15).
    if (!/^[1-9]\d{9}$/.test(telefono)) {
        mostrarMensaje("El número de teléfono debe tener 10 dígitos, sin el 0 ni el 15.");
        return false;
    }

    // Puedes agregar más validaciones según tus necesidades, como validar el formato del domicilio, etc.

    // Si todas las validaciones pasaron, el formulario es válido.
    return true;
}

function mostrarMensaje(mensaje) {
    var mensajeDiv = document.getElementById('mensaje');
    mensajeDiv.innerHTML = mensaje;
    mensajeDiv.style.color = "red";
}

function validarAuto() {
    // Obtener los valores de los campos
    var patente = document.getElementById("Patente").value;
    var marca = document.getElementById("Marca").value;
    var modelo = document.getElementById("Modelo").value;
    var dniDuenio = document.getElementById("DniDuenio").value;

    // Validar que los campos no estén vacíos
    if (patente === "" || marca === "" || modelo === "" || dniDuenio === "") {
        alert("Todos los campos son obligatorios. Por favor, complete todos los campos.");
        return false;
    }

    // Expresión regular para validar la patente (3 letras seguidas de un espacio y 3 números)
    var patenteRegex = /^[A-Za-z]{3}\s\d{3}$/;
  
    if (!patenteRegex.test(patente)) {
        document.getElementById("mensajePatente").innerHTML = "La patente debe tener 3 letras seguidas de un espacio y 3 números. EJEMPLO: xxx 999";
        return false;
    } else {
        document.getElementById("mensajePatente").innerHTML = ""; // Limpiar el mensaje de advertencia si la patente es válida
    }

    // Validar la "Marca" (puede contener letras y números)
    var marcaRegex = /^[A-Za-z0-9]+$/;
    if (!marcaRegex.test(marca)) {
        document.getElementById("mensajeMarca").innerHTML = "La marca puede contener letras y numeros";
        return false;
    }

    // Validar el "Modelo" solo números
    var modeloRegex = /^[0-9]+$/;
    if (!modeloRegex.test(modelo)) {
        document.getElementById("mensajeModelo").innerHTML = "El modelo debe contener solo numeros";
        return false;
    }
    
    // Validar el formato del número de DNI (8 dígitos numéricos).
    var dniRegex = /^\d{8}$/;
    if (!dniRegex.test(dniDuenio)) {
        document.getElementById("mensajeDni").innerHTML = "El dni debe ser de 8 digitos";
        return false;
    }

    // Si todos los campos son válidos, el formulario se enviará
    return true;
}

function validarDni() {
    var nroDniInput = document.getElementById("NroDni");
    var dniPattern = /^\d{8}$/;
    var dniValido = dniPattern.test(nroDniInput.value);

    // Aplica estilo de borde rojo en caso de error
    if (!dniValido) {
        nroDniInput.style.border = "2px solid red";
        return false; // Detiene el envío del formulario
    }

    return true; // Permite el envío del formulario si el campo es válido
}

function validarCambioDuenio() {
    var patenteInput = document.getElementById("Patente");
    var nroDniInput = document.getElementById("NroDni");

    // Patrones para validar la patente (tres letras, espacio, tres números)
    var patentePattern = /^[A-Z]{3}\s\d{3}$/;

    // Patrón para validar el DNI (8 dígitos)
    var dniPattern = /^\d{8}$/;

    // Realiza la validación
    var patenteValida = patentePattern.test(patenteInput.value);
    var dniValido = dniPattern.test(nroDniInput.value);

    // Aplica estilos de borde rojo en caso de error
    if (!patenteValida) {
        patenteInput.style.border = "2px solid red";
    } else {
        patenteInput.style.border = ""; // Restaura el color del borde
    }

    if (!dniValido) {
        nroDniInput.style.border = "2px solid red";
    } else {
        nroDniInput.style.border = ""; // Restaura el color del borde
    }

    // Detiene el envío del formulario si hay errores
    if (!patenteValida || !dniValido) {
        alert("Por favor, corrija los campos en rojo antes de enviar el formulario.");
        return false; // Detiene el envío del formulario
    }

    return true; // Permite el envío del formulario si ambos campos son válidos
}



