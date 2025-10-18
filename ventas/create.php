<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 

include ('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');




?>

<?php

if(isset($_SESSION['mensaje6'])) {
    $respuesta = $_SESSION['mensaje6']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Producto no registrado en el carrito",
        icon: "error"
   });
</script>

<?php
  unset($_SESSION['mensaje6']);

}

?>


<?php

if(isset($_SESSION['mensaje7'])) {
    $respuesta = $_SESSION['mensaje7']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Venta no registrada",
        icon: "error"
   });
</script>

<?php
  unset($_SESSION['mensaje7']);

}

?>


<?php

if(isset($_SESSION['mensaje1'])) {
    $respuesta = $_SESSION['mensaje1']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Gracias por su compra",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje1']);

}

?>



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ventas</h1>
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
            <div class="card card-outline card-primary">
              <div class="card-header">
                <?php 
                    $contador_de_ventas = 0;
                    foreach($datos_ventas as $dato_ventas){
                        $contador_de_ventas = $contador_de_ventas + 1;
                    }
                ?>
                <h3 class="card-title">Venta nro  
                    <input type="text" style="text-align: center" value="<?php echo $contador_de_ventas + 1;?>" disabled> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <b>Carrito </b>

                <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#modal-buscar-producto">
                                    <i class="fa fa-search"></i>
                                    Buscar Producto
                                </button>
                                 <!-- Modal para visualizar proveedores -->
                                 <div class="modal fade" id="modal-buscar-producto">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0155b6ff; color: black;" >
                                        <h4 class="modal-title">Buscar del Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

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
                        <th><center>Seleccionar</center></th>
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
                                <button href="" class="btn btn-info" id="btn_seleccionar<?php echo $id_producto;?>" >
                                    Seleccionar
                      </button>
                      <script>
                        $('#btn_seleccionar<?php echo $id_producto;?>').click(function(){

                           var id_producto = "<?php echo $id_producto?>";
                            $('#id_producto').val(id_producto);

                            var producto = "<?php echo $dato_productos['nombre']?>";
                            $('#producto_v').val(producto);

                            var detalle = "<?php echo $dato_productos['descripcion']?>";
                            $('#detalle_v').val(detalle);

                            var precio_Unitario = "<?php echo $dato_productos['precio_venta']?>";
                            $('#precio_v').val(precio_Unitario);

                            $('#cantidad_v').focus();


                           // $('#modal-buscar-producto').modal('hide');

                        });
                      </script>
                            </td>
                            



                        </tr>
                        
                      <?php  
                      }
                      ?>
                    </tbody>
                
                </table>
                      
                        <div class="row">
                            <div class="col-md-3">
                                <div class="font-group">
                                    <input type="text" id="id_producto" class="form-control" hidden>  
                                    <label for="">Producto</label>
                                    <input type="text" id="producto_v" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Detalle</label>
                                    <input type="text" id="detalle_v" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" id="cantidad_v" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="font-group">
                                    <label for="">Precio Unitario</label>
                                    <input type="text" id="precio_v" class="form-control" disabled>
                                </div>
                            </div>
                        </div> 

                        <br>

                        <button style="float: right" id="btn_registrar_carrito" class="btn btn-primary">Registrar</button>
                        <div id="respuesta_carrito"></div>
                        <script>
                        $('#btn_registrar_carrito').click(function(){

                            var nro_venta = '<?php echo $contador_de_ventas + 1;?>';
                            var id_producto = $('#id_producto').val();
                            var cantidad = $('#cantidad_v').val();

                            if(id_producto == ""){

                              alert("Debe seleccionar un producto");


                            }else if(cantidad == ""){

                              alert("Debe ingresar una cantidad valida");
                            }else{
                              var url = "../app/controllers/ventas/registrar_carrito.php";
                                        $.get(url, {nro_venta:nro_venta,id_producto:id_producto,cantidad:cantidad}, function(datos){
                                            $('#respuesta_carrito').html(datos);
                                        });
                            }

                            

                        });
                        </script>
                        <br><br>

                 </div>
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <br><br>
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Nro</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Producto</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Detalle</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Cantidad</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Precio Unitario</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Precio Subtotal</center></th>
                                        <th style="background-color: #e7e7e7;text-align: center"><center>Accion</center></th>
                                    </tr>
                                </thead>
                               
                                <tbody>

                                    <?php 
                                      $contador_de_carrito = 0;
                                      $nro_venta = $contador_de_ventas + 1;
                                      $cantidad_total = 0;
                                      $precio_unitario_total = 0;
                                      $precio_subtotal = 0;
                                      
                                      $sql_carrito = "SELECT *, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta, pro.stock as stock, pro.id_producto as id_producto FROM tb_carrito AS carr INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito DESC";
                                      $query_carrito = $pdo->prepare($sql_carrito);
                                      $query_carrito->execute();
                                      $datos_carrito = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                      foreach($datos_carrito as $dato_carrito){
                                        $id_carrito = $dato_carrito['id_carrito'];
                                        $contador_de_carrito = $contador_de_carrito + 1; 
                                        $cantidad_total = $cantidad_total + $dato_carrito['cantidad'];
                                        $precio_unitario_total = $precio_unitario_total + $dato_carrito['precio_venta'];
                                        $precio_subtotal = $precio_subtotal + ($dato_carrito['cantidad'] * $dato_carrito['precio_venta']);
                                        ?>
                                        
                                      
                                        <tr>
                                          <td>
                                            <center><?php echo $contador_de_carrito; ?></center>
                                            <input type="text" id="id_producto<?php echo $contador_de_carrito; ?>" value="<?php echo $dato_carrito['id_producto'];?>" hidden>
                                          </td>
                                          <td><center><?php echo $dato_carrito['nombre_producto']; ?></center></td>
                                          <td><center><?php echo $dato_carrito['descripcion']; ?></center></td>
                                          <td><center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $dato_carrito['cantidad']; ?></span></center>
                                            <input type="text" value="<?php echo $dato_carrito['stock']; ?>" id="stock_inventario<?php echo $contador_de_carrito; ?>" hidden>
                                        </td>
                                          <td><center><?php echo $dato_carrito['precio_venta']; ?></center></td>
                                          <td>
                                            <center>
                                              <?php 
                                                $cantidad = floatval($dato_carrito['cantidad']);
                                                $precio_venta = floatval($dato_carrito['precio_venta']);
                                               echo $subtotal = $cantidad * $precio_venta;
                                               
                                              ?>
                                            </center>
                                          </td>
                                          <td>
                                            <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                              <center>
                                                <input type="text" name="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                                <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Eliminar</button>
                                              </center>
                                            </form>
                                          </td>
                                        </tr>
                                          
                                    <?php  
                                      }
                                      
                                    ?>

                                    <tr>
                                        <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
                                        <th>
                                          <center>
                                            <?php echo $cantidad_total; ?>
                                          </center>
                                        </th>
                                        <th>
                                          <center>
                                            <?php echo $precio_unitario_total; ?>
                                          </center>
                                        </th>
                                        <th>
                                          <center>
                                            <?php echo $precio_subtotal; ?>
                                          </center>
                                        </th>
                                    </tr>

                                </tbody>

                               </table>
                                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-9">
              <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del Cliente </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <b>Cliente </b>

                <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#modal-buscar-cliente">
                                    <i class="fa fa-search"></i>
                                    Buscar Cliente
                                </button>
                                 <!-- Modal para visualizar clientes -->
                                 <div class="modal fade" id="modal-buscar-cliente">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0164d6ff; color: black;" >
                                        <h4 class="modal-title">Buscar Cliente</h4>
                                        <div style="width: 10px;"></div>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" 
                                    data-target="#modal-agregar-cliente">
                                    <i class="fa fa-user-plus"></i>
                                    Agregar Cliente
                                </button>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                           <div class="table-responsive">
                  <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>No</center></th>
                        <th><center>Nombre del Cliente</center></th>
                        <th><center>NIT/DPI</center></th>
                        <th><center>Celular</center></th>
                        <th><center>Email</center></th>
                        <th><center>Seleccionar</center></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php
                      
                        $contador_cliente = 0;
                      foreach ($datos_clientes as $dato_clientes){ 
                        $id_cliente = $dato_clientes['id_cliente'];
                        $contador_cliente = $contador_cliente + 1;
                        ?>

                        <tr>
                            <td><center><?php echo $contador_cliente;?></center></td>
                            <td><center><?php echo $dato_clientes['nombre_cliente'];?></center></td>
                            <td><center><?php echo $dato_clientes['nit_ci_cliente'];?></center></td>
                            <td><center><?php echo $dato_clientes['celular_cliente'];?></center></td>
                            <td><center><?php echo $dato_clientes['email_cliente'];?></center></td>
                            <td><center>
                              <button id="btn_cliente_<?php echo $id_cliente; ?>" class="btn btn-info">Seleccionar</button>
                              <script>
                                $('#btn_cliente_<?php echo $id_cliente; ?>').click(function() {

                                  var id_cliente = "<?php echo $dato_clientes['id_cliente']?>";
                                  $('#id_cliente').val(id_cliente);

                                  var nombre_cliente = "<?php echo $dato_clientes['nombre_cliente']?>";
                                  $('#nombre_cliente').val(nombre_cliente);

                                  var nit_cliente = "<?php echo $dato_clientes['nit_ci_cliente']?>";
                                  $('#nit_cliente').val(nit_cliente);

                                  var celular_cliente = "<?php echo $dato_clientes['celular_cliente']?>";
                                  $('#celular_cliente').val(celular_cliente);

                                  var correo_cliente = "<?php echo $dato_clientes['email_cliente']?>";
                                  $('#correo_cliente').val(correo_cliente);

                                  $('#modal-buscar-cliente').modal('hide');
                                });
                              </script>
                            </center></td>

                        </tr>
                        
                      <?php  
                      }
                      ?>
                    </tbody>
                
                </table>
                      
                 </div>
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <br><br>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <input type="text" id="id_cliente" hidden>
                                      <label for="">Nombre del Cliente</label>
                                      <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="">Nit/DPI del cliente</label>
                                      <input type="text" class="form-control" id="nit_cliente" name="nit_cliente" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="">Celular del cliente</label>
                                      <input type="text" class="form-control" id="celular_cliente" name="celular_cliente" disabled >
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="">Correo del cliente</label>
                                      <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" disabled>
                                    </div>
                                  </div>
                                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-3">
              <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar Venta </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                      <div class="form-group">
                        <label for="">Monto a Cancelar</label>
                        <input type="text" class="form-control"  id="total_cancelar" name="monto_total" value="<?php echo $precio_subtotal; ?>" disabled >
                        
                      </div>
                     <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                        <label for="">Total Pagado</label>
                        <input type="text" class="form-control" id="total_pagado" name="monto_pagado">
                        <script>
                            $('#total_pagado').keyup(function(){
                              var total_cancelar = $('#total_cancelar').val();
                              var total_pagado = $('#total_pagado').val();
                              var cambio = parseFloat(total_pagado) - parseFloat(total_cancelar);
                              $('#cambio').val(cambio);
                            });
                        </script>
                      </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                        <label for="">Cambio</label>
                        <input type="text" class="form-control" id="cambio" name="cambio" disabled>
                      </div>
                      </div>
                     </div>
                     <hr>
                        <div class="form-group">
                           <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar Venta</button>
                            <div id="respuesta_registro_venta"></div>
                           <script>
                            $('#btn_guardar_venta').click(function(){

                              var nro_venta = '<?php echo $contador_de_ventas + 1;?>';
                              var id_cliente = $('#id_cliente').val();
                              var total_cancelar = $('#total_cancelar').val();

                              if(id_cliente == ""){

                                alert("Debe seleccionar un cliente");
                              }else{
                               
                                actualizar_stock();
                                guardar_venta();
                              }
                             
                              function actualizar_stock(){
                                 var i = 1;
                                var n = '<?php echo $contador_de_carrito;?>';
                               
                                for (i = 1; i <= n; i++){
                                  var a = '#stock_inventario'+i;
                                  var stock_inventario = $(a).val();
                                  var b = '#cantidad_carrito'+i;
                                  var cantidad_carrito = $(b).html();
                                  var c = '#id_producto'+i;
                                  var id_producto = $(c).val();

                                  var stock_calculado = parseFloat(stock_inventario - cantidad_carrito);

                                  var url2 = "../app/controllers/ventas/actualizar_inventario.php";
                                        $.get(url2, {id_producto:id_producto, stock_calculado:stock_calculado}, function(datos){
                                           
                                        });
  
                                }
                              }

                              function guardar_venta(){
                                var url = "../app/controllers/ventas/registro_de_ventas.php";
                                        $.get(url, {nro_venta:nro_venta,id_cliente:id_cliente,total_cancelar:total_cancelar}, function(datos){
                                            $('#respuesta_registro_venta').html(datos);
                                        });
                              }
                              
                            });
                           </script>
                        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
                     


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
       
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });




  $(function () {
    $("#example2").DataTable({
        "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
              "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
              "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Proveedores",
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
       
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });


   $(function () {
    $("#example3").DataTable({
        "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
              "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
              "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Clientes",
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
       
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


 <!-- Modal para Crear clientes -->
                                 <div class="modal fade" id="modal-agregar-cliente">
                                    <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #FDD600; color: black;" >
                                        <h4 class="modal-title">Nuevo Cliente</h4>
                                        <div style="width: 10px;"></div>
                                        
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                           <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                                            <div class="form-group">
                                              <label for="">Nombre del Cliente</label>
                                              <input type="text" class="form-control" name="nombre_cliente" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="">NIT/DPI del Cliente</label>
                                              <input type="text" class="form-control" name="nit_ci_cliente" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Celular del Cliente</label>
                                              <input type="text" class="form-control" name="celular_cliente" required>
                                            </div>
                                            <div class="form-group">
                                              <label for="">Correo del Cliente</label>
                                              <input type="email" class="form-control" name="email_cliente" required>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                              <button type="submit" class="btn btn-warning btn-block">Guardar Cliente</button>
                                            </div>
                                           </form>
                                
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->

                                    </div>
                                    <!-- /.modal-dialog -->
                                     
                                


