<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require_once '../config/conexion.php';

    

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    $archivo = $_FILES['archivo']['name'];

    $archivo = mysqli_real_escape_string($conexion, $archivo);
    
    $destinoArchivo = '../assets/' . $archivo ;

    move_uploaded_file($_FILES['archivo']['tmp_name'] , $destinoArchivo);

    $id_usuario = $_POST['id_usuario'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_corta= $_POST['descripcion_corta'];
    $descripcion_larga= $_POST['descripcion_larga'];
    $precio= $_POST['precio'];
    $stock= $_POST['stock'];
    $categoria = $_POST['categoria'];

    $consulta = 'INSERT INTO productos (
            nombre_producto,
            id_categoria,
            stock,
            descripcion_corta,
            descripcion_larga,
            precio,
            foto_producto)
            VALUES ("'.$nombre_producto.'","'.$categoria.'","'.$stock.'", "'.$descripcion_corta.'", "'.$descripcion_larga.'","'.$precio.'", "'.$archivo.'")';

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo '<div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Publicación creada correctamente!</strong>
        </div>';
        header('location: ../index.php'); 
    } else {
        echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Error al crear la publicacion!!</strong> ' . mysqli_error($conexion) . '
  <a href="../crearPublicacion.php" 
  class="alert-link">Intenta de nuevo</a>
</div>';
    }
}else {
    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Error al crear la publicacion!!</strong> ' . mysqli_error($conexion) . '
  <a href="../crearPublicacion.php" 
  class="alert-link">Intenta de nuevo</a>
</div>';
}
}
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">