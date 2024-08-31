<?php
session_start();
require_once 'config/conexion.php';
include ('plantillas/nav.php');
?>

<header class="text-white text-center py-2" id="headerTitulo">
  <div class="container">
      <h3>-Productos-</h3>
      <form class="d-flex ms-auto my-2 my-lg-0" role="search" method="GET"  action="productos.php">
        <input class="form-control me-2" type="search" name="busqueda"  placeholder="Buscar productos" aria-label="Buscar">
        <button class="btn btn-outline-light" type="submit" >Buscar</button>
    </form>
  </div>
</header>

<main class="container my-5">
  

<div class="row">
      <!-- Lista de Productos -->
      <div class="col">
        <div class="row">


<?php


if (isset($_GET['id_categoria'])) {

     $categoria = $_GET ['id_categoria'];

     $consultaProductos = "SELECT * FROM productos WHERE id_categoria = '$categoria'";

     $query = mysqli_query($conexion, $consultaProductos);

     $filtro = [];

     while ($filas = mysqli_fetch_assoc($query)) {

        $filtro[] = $filas;
    
    };

    foreach ($filtro as $filtrado) {

        echo '<div class="col-md-3">
              <div class="card mb-4">
                  <img src="assets/'.$filtrado['foto_producto'].'" class="card-img-top" alt="Producto 1">
                  <div class="card-body">
                      <h5 class="card-title">'.$filtrado['nombre_producto'].'</h5>
                      <p class="card-text">'.$filtrado['descripcion_corta'].'</p>
                      <p class="card-text"><strong>$'.$filtrado['precio'].'</strong></p>
                  </div>
              </div>
          </div>';

    }




} elseif (isset($_GET['busqueda'])) {
 
$busqueda = $_GET['busqueda'];

$busqueda = strtolower($busqueda);

 $pedirProdbuscados = "SELECT productos.*, categorias.categoria 
    FROM productos
    JOIN categorias 
    ON productos.id_categoria = categorias.id_categoria 
    WHERE lower(nombre_producto)
    LIKE '%$busqueda%' 
    OR lower(descripcion_corta) 
    LIKE '%$busqueda%'
    OR lower(categorias.categoria) LIKE  '%$busqueda%'";

    $peticion = mysqli_query($conexion, $pedirProdbuscados);

    $buscados = [];

    while ($filas = mysqli_fetch_assoc($peticion)) {

       $buscados[] = $filas;
   
   };

   foreach ($buscados as $buscado) {

       echo '<div class="col-md-3">
             <div class="card mb-4">
                 <img src="assets/'.$buscado['foto_producto'].'" class="card-img-top" alt="Producto 1">
                 <div class="card-body">
                     <h5 class="card-title">'.$buscado['nombre_producto'].'</h5>
                     <p class="card-text">'.$buscado['descripcion_corta'].'</p>
                     <p class="card-text"><strong>$'.$buscado['precio'].'</strong></p>
                 </div>
             </div>
         </div>';



   }



}
 else {
    $pedirProductos= "SELECT * FROM productos";

    $ejecutar = mysqli_query($conexion, $pedirProductos);

    $productos = [];

    while ($filas = mysqli_fetch_assoc($ejecutar)) {

       $productos[] = $filas;
   
   };



   foreach ($productos as $producto) {

       echo '<div class="col-md-3">
             <div class="card mb-4">
                 <img src="assets/'.$producto['foto_producto'].'" class="card-img-top" alt="">
                 <div class="card-body">
                     <h5 class="card-title">'.$producto['nombre_producto'].'</h5>
                     <p class="card-text">'.$producto['descripcion_corta'].'</p>
                     <p class="card-text"><strong>$'.$producto['precio'].'</strong></p>
                 </div>
             </div>
         </div>';

   }
}
  
?>





        
        </div>
      </div>
  </div>
</main>







<?php

include ('plantillas/footer.php');

?>