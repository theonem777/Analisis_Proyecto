<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php'); 
include('../app/controllers/proveedores/listado_de_proveedores.php');


if(isset($_SESSION['mensaje1'])) {
    $respuesta = $_SESSION['mensaje1']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Se registro el proveedor correctamente",
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
        icon: "error",
        title: "Proveedor no Creado",
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
        title: "Se Actualizo el proveedor correctamente",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje5']);

}

if(isset($_SESSION['mensaje4'])) {
    $respuesta = $_SESSION['mensaje4']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "error",
        title: "No se Actualizo el proveedor",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje4']);

}

if(isset($_SESSION['mensaje2'])) {
    $respuesta = $_SESSION['mensaje2']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "error",
        title: "No se Elimino el proveedor",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje2']);

}

if(isset($_SESSION['mensaje3'])) {
    $respuesta = $_SESSION['mensaje3']; ?>
    <script>
        Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Se elimino el proveedor correctamente",
        showConfirmButton: false,
        timer: 2000
   });
</script>

<?php
  unset($_SESSION['mensaje3']);

}


?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Proveedores

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                 <i class="fa fa-plus"></i> Nuevo Proveedor
                </button>

            </h1>
            <br>
            
               

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
                <h3 class="card-title">Proveedores Registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                 <table id="example1" class="table table-bordered table-striped">
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
                              <div class="btn-group">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor;?>">
                                     <i class="fa fa-pencil-alt"></i> Editar
                                </button>

                                 <!-- modal para actualizar proveedores -->
                                    <div class="modal fade" id="modal-update<?php echo $id_proveedor;?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #01b610ff; color: black;" >
                                        <h4 class="modal-title">Actualizar proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <div class="row">
                    <div class="col-md-6">
                             <div class="form-group">
                                <label for="">Nombre del proveedor</label>
                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" value="<?php echo $nombre_proveedor;?>" class="form-control">
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                              </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Celular del proveedor</label>
                                <input type="text" id="celular_proveedor<?php echo $id_proveedor;?>" value="<?php echo $celular;?>" class="form-control">
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido </small>
                            </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Empresa</label>
                                <input type="text" id="empresa_proveedor<?php echo $id_proveedor;?>" value="<?php echo $empresa;?>" class="form-control">
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" id="telefono_proveedor<?php echo $id_proveedor;?>" value="<?php echo $telefono;?>" class="form-control" >
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                        </div>

                    </div>
                </div>
              
                <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="text" id="email_proveedor<?php echo $id_proveedor;?>" value="<?php echo $email;?>" class="form-control" >
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion del proveedor</label>
                                <input type="text" id="direccion_proveedor<?php echo $id_proveedor;?>" value="<?php echo $direccion;?>" class="form-control" >
                                <small style="color: red; display: none;" id="lbl_update<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                            
                        </div>
                            
                            
                </div>     

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-success" id="btn-update<?php echo $id_proveedor;?>">Actualizar Proveedor</button>
                                        
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <script>
                                        $('#btn-update<?php echo $id_proveedor;?>').click(function(){
                                            var nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor;?>').val();
                                            var celular = $('#celular_proveedor<?php echo $id_proveedor;?>').val();
                                            var empresa = $('#empresa_proveedor<?php echo $id_proveedor;?>').val();
                                            var telefono = $('#telefono_proveedor<?php echo $id_proveedor;?>').val();
                                            var email = $('#email_proveedor<?php echo $id_proveedor;?>').val();
                                            var direccion = $('#direccion_proveedor<?php echo $id_proveedor;?>').val();
                                            var id_proveedor = '<?php echo $id_proveedor;?>';

                                            if (nombre_proveedor == "") {
                                                //alert("El campo esta vacio");
                                                $('#nombre_proveedor<?php echo $id_proveedor;?>').focus();
                                                $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                            }else if (celular == "") {
                                                //alert("El campo esta vacio");
                                                $('#celular_proveedor<?php echo $id_proveedor;?>').focus();
                                                $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                             } 
                                              else if (empresa == "") {
                                                  //alert("El campo esta vacio");
                                                  $('#empresa_proveedor<?php echo $id_proveedor;?>').focus();
                                                  $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                              } else if (telefono == "") {
                                                  //alert("El campo esta vacio");
                                                  $('#telefono_proveedor<?php echo $id_proveedor;?>').focus();
                                                  $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                              } else if (email == "") {
                                                  //alert("El campo esta vacio");
                                                  $('#email_proveedor<?php echo $id_proveedor;?>').focus();
                                                  $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                              } else if (direccion == "") {
                                                  //alert("El campo esta vacio");
                                                  $('#direccion_proveedor<?php echo $id_proveedor;?>').focus();
                                                  $('#lbl_update<?php echo $id_proveedor;?>').css('display', 'block');
                                              }
                                            else {
                                                 var url = "../app/controllers/proveedores/update_de_proveedores.php";
                                                 $.get(url, {nombre_proveedor:nombre_proveedor, celular:celular, telefono:telefono, empresa:empresa, email:email, direccion:direccion,id_proveedor:id_proveedor}, function(datos){
                                                 $('#respuesta_update<?php echo $id_proveedor;?>').html(datos);
                   
                                             });
                                             }

                                            
                                        });
                                </script>
                                <div id="respuesta_update<?php echo $id_proveedor;?>"></div>

                                <!-- /.modal-fin -->
                      </div>

                                           <div class="btn-group">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor;?>">
                                     <i class="fa fa-trash"></i> Borrar
                                </button>

                                 <!-- modal para eliminar proveedores -->
                                    <div class="modal fade" id="modal-delete<?php echo $id_proveedor;?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #8d0101ff; color: black;" >
                                        <h4 class="modal-title">Eliminar proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                            <div class="row">
                    <div class="col-md-6">
                             <div class="form-group">
                                <label for="">Nombre del proveedor</label>
                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" value="<?php echo $nombre_proveedor;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                              </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Celular del proveedor</label>
                                <input type="text" id="celular_proveedor<?php echo $id_proveedor;?>" value="<?php echo $celular;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido </small>
                            </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Empresa</label>
                                <input type="text" id="empresa_proveedor<?php echo $id_proveedor;?>" value="<?php echo $empresa;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" id="telefono_proveedor<?php echo $id_proveedor;?>" value="<?php echo $telefono;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                        </div>

                    </div>
                </div>
              
                <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="text" id="email_proveedor<?php echo $id_proveedor;?>" value="<?php echo $email;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion del proveedor</label>
                                <input type="text" id="direccion_proveedor<?php echo $id_proveedor;?>" value="<?php echo $direccion;?>" class="form-control" disabled>
                                <small style="color: red; display: none;" id="lbl_delete<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                            </div>
                            
                        </div>
                            
                            
                </div>     

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" id="btn-delete<?php echo $id_proveedor;?>">Eliminar</button>
                                        
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <script>
                                        $('#btn-delete<?php echo $id_proveedor;?>').click(function(){
                                           
                                            var id_proveedor = '<?php echo $id_proveedor;?>';

                                            
                                            
                                                 var url2 = "../app/controllers/proveedores/delete.php";
                                                 $.get(url2, {id_proveedor:id_proveedor}, function(datos){
                                                 $('#respuesta_delete<?php echo $id_proveedor;?>').html(datos);
                   
                                             });
                                             

                                            
                                        });
                                </script>
                                <div id="respuesta_delete<?php echo $id_proveedor;?>"></div>

                                <!-- /.modal-fin -->
                      </div>
                                        
                             </center></td>
                        </tr>
                      <?php  
                      }
                      ?>
                    </tbody>
                </table>
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


