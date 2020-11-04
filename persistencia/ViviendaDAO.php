<?php
class AutorDAO{
    private $idVivienda;
    private $direccionVivienda;
    private $telefono;
    private $barrio;
    
    function AutorDAO ($pIdVivienda, $pDireccionVivienda, $pTelefono,$pBarrio) {
        $this -> idVivienda = $pIdVivienda;
        $this -> direccionVivienda = $pDireccionVivienda;
        $this -> telefono = $pTelefono;
        $this -> barrio = $pBarrio;
    }
    
    function consultar () {
        return "select DireccionVivienda, Telefono, Barrio
                from vivienda
                where IdVivienda = '" . $this -> idVivienda . "'";
    }
    
    function crear () {
        return "insert into vivienda (DireccionVivienda, Telefono, Barrio)
                values ('" . $this -> direccionVivienda . "', '" . $this -> telefono . "', '".$this -> barrio . "')";                
    }
    
    function consultarTodos () {
        return "select IdVivienda, DireccionVivienda, Telefono, Barrio
                from vivenda";
    }
    
    function consultarPorPagina ($cantidad, $pagina) {
        return "select IdVivienda, DireccionVivienda, Telefono, Barrio
                from vivienda
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
    }
    
    function consultarTotalRegistros () {
        return "select count(Idvivienda)
                from vivienda";
    }
    
}

?>