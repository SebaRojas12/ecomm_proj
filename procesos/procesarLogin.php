<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require_once '../config/conexion.php';
    
    $email = $_POST['email'];
    $password = $_POST['contra'];

    $consultaExistencia = "SELECT 
    id_usuario, 
    mail,
     U.id_nivel, 
     N.nivel
FROM usuarios U
JOIN niveles N
ON N.id_nivel = U.id_nivel
WHERE U.mail = '.$email.' AND U.clave = '.$password.'
LIMIT 1;
";

  
    $resultado = mysqli_query ($conexion, $consultaExistencia);

    if ($resultado && mysqli_num_rows($resultado) == 0) {
       echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Datos incorrectos!!</strong> <a href="../login.php" class="alert-link">Intenta de nuevo</a>
</div>';
       
    }else{ 
        
        $usuarioLogueado = mysqli_fetch_assoc($resultado);
       
        $_SESSION['usuario'] = $usuarioLogueado;
        $_SESSION['iniciado'] = 'si';
        header('location: ../index.php'); 
    }

    
}
?>

<link rel="stylesheet" href="../styles/bootstrap.min.css">

