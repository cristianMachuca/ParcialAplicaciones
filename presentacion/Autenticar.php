<?php
$nombre = $_POST["nombre"];

$administrador = new Administrador("", $nombre);
if($administrador -> autenticar()){
    $_SESSION["id"] = $administrador -> getIdAdministrador();
    header("Location: index.php?pid=" . base64_encode("presentacion/SesionAdministrador.php"));
}else{
    header("Location: index.php?error=1");    
}

?>