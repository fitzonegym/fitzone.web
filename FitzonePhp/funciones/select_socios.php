<?php
function Listar_Usuarios($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT Id,Nombre, Apellido, Dni ,Email, Telefono, Direccion
        FROM socios";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['NOMBRE'] = $data['Nombre'];
            $Listado[$i]['APELLIDO'] = $data['Apellido'];
            $Listado[$i]['DNI'] = $data['Dni'];
            $Listado[$i]['EMAIL'] = $data['Email'];
            $Listado[$i]['TELEFONO'] = $data['Telefono'];
            $Listado[$i]['DIRECCION'] = $data['Direccion'];

            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}
?>