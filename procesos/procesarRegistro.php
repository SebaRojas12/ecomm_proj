<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require_once '../config/conexion.php';
    if(strlen($_POST['mail'])<5){
            $_SESSION['error'] = 'Ingrese una dirección de correo válida';
            header('location: registro.php');
        } else {
            $email = mysqli_real_escape_string($conexion, $_POST['mail']);
        }
    $username = $_POST['username'];
    $password = $_POST['contra'];
    $telefono = $_POST['telefono'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $consultaExistencia = "SELECT
     nombre_usuario,
     mail

     FROM  usuarios 

     WHERE mail = '$email' OR nombre_usuario = '$username'";

  
    $resultado = mysqli_query ($conexion, $consultaExistencia);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
       echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Datos ya exitentes!!</strong> <a href="../registro.php" class="alert-link">Intenta con otros datos</a>
</div>';
       
    }else{ 
        $registrarUsuario = 'INSERT INTO usuarios (
            nombre_usuario,
            mail,
            clave,
            nombre,
            apellido,
            numero_cel,
            id_nivel) values ("'.$username.'","'.$email.'","'.$password.'","'.$nombre.'","'.$apellido.'","'.$telefono.'",2)';
        
        $query = mysqli_query($conexion, $registrarUsuario);
        header('location: ../login.php');
    }

    
}
?>

<link rel="stylesheet" href="../styles/bootstrap.min.css">