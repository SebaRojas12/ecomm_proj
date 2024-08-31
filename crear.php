<?php
session_start();
require_once 'config/conexion.php';
include('plantillas/nav.php');

$consultaIdcat = 'SELECT * FROM categorias';

$sql = mysqli_query($conexion, $consultaIdcat);

$tiposCat = [];

while ($filas = mysqli_fetch_assoc($sql)) {
    $tiposCat []= $filas;
}






?>
<h2 class="text-center mt-3">Ingresar nuevo producto</h2>

<div class="row justify-content-center"> 
<form action="procesos/crearNuevo.php" method="POST" enctype="multipart/form-data" class="col-md-6 mt-4">
            <div class="form-group">
                <label for="titulo" class="label py-3">Nombre del producto</label>
                <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre" id="titulo">
            </div>
            <div class="form-group">
                <label for="titulo" class="label py-3">Precio</label>
                <input type="text" class="form-control" name="precio" placeholder="Precio" id="titulo">
            </div>
            <div class="form-group">
                <label for="titulo" class="label py-3">Stock</label>
                <input type="text" class="form-control" name="stock" placeholder="Unidades" id="titulo">
            </div>
           
             <div class="form-group">
                <label for="descripcion">Coloca tu descripcion corta aquí</label>
                <textarea class="form-control" name="descripcion_corta" id="descripcion" rows="2" cols="10"></textarea>
                </div> 
                <div class="form-group">
                <label for="descripcion">Coloca tu descripcion larga aquí</label>
                <textarea class="form-control" name="descripcion_larga" id="descripcion" rows="2" cols="10"></textarea>
                </div> 
            <div class="form-group">
                        <label for="categoria">Elige una categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                        <?php 
                        foreach ($tiposCat as $tipoCategoria){
                                echo '<option value="'.$tipoCategoria['id_categoria'].'">'.$tipoCategoria['categoria'].'</option>';
                        }
                        ?>
                        </select>
            </div>
                
            <div class="form-group">
              <label for="archivo">Subir imagenes</label>
              <input type="file" class="form-control-file py-3 d-flex" name="archivo" id="archivo" placeholder="" aria-describedby="fileHelpId">
              <small id="fileHelpId" class="form-text text-muted"></small>
            </div>
            <div class="text-center py-3">            
                <input type="submit" value="Crear" class="btn btn-secondary btn-lg mt-3 ">
            </div>
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_usuario']; ?>">
           
</div>
<?php
include('plantillas/footer.php');
?>

