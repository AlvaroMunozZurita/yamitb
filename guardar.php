<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';

    $ruta = "";

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = "uploads/" . $imagen;

        if (!file_exists("uploads")) {
            mkdir("uploads", 0777, true);
        }

        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    }

    $sql = "INSERT INTO reportes 
    (titulo, descripcion, categoria, tipo, ubicacion, imagen) 
    VALUES 
    ('$titulo','$descripcion','$categoria','$tipo','$ubicacion','$ruta')";

    if ($conexion->query($sql)) {
        echo "ok";
    } else {
        echo "error: " . $conexion->error;
    }
}
?>