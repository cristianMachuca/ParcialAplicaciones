<?php
require "persistencia/AdministradorDAO.php";

class Administrador{
    private $idAdministrador;
    private $nombre;

    
    public function getIdAdministrador()
    {
        return $this->idAdministrador;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    function Administrador ($pIdAdministrador="", $pNombre="") {
        $this -> idAdministrador = $pIdAdministrador;
        $this -> nombre = $pNombre;
        $this -> conexion = new Conexion();
        $this -> administradorDAO = new AdministradorDAO($pIdAdministrador, $pNombre);        
    }
    
    function autenticar () {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> administradorDAO -> autenticar());
        $this -> conexion -> cerrar();
        if($this -> conexion -> numFilas() == 1){
            $this -> idAdministrador = $this -> conexion -> extraer()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> administradorDAO -> consultar());
        $this -> conexion -> cerrar();        
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];              
    }
}


?>