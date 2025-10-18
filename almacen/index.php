<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 
include('../app/controllers/almacen/listado_de_productos.php');


if(isset($_SESSION['mensaje1'])) {
    $respuesta = $_SESSION['mensaje1']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Producto guardado correctamente",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje1']);

}

if(isset($_SESSION['mensaje6'])) {
    $respuesta = $_SESSION['mensaje6']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Producto actualizado correctamente",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje6']);

}

if(isset($_SESSION['mensaje5'])) {
    $respuesta = $_SESSION['mensaje5']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "producto Eliminado correctamente",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje5']);

}


?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Productos</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <!-- Contenido -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Productos Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>No</center></th>
                        <th><center>Codigo</center></th>
                        <th><center>Categoria</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Descripcion</center></th>
                        <th><center>Stock</center></th>
                        <th><center>Precio Venta</center></th>
                        <th><center>imagen</center></th>
                        <th><center>Acciones</center></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php
                      
                        $contador = 0;
                      foreach ($datos_productos as $dato_productos){ 
                        $id_producto = $dato_productos['id_producto'];
                        ?>

                        <tr>
                            <td><?php echo $contador = $contador + 1;?></td>
                            <td><?php echo $dato_productos['codigo'];?></td>
                            <td><?php echo $dato_productos['nombre_categoria'];?></td>
                            <td><?php echo $dato_productos['nombre'];?></td>
                            <td><?php echo $dato_productos['descripcion'];?></td>
                            <td><?php echo $dato_productos['stock'];?></td>
                            <td><?php echo $dato_productos['precio_venta'];?></td>
                            <td>
                                <img src="<?php echo $URL."/almacen/img_productos/".$dato_productos['imagen'];?>" width="100" alt="">
                            </td>

                            <td>
                                <center>
                              <div class="btn-group">
                        <a href="show.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                        <a href="Update.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-success  btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                        <a href="delete.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i> Borrar</a>
                      </div>
                             </center>
                            </td>



                        </tr>
                        
                      <?php  
                      }
                      ?>
                    </tbody>
                
                </table>
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

</script>

<?php include ('../layout/parte2.php'); ?>


<script>
  $(function () {
    $("#example1").DataTable({
        "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Prodcutos",
              "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
              "infoFiltered": "(Filtrado de _MAX_ total Productos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Productos",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
        buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy'
                        }, {
                            extend: 'pdf',
                        }, {
                            extend: 'csv',
                        }, {
                            extend: 'excel',
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visor de columnas'
                           // collectionLayout: 'fixed three-column',
                        }
                    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

