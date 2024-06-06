<?php 
function InsertarUsuarios($vConexion){
    
    $SQL_Insert="INSERT INTO Socios (Nombre, Apellido, Dni, Email,Telefono, Direccion)
    VALUES ('".$_GET['Nombre']."' , '".$_GET['Apellido']."' , '".$_GET['Dni']."', '".$_GET['Email']."' , '".$_GET['Telefono']."' ,'".$_GET['Direccion']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>