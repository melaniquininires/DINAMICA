<?php

class Persona{

    private $nroDni;
    private $apellido;
    private $nombre;
    private $fecNac;
    private $telefono;
    private $domicilio;
    private $colAutos;
    private $mensajeoperacion;


    public function __construct()
    {
       $this->nroDni='';
       $this->apellido='';
       $this->nombre='';
       $this->fecNac='';
       $this->telefono='';
       $this->domicilio='';
       $this->colAutos=[];
       $this->mensajeoperacion='';
    }



    public function getNroDni()
    {
        return $this->nroDni;
    }

    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFecNac()
    {
        return $this->fecNac;
    }

    public function setFecNac($fecNac)
    {
        $this->fecNac = $fecNac;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getDomicilio()
    {
        return $this->domicilio;
    }

    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getColAutos()
    {
        return $this->colAutos;
    }

    public function setColAutos($colAutos)
    {
        $this->colAutos = $colAutos;

        return $this;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;

        return $this;
    }

    public function setear($nrodni, $apellido, $nombre, $fecNac,$telefono,$domicilio,$colAutos){
       $this->setNroDni($nrodni);
       $this->setApellido($apellido);
       $this->setNombre($nombre);
       $this->setFecNac($fecNac);
       $this->setTelefono($telefono);
       $this->setDomicilio($domicilio);
       $this->setColAutos($colAutos);
    }

    //
    public function toArray(){
        return ["NroDni"=> $this->getNroDni(), "Apellido" => $this->getApellido(), "Nombre" => $this->getNombre(), "fechaNac" => $this->getFecNac(),"Telefono" => $this->getTelefono(),"Domicilio" => $this->getDomicilio()];
    }

    //ORM
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM `persona` WHERE NroDni = '".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'],$row['Telefono'],$row['Domicilio'],[]);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Persona->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona (NroDni,Apellido,Nombre,fechaNac,Telefono,Domicilio)  
        VALUES('".$this->getNroDni()."', '".$this->getApellido()."','".$this->getNombre()."','".$this->getFecNac()."','".$this->getTelefono()."','".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE `persona` SET Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."',fechaNac='".$this->getFecNac()."', Telefono='".$this->getTelefono()."', Domicilio='".$this->getDomicilio()."' WHERE NroDni='".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM `persona` WHERE NroDni='".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM `persona` ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        //echo $sql;
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj=["NroDni"=>$row['NroDni'],"Apellido"=>$row['Apellido'],"Nombre"=>$row['Nombre'],"fechaNac"=>$row['fechaNac'],"Telefono"=>$row['Telefono'],"Domicilio"=>$row['Domicilio']];
                    
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Persona->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

}

?>