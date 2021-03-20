<?php 
// se confirma la contraseña
if($password != $Rpassword){
    die('Las contraseñas no coinciden <br> <br> <a href = "index.html"> Volver </a>');
}

//Se encripta la contraseña
$passwordUsuario = md5($password);
?>