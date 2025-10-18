<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php'); 

include('../app/controllers/almacen/cargar_producto.php');

foreach ($datos_productos as $dato_productos){ 
    $codigo = $dato_productos['codigo'];
    $nombre = $dato_productos['nombre'];
    $nombre_categoria = $dato_productos['nombre_categoria'];
    $stock = $dato_productos['stock'];
    $stock_minimo = $dato_productos['stock_minimo'];
    $stock_maxino = $dato_productos['stock_maxino'];
    $precio_compra = $dato_productos['precio_compra'];
    $precio_venta = $dato_productos['precio_venta'];
    $fecha_ingreso = $dato_productos['fecha_ingreso'];
    $email = $dato_productos['email'];
    $descripcion = $dato_productos['descripcion'];
    $imagen = $dato_productos['imagen'];
}

?>

<?php

if(isset($_SESSION['mensaje6'])) {
    $respuesta = $_SESSION['mensaje6']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Producto no creado",
        icon: "error"
   });
</script>

<?php
  unset($_SESSION['mensaje6']);

}

?>



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Producto: <?php echo $nombre; ?></h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> Datos del Producto</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-md-12">
                        
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Codigo: </label>
                                    
                                        <input type="text" class="form-control" value="<?php echo $codigo;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del producto: </label>
                                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Categoria: </label>
                                        <div style="display: flex;">
                                       <input type="text" class="form-control" value="<?php echo $nombre_categoria; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock: </label>
                                        <input type="text" name="stock" class="form-control" value="<?php echo $stock;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock minimo: </label>
                                        <input type="text" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock maximo: </label>
                                        <input type="text" name="stock_maxino" class="form-control" value="<?php echo $stock_maxino;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Compra: </label>
                                        <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Venta: </label>
                                        <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha ingreso: </label>
                                        <input type="text" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso;?>" disabled>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-4">
                                     <div class="form-group">
                                        <label for="">Usuario:</label>
                                        <input type="text" class="form-control" value="<?php echo $email;?>" disabled>
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion?>" hidden>
                                     </div>
                                    </div>
                                    <div class="col-md-8">
                                         <div class="form-group">
                                            <label for="">Descripcion del producto:</label>
                                            <textarea name="descripcion" id=""  cols="30" rows="2"  disabled class="form-control" ><?php echo $descripcion;?></textarea>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Igamen del producto:</label>
                                        <center>
                                            <img src="<?php echo $URL."/almacen/img_productos/".$imagen;?>" width="100%" alt="">
                                        </center>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <center>
                                    <a href="index.php" class="btn btn-secondary col-md-5">Regresar</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('../layout/parte2.php'); ?>


