<?php
session_start();
require_once '../config/conexion.php';

if (isset($_POST['guardar_cambios'])) {
    $id_producto = $_SESSION['actualizar'][0]['id_producto'];   

    // Obtener los nuevos valores desde el formulario
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_corta = $_POST['descripcion_corta'];
    $descripcion_larga = $_POST['descripcion_larga'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Construir la consulta de actualización
    $consulta = "
        UPDATE productos 
        SET 
            nombre_producto = '$nombre_producto', 
            descripcion_corta = '$descripcion_corta', 
            descripcion_larga = '$descripcion_larga', 
            precio = '$precio', 
            stock = '$stock'
        WHERE 
            id_producto = '$id_producto'
    ";

    
        header('location: ../administracion.php');

    
}else {
        echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Datos incorrectos!!</strong> <a href="../administracion.php" class="alert-link">Intenta de nuevo</a>
</div>';}