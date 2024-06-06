<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_GET['Nombre']) < 3) {
        $vMensaje.='Debes ingresar un Nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_GET['Apellido']) < 3) {
        $vMensaje.='Debes ingresar un Apellido con al menos 3 caracteres. <br />';
    }
    if (strlen($_GET['Email']) < 5) {
        $vMensaje.='Debes ingresar un Correo con al menos 5 caracteres. <br />';
    }
    if (strlen($_GET['Telefono']) < 5) {
        $vMensaje.='Debes ingresar un Telefono con al menos 5 caracteres. <br />';
    }
    if (strlen($_GET['Direccion']) < 5) {
        $vMensaje.='Debes ingresar una Direccion con al menos 5 caracteres. <br />';
    }
    if (strlen($_GET['Dni']) < 5) {
        $vMensaje.='Debes ingresar un Dni con al menos 5 caracteres. <br />';
    }

    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_GET as $Id=>$Valor){
        $_GET[$Id] = trim($_GET[$Id]);
        $_GET[$Id] = strip_tags($_GET[$Id]);
    }


    return $vMensaje;

}

?>