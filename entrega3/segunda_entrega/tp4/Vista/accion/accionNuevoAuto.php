<?php 

$tituloPagina= "Resultado Agregar Auto";
include_once '../estructura/cabecera.php';
//Busca que la patente NO este repetida, y que el Dni exista, si no existe el DNI
//muestra el boton para agregar una nueva persona
$datos = data_submitted();
//print_r($datos);

$resp = false;
$objTrans = new AbmAuto();
$objPersona= new AbmPersona();
$dniDuenio= $datos['Duenio'];
$param= ['NroDni' => $dniDuenio];
$resultado= $objPersona->buscar($param);


$param= ['Patente' => $datos['Patente']];
$resultado1= $objTrans->buscar($param);

//if (isset($datos['accion'])){

    $mensaje2="";

  //  if($datos['accion']=='nuevo'){
        if(!empty($resultado1)){
            $mensaje2= "La patente esta DUPLICADA, no es posible agregarla.";
        }else{
        if(!empty($resultado)){
            //echo "Encontre el DNI en la bd";
                //print_r($datos);
                if($objTrans->alta($datos)){
                    $resp =true;
                }

            } else{
                $mensaje2= "El Nro de DNI del dueño NO existe en la Base de Datos, debe agregar primero a la persona en el siguiente boton: <a href=\"../nuevaPersona.php\" class=\"btn btn-primary\">Agregar Persona</a>" ;
            }
        }
   // }

    
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse. <br>".$mensaje2;
    }
    
//}
?>

<body><br> <br>
<div class="container">
    <?php
    if (isset($mensaje)) {
        echo '<div class="alert alert-info" role="alert">' . $mensaje . '</div>';
    }
    ?>
</div>
<br>
<br><a href="../Ejercicio 7/nuevoAuto.php" class="btn btn-primary">Volver</a>

<?php
include_once("../estructura/footer.php");
?>

</body>