<script>
  $(function () {
    $("#example1").DataTable({
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



<!-- modal para proveedores -->

 <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #FDD600; color: black;">
              <h4 class="modal-title">Crear Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                             <div class="form-group">
                                <label for="">Nombre del proveedor</label>
                                <input type="text" id="nombre_proveedor" class="form-control" placeholder="Ingrese el proveedor">
                                <small style="color: red; display: none;" id="lbl_nombre">* Este campo es requerido</small>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Empresa</label>
                                <input type="text" id="empresa_proveedor" class="form-control" placeholder="Ingrese la empresa">
                                <small style="color: red; display: none;" id="lbl_empresa">* Este campo es requerido</small>
                            </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Celular del proveedor</label>
                                <input type="text" id="celular_proveedor" class="form-control" placeholder="Ingrese el Celular">
                                <small style="color: red; display: none;" id="lbl_celular">* Este campo es requerido</small>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" id="telefono_proveedor" class="form-control" placeholder="Ingrese el Telefono">
                                <small style="color: red; display: none;" id="lbl_telefono">* Este campo es requerido</small>
                        </div>

                    </div>
                </div>
              
                <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="text" id="email_proveedor" class="form-control" placeholder="Ingrese el correo electronico">
                                <small style="color: red; display: none;" id="lbl_correo">* Este campo es requerido</small>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Direccion del proveedor</label>
                                <input type="text" id="direccion_proveedor" class="form-control" placeholder="Ingrese la direccion">
                                <small style="color: red; display: none;" id="lbl_direccion">* Este campo es requerido</small>
                            </div>
                            
                        </div>
                            
                            
                </div>  
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btn-create">Guardar Proveedor</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal-fin -->


      <script>
        $('#btn-create').click(function(){
           // alert("Se guardara la categoria");
              var nombre_proveedor = $('#nombre_proveedor').val();
              var celular = $('#celular_proveedor').val();
              var telefono = $('#telefono_proveedor').val();
              var empresa = $('#empresa_proveedor').val();
              var email = $('#email_proveedor').val();
              var direccion = $('#direccion_proveedor').val();

              if (nombre_proveedor == "") {
                  //alert("El campo esta vacio");
                  $('#nombre_proveedor').focus();
                   $('#lbl_nombre').css('display', 'block'); 
              } else if(empresa == "") {
                 //alert("El campo esta vacio");
                  $('#empresa_proveedor').focus();
                   $('#lbl_empresa').css('display', 'block'); 
              }else if(celular == "") {
                 //alert("El campo esta vacio");
                  $('#celular_proveedor').focus();
                   $('#lbl_celular').css('display', 'block'); 
              } else if(telefono == "") {
                 //alert("El campo esta vacio");
                  $('#telefono_proveedor').focus();
                   $('#lbl_telefono').css('display', 'block'); 
              } else if(email == "") {
                 //alert("El campo esta vacio");
                  $('#email_proveedor').focus();
                   $('#lbl_correo').css('display', 'block'); 
              } else if(direccion == "") {
                 //alert("El campo esta vacio");
                  $('#direccion_proveedor').focus();
                   $('#lbl_direccion').css('display', 'block'); 
              }
              else {
    var url = "../app/controllers/proveedores/registro_de_proveedor.php";
    $.get(url, {nombre_proveedor:nombre_proveedor, celular:celular, telefono:telefono, empresa:empresa, email:email, direccion:direccion}, function(datos){
        $('#respuesta').html(datos);
    });
}
            
           
        });
      </script>

      <div id="respuesta"></div>



     

