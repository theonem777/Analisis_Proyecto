<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 
include('../app/controllers/compras/listado_de_compras.php');


if(isset($_SESSION['mensaje1'])) {
    $respuesta = $_SESSION['mensaje1']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Compra registrada correctamente",
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
        title: "Se actualizo la compra de la manera correcta",
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
        title: "Se borro la compra de la manera correcta",
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
            <h1 class="m-0">Listado de Compras</h1>
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
                <h3 class="card-title">Compras Registradas</h3>

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
                        
                        <th><center>Nro Compra</center></th>
                        <th><center>Producto</center></th>
                        <th><center>Fecha Compra</center></th>
                        <th><center>Proveedor</center></th>
                        <th><center>Comprobante</center></th>
                        <th><center>Usuario</center></th>
                        <th><center>Precio</center></th>
                        <th><center>Cantidad</center></th>
                        <th><center>Acciones</center></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php
                      
                        $contador = 0;
                      foreach ($datos_compras as $dato_compras){ 
                        $id_compra = $dato_compras['id_compra'];
                        ?>

                        <tr>
                           <td><?php echo $contador = $contador + 1;?></td>
                           
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" 
                                    data-target="#modal-producto<?php echo $id_compra;?>">
                                     <?php echo $dato_compras['nombre_producto'];?>
                                </button>
                                <!-- Modal para visualizar productos -->
                                 <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0155b6ff; color: black;" >
                                        <h4 class="modal-title">Datos del Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-9">



                                            <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="form-group">
                                                        <label for="">Codigo</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['codigo'];?>" disabled>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label for="">Nombre Del Producto</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['nombre'];?>" disabled>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['descripcion'];?>" disabled>
                                                      </div>
                                                    </div>
                                                </div>

                                                    <div class="row">
                                                      <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label for="">Stock Precio</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['stock_producto'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label for="">Stock minimo</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['stock_minimo_producto'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label for="">Stock maximo</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['stock_maxino_producto'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      <div class="col-md-2">
                                                          <div class="form-group">
                                                        <label for="">Precio Compra</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['precio_compra'];?>" disabled>
                                                      </div>
                                                      
                                                      </div>
                                                       <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label for="">Precio venta</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['precio_venta'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      
                                                  </div>

                                                  <div class="row">
                                                   
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label for="">Fecha Ingreso</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['fecha_ingreso'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="">Categoria</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['nombre_categoria'];?>" disabled>
                                                      </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="">Nombre Usuario</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['nombre_usuario'];?>" disabled>
                                                      </div>
                                                      </div>
                                           
                                                 </div>

                                                 <div class="row">
                                                  
                                                 </div>

                                            </div>
                                            <div class="col-md-3">

                                              <div class="form-group">
                                                        <label for="">Imagen del Producto</label>
                                                        <img src="<?php echo $URL."/almacen/img_productos/".$dato_compras['imagen_producto'];?>" width="100%" alt=""> 
                                              </div>
                                            </div>
                                          </div>
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </td>
                            <td><?php echo $dato_compras['fecha_compra']?></td>
                            <td>
                               <button type="button" class="btn btn-info" data-toggle="modal" 
                                    data-target="#modal-proveedor<?php echo $id_compra;?>">
                                     <?php echo $dato_compras['nombre_proveedor']?>
                                </button>
                                 <!-- Modal para visualizar proveedores -->
                                 <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0155b6ff; color: black;" >
                                        <h4 class="modal-title">Datos del Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                        <label for="">Nombre Proveedor</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['nombre_proveedor_compra'];?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="">Empresa Proveedor</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['empresa_proveedor'];?>" disabled>
                                                      </div>
                                            </div>
                                            

                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                        <label for="">Celular Proveedor</label>
                                                          <a href="https://wa.me/502<?php echo $dato_compras['celular_proveedor'];?>" target="_blank" class="btn btn-success">
                                                            <i class="fa fa-phone"></i>
                                                            <?php echo $dato_compras['celular_proveedor'];?>
                                                          </a>
                                                      </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                        <label for="">Telefono Proveedor</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['telefono_proveedor'];?>" disabled>
                                                      </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-5">
                                              <div class="form-group">
                                                        <label for="">Email Proveedor</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['email_proveedor'];?>" disabled>
                                                      </div>
                                            </div>
                                            <div class="col-md-7">
                                              <div class="form-group">
                                                        <label for="">Direccion Proveedor</label>
                                                        <input type="text" class="form-control" value="<?php echo $dato_compras['direccion_proveedor'];?>" disabled>
                                                      </div>
                                            </div>
                                          </div>
                                          
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                              
                            </td>
                            <td><?php echo $dato_compras['comprobante']?></td>
                            <td><?php echo $dato_compras['nombre_usuario']?></td>
                            <td><?php echo $dato_compras['precio_compra']?></td>
                            <td><?php echo $dato_compras['cantidad']?></td>

                            <td>
                                <center>
                              <div class="btn-group">
                        <a href="show.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                        <a href="Update.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-success  btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                        <a href="delete.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i> Borrar</a>
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
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
              "infoEmpty": "Mostrando 0 to 0 of 0 Compras",
              "infoFiltered": "(Filtrado de _MAX_ total Compras)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Compras",
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

