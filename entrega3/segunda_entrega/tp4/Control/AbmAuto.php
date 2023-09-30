<?php
class AbmAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('Patente',$param) and array_key_exists('Marca',$param)and array_key_exists('Modelo',$param)and array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $duenio= new Persona();
            $duenio->setNroDni($param['DniDuenio']); //en el array viene como Duenio NO COMO DniDuenio!!!!!!!!!!!
            $duenio->cargar();
            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'],$duenio);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new Auto();
            $obj->setear($param['Patente'], null,null,null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * y lo inserta en la base de datos
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtTabla = $this->cargarObjeto($param);
       // echo "param ".print_r($param);
      //  echo "El obj tabla: ".print_r($elObjtTabla);
        //verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto de la base de datos
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['Patente']))
                $where.=" and Patente ='".$param['Patente']."'";
            if  (isset($param['Marca']))
                 $where.=" and Marca ='".$param['Marca']."'";
                 if  (isset($param['Modelo']))
                 $where.=" and Modelo =".$param['Modelo']."";
                 if  (isset($param['DniDuenio']))
                 $where.=" and DniDuenio ='".$param['DniDuenio']."' ";
        }
        $arreglo = Auto::listar($where);  
        return $arreglo;        
    }
    
}
?>