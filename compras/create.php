<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 

include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');



?>

<?php

if(isset($_SESSION['mensaje6'])) {
    $respuesta = $_SESSION['mensaje6']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Compra no registrada",
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
            <h1 class="m-0">Registro de una nueva Compra</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-9">
                <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar Compra</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
               <h5>Datos del Producto</h5>
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

                            var producto = "<?php echo $dato_productos['id_producto']?>";
                            $('#id_producto').val(producto);

                            var codigo = "<?php echo $dato_productos['codigo']?>";
                            $('#codigo_producto').val(codigo);
                             
                            var nombre = "<?php echo $dato_productos['nombre']?>";
                            $('#nombre_producto').val(nombre);
                            var categoria = "<?php echo $dato_productos['nombre_categoria']?>";
                            $('#categoria_producto').val(categoria);
                            var stock = "<?php echo $dato_productos['stock']?>";
                            $('#stock_producto').val(stock);

                            var stock = "<?php echo $dato_productos['stock']?>";
                            $('#stock_actual').val(stock);
                            
                            var descripcion = "<?php echo $dato_productos['descripcion']?>";
                            $('#descripcion_producto').val(descripcion);
                            
                            var stock_minimo = "<?php echo $dato_productos['stock_minimo']?>";
                            $('#stock_minimo_producto').val(stock_minimo);
                            var stock_maxino = "<?php echo $dato_productos['stock_maxino']?>";
                            $('#stock_maxino_producto').val(stock_maxino);
                            var precio_compra = "<?php echo $dato_productos['precio_compra']?>";
                            $('#precio_compra_producto').val(precio_compra);
                            var precio_venta = "<?php echo $dato_productos['precio_venta']?>";
                            $('#precio_venta_producto').val(precio_venta);
                            
                            var fecha_ingreso = "<?php echo $dato_productos['fecha_ingreso']?>";
                            $('#fecha_ingreso_producto').val(fecha_ingreso);
                            var email = "<?php echo $dato_productos['email']?>";
                            $('#usuario_producto').val(email);

                            var ruta_img = "<?php echo $URL.'/almacen/img_productos/'.$dato_productos['imagen'];?>";
                            $('#img_producto').attr({src: ruta_img});

                            $('#modal-buscar-producto').modal('hide');

                        });
                      </script>
                            </td>
                            



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
                                <!-- /.modal -->
               <hr>
               <div class="row" style="font-size: 12px;">
                                <div class="col-md-9">
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" id="id_producto" hidden>
                                        <label for="">Codigo: </label>
                                    
                                        <input type="text" class="form-control" id="codigo_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del producto: </label>
                                        <input type="text" name="nombre" class="form-control" id="nombre_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Categoria: </label>
                                        <div style="display: flex;">
                                       <input type="text" class="form-control" id="categoria_producto" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                 <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock: </label>
                                        <input type="text" name="stock" class="form-control" id="stock_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock minimo: </label>
                                        <input type="text" name="stock_minimo" class="form-control" id="stock_minimo_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Stock maximo: </label>
                                        <input type="text" name="stock_maxino" class="form-control" id="stock_maxino_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Compra: </label>
                                        <input type="text" name="precio_compra" class="form-control" id="precio_compra_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Precio Venta: </label>
                                        <input type="text" name="precio_venta" class="form-control" id="precio_venta_producto" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Fecha ingreso: </label>
                                        <input type="text" name="fecha_ingreso" class="form-control" id="fecha_ingreso_producto" disabled>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-4">
                                     <div class="form-group">
                                        <label for="">Usuario:</label>
                                        <input type="text" class="form-control" id="usuario_producto" disabled>
                                        
                                     </div>
                                    </div>
                                    <div class="col-md-8">
                                         <div class="form-group">
                                            <label for="">Descripcion del producto:</label>
                                            <textarea name="descripcion" id="descripcion_producto"  cols="30" rows="2"  disabled class="form-control" ></textarea>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Igamen del producto:</label>
                                        <center>
                                            <img src="<?php echo $URL."/almacen/img_productos/".$imagen;?>" id="img_producto" width="100%" alt="">
                                        </center>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            
                        

                        <div class="card-body" style="display: block;">
               <h5>Datos del Proveedor</h5>
               <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#modal-buscar-proveedor">
                                    <i class="fa fa-search"></i>
                                    Buscar Proveedor
                                </button>
                                 <!-- Modal para visualizar proveedores -->
                                 <div class="modal fade" id="modal-buscar-proveedor">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #0155b6ff; color: black;" >
                                        <h4 class="modal-title">Buscar del Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                           <div class="table-responsive">
                                                    <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>No</center></th>
                        <th><center>Nombre del proveedor</center></th>
                        <th><center>Celular</center></th>
                        <th><center>Telefono de la Empresa</center></th>
                        <th><center>Nombre Empresa</center></th>
                        <th><center>Email</center></th>
                        <th><center>Direccion</center></th>
                        <th><center>Acciones</center></th>
                  </tr>
                  </thead>
                   <tbody>
                      <?php
                      
                        $contador = 0;
                      foreach ($datos_proveedores as $dato_proveedores){
                        $id_proveedor = $dato_proveedores['id_proveedor']; 
                        $nombre_proveedor = $dato_proveedores['nombre_proveedor'];
                        $celular = $dato_proveedores['celular'];
                        $email = $dato_proveedores['email'];
                        $telefono = $dato_proveedores['telefono']; 
                        $empresa = $dato_proveedores['empresa'];
                        $direccion = $dato_proveedores['direccion'];
                        ?>
                        
                        <tr>
                            <td><center><?php echo $contador = $contador +1;?></center></td>
                            <td><center><?php echo $dato_proveedores['nombre_proveedor'];?></center></td>
                            <td>
                                <a href="https://wa.me/502<?php echo $dato_proveedores['celular'];?>" target="_blank" class="btn btn-success">
                                    <i class="fa fa-phone"></i>
                                    <center><?php echo $dato_proveedores['celular'];?></center>
                                </a>
                            </td>
                            <td><center><?php echo $dato_proveedores['telefono'];?></center></td>
                            <td><center><?php echo $dato_proveedores['empresa'];?></center></td>
                            <td><center><?php echo $dato_proveedores['email'];?></center></td>
                            <td><center><?php echo $dato_proveedores['direccion'];?></center></td>
                            <td><center>
                                <button href="" class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor;?>" >
                                    Seleccionar
                      </button>
                      <script>
                        $('#btn_seleccionar_proveedor<?php echo $id_proveedor;?>').click(function (){
                           var id_proveedor = '<?php echo $id_proveedor;?>';
                            $('#id_proveedor').val(id_proveedor);
                            var nombre_proveedor = '<?php echo $nombre_proveedor;?>';
                            $('#nombre_proveedor').val(nombre_proveedor);
                            var celular = '<?php echo $celular;?>';
                            $('#celular_proveedor').val(celular);
                            var empresa = '<?php echo $empresa;?>';
                            $('#empresa_proveedor').val(empresa);
                            var telefono = '<?php echo $telefono;?>';
                            $('#telefono_proveedor').val(telefono);
                            var email = '<?php echo $email;?>';
                            $('#email_proveedor').val(email);
                            var direccion = '<?php echo $direccion;?>';
                            $('#direccion_proveedor').val(direccion);

                            $('#modal-buscar-proveedor').modal('hide');
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
                                <hr>
                                
                                     <div class="row">
                    <div class="col-md-4">
                             <div class="form-group">
                                <input type="text" id="id_proveedor" hidden>
                                <label for="">Nombre del proveedor</label>
                                <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre de la Empresa</label>
                                <input type="text" id="empresa_proveedor" class="form-control" disabled>
                               
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                <label for="">Celular del proveedor</label>
                                <input type="text" id="celular_proveedor" class="form-control" disabled>
                               
                            </div>
                    </div>

                </div>

                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" id="telefono_proveedor" class="form-control" disabled>
                               
                        </div>

                    </div>
                     <div class="col-md-4">
                            
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="text" id="email_proveedor" class="form-control" disabled>
                                
                            </div>
                            
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Direccion del proveedor</label>
                                <input type="text" id="direccion_proveedor" class="form-control" disabled>
                                
                            </div>
                            
                        </div>
                </div>
              
                        </div>
                        
              </div>
              <!-- /.card-body -->
            </div>
            
            </div>
            
        </div>
            </div>
            <div class="col-md-3">
                    
                    <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalles de la compra</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php 
                                        $contador_de_compras = 1;
                                        foreach ($datos_compras as $dato_compras){
                                            $contador_de_compras = $contador_de_compras + 1;
                                        }
                                    ?>
                                    <label for="">Numero de la compra</label>
                                    <input type="text" value="<?php echo $contador_de_compras?>" class="form-control" disabled>
                                    <input type="text" value="<?php echo $contador_de_compras?>" id="nro_compra" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de la compra</label>
                                    <input type="Date" class="form-control" id="fecha_compra">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante de la compra</label>
                                    <input type="text" class="form-control" id="comprobante">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio de la compra</label>
                                    <input type="text" class="form-control" id="precio_compra">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock Actual</label>
                                    <input type="text" id="stock_actual" class="form-control" disabled>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stock Total</label>
                                    <input type="text" id="stock_total" class="form-control" disabled>
                                </div>
                            </div>

                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Cantidad de la compra</label>
                                    <input type="number" id="cantidad" class="form-control" >
                                </div>
                                <script>
                                    $('#cantidad').keyup(function() {
                                        var stock_actual = $('#stock_actual').val();
                                        var stock_compra = $('#cantidad').val();
                                        var total = parseInt( stock_actual) + parseInt( stock_compra);
                                        
                                        $('#stock_total').val(total);
                                        
                                    });
                                </script>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" value="<?php echo $email_sesion?>" class="form-control" disabled>
                                </div>
                            </div>                           
                        </div>
                        
                            <hr>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar Compra</button>
                                </div>
                                <div id="respuesta_compra"></div>
                            </div>
                            <script>

                                $('#btn_guardar_compra').click(function (){

                                    var id_producto = $('#id_producto').val();
                                    var nro_compra = $('#nro_compra').val();
                                    var fecha_compra = $('#fecha_compra').val();
                                    var id_proveedor = $('#id_proveedor').val();
                                    var comprobante = $('#comprobante').val();
                                    var id_usuario = '<?php echo $id_usuario_sesion;?>';
                                    var precio_compra = $('#precio_compra').val();
                                    var cantidad = $('#cantidad').val();
                                    var stock_total = $('#stock_total').val();

                                     if(id_producto == ""){

                                        $('#id_producto').focus();
                                        alert("Debe LLenar todos los campos");


                                    }else if(fecha_compra == ""){

                                        $('#fecha_compra').focus();
                                        alert("Debe LLenar todos los campos");
                                    }else if(comprobante == ""){

                                        $('#comprobante').focus();
                                        alert("Debe LLenar todos los campos");
                                    }else if(precio_compra == ""){

                                        $('#precio_compra').focus();
                                        alert("Debe LLenar todos los campos");
                                    }else if(cantidad == ""){
                                        $('#cantidad').focus();
                                        alert("Debe LLenar todos los campos");
                                    }
                                    else{
                                        var url = "../app/controllers/compras/create.php";
                                        $.get(url, {id_producto:id_producto,nro_compra:nro_compra, fecha_compra:fecha_compra, id_proveedor:id_proveedor,comprobante:comprobante,id_usuario:id_usuario,precio_compra:precio_compra,cantidad:cantidad,stock_total:stock_total}, function(datos){
                                            $('#respuesta_compra').html(datos);
                                        });
                                    }
                                   


                                });    






                            </script>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
</script>



