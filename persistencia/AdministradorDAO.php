<?php
class AdministradorDAO{
    private $idAdministrador;
    private $nombre;

    
    function AdministradorDAO ($pIdAdministrador, $pNombre) {
        $this -> idAdministrador = $pIdAdministrador;
        $this -> nombre = $pNombre;
    }
    
    function autenticar () {        
        return "select idAdministrador 
                from Administrador 
                where NombreAdministrador = '" . $this -> nombre . "')"; 
    }
    
    function consultar () {
        return "select nombre
                from Administrador
                where idAdministrador = '" . $this -> idAdministrador . "'";
    }
    
    
    
    
}

?>