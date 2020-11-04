<?php
require "persistencia/ViviendaDAO.php";

class Vivienda{
    private $idVivienda;
    private $direccionVivienda;
    private $telefono;
    private $barrio;
    private $conexion;
    private $ViviendaDAO;
    

    
    /**
     * @return string
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * @return string
     */
    public function getDireccionVivienda()
    {
        return $this-> direccionVivienda;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this-> telefono;
    }
    
    /**
     * @return string
     */
    public function getBarrio()
    {
        return $this-> barrio;
    }

    function Vivienda ($pIdVivienda="", $pDireccionVivienda="", $pTelefono="", $pBarrio="") {
        $this -> idVivienda = $pIdVivienda;
        $this -> direccionVivienda = $pDireccionVivienda;
        $this -> telefono = $pTelefono;
        $this -> barrio = $pBarrio;
        $this -> conexion = new Conexion();
        $this -> ViviendaDAO = new ViviendaDAO($pIdVivienda, $pDireccionVivienda, $pTelefono, $pBarrio);        
    }
    
    function consultar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> ViviendaDAO -> consultar());
        $this -> conexion -> cerrar();        
        $resultado = $this -> conexion -> extraer();
        $this -> direccionVivienda = $resultado[0];
        $this -> telefono = $resultado[1];
        $this -> barrio = $resultado[2];
    }

    function crear(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> ViviendaDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ViviendaDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $Viviendas = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($Viviendas, new Vivienda($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }
        return $Viviendas;
    }
    
    function consultarPorPagina($cantidad, $pagina){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ViviendaDAO -> consultarPorPagina($cantidad, $pagina));
        $this -> conexion -> cerrar();
        $Viviendas = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($Viviendass, new Vivienda($resultado[0], $resultado[1], $resultado[2], $resultado[3]));
        }
        return $Viviendas;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ViviendasDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();        
        $resultado = $this -> conexion -> extraer();        
        return $resultado[0];
    }
    
    
}


?>