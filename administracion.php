<?php
session_start();
require_once 'config/conexion.php';
include 'plantillas/nav.php';

$sqlPublicaciones = "SELECT * FROM productos";

$resultado = mysqli_query($conexion, $sqlPublicaciones);

$publicaciones = [];

while ($filas = mysqli_fetch_assoc($resultado)) {
    $productos[] = $filas;
}
?>

<div class="container">
    <h2 class="text-center mt-4">Productos</h2>
    <table class="table">
        <thead>
            <tr class="table-secondary">
                <th class="text-center">Id</th>
                <th class="text-center">Título</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($productos as $producto):
             ?>
            <tr class="table-primary">
                <td><?php echo $producto['id_producto']; ?></td>
                <td><?php echo $producto['nombre_producto']; ?></td>
                <td><?php echo $producto['descripcion_corta']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-warning px-4 py-2">Editar</a>
                    <a href="procesos/borrar.php?id=<?php echo $producto['id_producto']; ?>" class="btn btn-danger px-3 py-2">Borrar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'plantillas/footer.php'; ?>