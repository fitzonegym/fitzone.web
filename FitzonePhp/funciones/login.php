<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
/*declaro el array vacio para guardar los datos, si es que estan en la base de datos.
sino lo devuelve vacion.*/
    $Usuario= array();

/*Hago la consulta de que me obtenga los campos id, nombre, apellido, Idnivel e imagen de la tabla Usuarios donde el campo Usuario sea el valor que le estoy enviando $vUsuario y donde el campo clave sea igual al dato que le estoy enviando por $vClave*/
    $SQL= "SELECT Id, Nombre, Apellido, Imagen
    FROM administradores
    WHERE Clave= '$vClave' AND Usuario= '$vUsuario' ";

 /*A la conexion actual le brindo mi consulta, y el resultado lo entrego a la variable $rs*/
 //La funcion MYSQLY_QUERY se usa para enviar una consulta SQL a la base de datos MYSQL y ejecutarla.
    $rs= mysqli_query($vConexion, $SQL);

 /*En este apartado me va a devolver todos los datos en el caso de que haya en un array para luego asignarselo a mi array $Usuarios y devolverla*/
    $data= mysqli_fetch_array($rs);
    if(!empty($data)){
        $Usuario['ID']= $data['Id'];
        $Usuario['NOMBRE']= $data['Nombre'];
        $Usuario['APELLIDO']= $data['Apellido'];
        //Acá lo que hago es que si en la base de datos no se encuentra ninguna imagen definida que use User.png por defecto y sino que use la que esta en la BD.
        if(empty($data['Imagen'])){
            $data['Imagen']= 'user.png';
        }
        $Usuario['IMG']= $data['Imagen'];
 }
 return $Usuario;
}
?>