<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gimnasio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$action = $_POST['action'];

if ($action == 'update') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE socios SET nombre='$nombre', apellido='$apellido', dni='$dni', direccion='$direccion', email='$email', telefono='$telefono' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Socio actualizado correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error actualizando socio: ' . $conn->error]);
    }
} elseif ($action == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM socios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Socio eliminado correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error eliminando socio: ' . $conn->error]);
    }
}

$conn->close();
?>
