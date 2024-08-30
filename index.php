<?php
session_start ();
require_once 'config/conexion.php';
include ('plantillas/nav.php');


$pedido = "SELECT * FROM categorias";

$pedir = mysqli_query($conexion, $pedido);


$categorias = [];

while ($filas = mysqli_fetch_assoc($pedir)) {

    $categorias[] = $filas;

};

?>

<!-- Encabezado -->
<header class="text-white text-center py-5" id="headerTitulo">
  <div class="container">
      <h1 class="text-white">bienvenidos a nuestra tienda!!</h1>
      <p class="lead text-black">Las mejores marcas y productos en un solo lugar!!</p>
      <a href="productos.php" class="btn btn-primary btn-lg">Comprar ahora</a>
  </div>
</header>

<!-- Contenido principal -->
<main class="container py-4">

<h2 class="text-center mb-4">Lo más destacado</h2>
<div class="row">
<?php
 foreach ($categorias as $categoria) {

    echo '
  
      <div class="col-md-4 py-3">
          <div class="card">
              <img src="assets/portadas/'.$categoria['portada_categoria'].'" class="card-img-top" alt="Producto 1">
              <div class="card-body">
                  <h5 class="card-title">'.$categoria['categoria'].'</h5>
                  <p class="card-text">'.$categoria['descripcion_categoria'].'</p>
                  <a href="productos.php?id_categoria='.$categoria['id_categoria'].'"  class="btn btn-primary">Ver más</a>
              </div>
          </div>
      </div>
    ';

 };

?>
</div>  

</main>

<!-- Pie de página -->
<?php 

    include ('plantillas/footer.php');

?>

