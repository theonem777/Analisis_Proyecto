<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php'); 
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/categorias/listado_de_categorias.php');

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
            <h1 class="m-0">Registro de un nuevo Producto</h1>
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
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar Producto</h3>

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
                        <form action="../app/controllers/almacen/create.php" method="post" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Codigo: </label>
                                        <?php 
                                        function ceros($numero){
                                         $len=0;
                                         $cantidad_ceros = 5;
                                         $aux=$numero;
                                         $pos=strlen($numero);
                                         $len=$cantidad_ceros-$pos;
                                           for ($i=0;$i<$len;$i++){
                                                $aux="0".$aux;
                                           }
                                            return $aux;
                                        }
                                        $contador_id_producto = 1;
                                         foreach ($datos_productos as $dato_productos){

                                            $contador_id_producto = $contador_id_producto + 1;
                                        
                                        }
                                        ?>
                                        <input type="text" class="form-control" value="<?php echo "P-".ceros($contador_id_producto);?>" disabled>
                                        <input type="text" name="codigo" value="<?php echo "P-".ceros($contador_id_producto);?>" hidden>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del producto: </label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Producto" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Categoria: </label>
                                        <div style="display: flex;">
                                            <select name="id_categoria" id="" class="form-control">
                                            <?php
                                             foreach ($datos_categorias as $dato_categoria){ ?>

                                                    <option value="<?php echo $dato_categoria['id_categoria'];?>">
                                                        <?php echo $dato_categoria['nombre_categoria'];?>
                                                    </option>

                                                <?php
                                             }
                                            ?>
                                            
                                        </select>
                                        <a href="<?php echo $URL;?>/Categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock: </label>
                                        <input type="number" name="stock" class="form-control" placeholder="Ingrese cantidad" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock minimo: </label>
                                        <input type="number" name="stock_minimo" class="form-control" placeholder="Ingrese cantidad">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock maximo: </label>
                                        <input type="number" name="stock_maxino" class="form-control" placeholder="Ingrese cantidad">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Compra: </label>
                                        <input type="number" name="precio_compra" class="form-control" placeholder="Ingrese precio" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Venta: </label>
                                        <input type="number" name="precio_venta" class="form-control" placeholder="Ingrese precio" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha ingreso: </label>
                                        <input type="date" name="fecha_ingreso" class="form-control" placeholder="Ingrese fecha" required>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-4">
                                     <div class="form-group">
                                        <label for="">Usuario:</label>
                                        <input type="text" class="form-control" value="<?php echo $email_sesion;?>" disabled>
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion?>" hidden>
                                     </div>
                                    </div>
                                    <div class="col-md-8">
                                         <div class="form-group">
                                            <label for="">Descripcion del producto:</label>
                                            <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Igamen del producto:</label>
                                        <input type="file" name="image" class="form-control" id="file">
                                        <br>
                                                <output id="list"></output>
                                                    <script>
                                                        function archivo(evt) {
                                                            var files = evt.target.files; // FileList object
                                                            // Obtenemos la imagen del campo "file".
                                                            for (var i = 0, f; f = files[i]; i++) {
                                                                //Solo admitimos imágenes.
                                                                if (!f.type.match('image.*')) {
                                                                    continue;
                                                                }
                                                                var reader = new FileReader();
                                                                reader.onload = (function (theFile) {
                                                                    return function (e) {
                                                                        // Insertamos la imagen
                                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                    };
                                                                })(f);
                                                                reader.readAsDataURL(f);
                                                            }
                                                        }
                                                        document.getElementById('file').addEventListener('change', archivo, false);
                                                    </script>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <a href="index.php" class="btn btn-secondary col-md-5">Cancelar</a>
                                <button type="submit" class="btn btn-primary col-md-5">Guardar</button>
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


