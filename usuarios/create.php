<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php'); 

include('../app/controllers/roles/listado_de_roles.php');

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Registro de un nuevo usuario</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar Usuario</h3>

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
                        <form action="../app/controllers/usuario/create.php" method="post">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus nombres" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Ingrese su email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Rol</label>
                                <select name="rol" id="" class="form-control" required>
                                  
                                  <?php
                                    foreach ($datos_roles as $dato_roles) { ?>

                                     <option value="<?php echo $dato_roles['id_rol']?>"><?php echo $dato_roles['rol']?></option>

                                   <?php
                                    }
                                  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="password_user" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Verificar contraseña</label>
                                <input type="text" name="password_repeat" class="form-control" required>
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
<?php include ('../layout/mensajes.php'); ?>

