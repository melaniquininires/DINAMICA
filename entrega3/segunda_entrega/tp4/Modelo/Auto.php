<?php 
class Auto{

    private $patente;
    private $marca;
    private $modelo;
    private $duenio;
    private $mensajeoperacion;


    public function __construct()
    {
       $this->patente='';
       $this->marca='';
       $this->modelo='';
       $this->duenio=new Persona();
       $this->mensajeoperacion='';
    }


    public function getPatente()
    {
        return $this->patente;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getDuenio()
    {
        return $this->duenio;
    }

    public function setDuenio($duenio)
    {
        $this->duenio = $duenio;

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

    public function setear($patente, $marca, $modelo, $duenio){
       $this->setPatente($patente);
       $this->setMarca($marca);
       $this->setModelo($modelo);
       $this->setDuenio($duenio);
    }

    //
    //Devuelve un arreglo asociativo del objeto
    //@return array
    public function toArray(){
        return ["Patente"=> $this->getPatente(), "Marca" => $this->getMarca(), "Modelo" => $this->getModelo()];
    }

    //ORM


    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM  auto  WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $duenio= new Persona();
                    $duenio->setNroDni($row['DniDuenio']);
                    $duenio->cargar();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $duenio);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO  auto   (Patente, Marca, Modelo, DniDuenio)
        VALUES('".$this->getPatente()."', '".$this->getMarca()."', ".$this->getModelo().",'".($this->getDuenio())->getNroDni()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE  auto  SET Marca='".$this->getMarca()."', Modelo= ".$this->getModelo().", DniDuenio='".($this->getDuenio())->getNroDni()."' WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM  auto  WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM  auto  ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    $duenio= new Persona();
                    $duenio->setNroDni($row['DniDuenio']);
                    $duenio->cargar();
                    $duenio= $duenio->toArray();
                    $obj=["Patente"=> $row['Patente'], "Marca" => $row['Marca'], "Modelo" => $row['Modelo'],"DniDuenio"=>$duenio];
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }       
        return $arreglo;
    }
    
}

?>