<?php
session_start();
require_once 'config/conexion.php';
include ('plantillas/nav.php');

if (isset($_GET['id']) ) {

 $id_producto = $_GET['id'];

 $peticion =  "SELECT nombre_producto, descripcion_corta, 
               descripcion_larga, foto_producto, precio, stock,
                M.nombre_marca,
                M.logo_marca,
                C.categoria
               FROM productos P
               JOIN marcas M ON P.id_marca = M.id_marca
               JOIN categorias C ON p.id_categoria = C.id_categoria
               WHERE P.id_producto = '$id_producto'";

    $sql = mysqli_query($conexion , $peticion);

    $publicaciones = [];

    while  ($filas = mysqli_fetch_assoc($sql)) {

        $productos[] = $filas;
    };

   foreach ($productos as $producto) {
echo '<div class="container ">
    <h2>Editar Publicación</h2>

    <form method="POST" action="procesos/actualizar.php">
     <img src="assets/'.$producto['foto_producto'].'"class="img-top" style="width: 20%; height: 20%;" alt="">
      <img src="assets/'.$producto['logo_marca'].'"class="img-top" style="width: 20%; height: 20%;" alt="">
    <label for="archivo" class="d-flex">Actualiza tus imagenes</label>
              <input type="file" class="form-control-file py-3 d-flex" 
              name="archivo" id="archivo" placeholder="" aria-describedby="fileHelpId">
        <div class="form-group d-flex flex-column">
            <label for="titulo">Precio</label>
            <input type="text" class="form-control p-2" id="titulo" name="titulo" value="'.$producto['precio'].'">
        </div>
         <div class="form-group d-flex flex-column">
            <label for="titulo">Stock</label>
            <input type="text" class="form-control p-2" id="titulo" name="titulo" value="'.$producto['stock'].'">
        </div>
        <div class="form-group d-flex flex-column">
            <label for="titulo">Nombre del prodcuto</label>
            <input type="text" class="form-control p-2" id="titulo" name="titulo" value="'.$producto['nombre_producto'].'">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción corta</label>
            <textarea class="form-control" id="descripcion"  style="height: 100px ; width: 70%;" name="descripcion">'.$producto['descripcion_corta'].'</textarea>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción larga</label>
            <textarea class="form-control" id="descripcion" style="height: 200px ; width: 70%;" name="descripcion">'.$producto['descripcion_larga'].'</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>



<input type="hidden" name="id_usuario" value="'.$_SESSION['usuario']['id_usuario'].'">';
        $_SESSION['actualizar'] = $productos;
        $_SESSION['iniciado'] = 'si';
   } 

}else {
    header('Location: administracion.php');
}




?>


 
<?php include 'plantillas/footer.php'; ?>

<link rel="stylesheet" href="css/bootstrap.min.css">
