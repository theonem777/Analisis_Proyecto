<?php

include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php'); 
include('../app/controllers/usuario/Update_usuario.php');
include('../app/controllers/roles/listado_de_roles.php');

?>

<?php
if(isset($_SESSION['mensaje4'])) {
    $respuesta = $_SESSION['mensaje4']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Las contraseñas no coinciden",
        icon: "error"
   });
</script>

<?php
    unset($_SESSION['mensaje4']);
}

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Usuario <?php echo $nombres;?></h1>
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
                <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Actualizar Usuario</h3>

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
                        
                           <form action="../app/controllers/usuario/Update.php" method="post">
                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_get;?>" hidden>
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" placeholder="Ingrese sus nombres" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Ingrese su email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Rol</label>
                                <select name="rol" id="" class="form-control" required>
                                  
                                  <?php
                                    foreach ($datos_roles as $dato_roles) { 
                                      $rol_tabla = $dato_roles['rol'];
                                      $id_rol = $dato_roles['id_rol']; ?>

                                     <option value="<?php echo $id_rol;?>" 
                                     <?php 
                                     if($rol_tabla == $rol){?>

                                        selected="selected"

                                    <?php }
                                     ?> ><?php echo $rol_tabla?></option>

                                   <?php
                                    }
                                  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input type="text" name="password_user" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Verificar contraseña</label>
                                <input type="text" name="password_repeat" class="form-control">
                            </div>
                            <hr>
                            <div class="form-group">
                                <center>
                                <a href="index.php" class="btn btn-secondary col-md-5">Cancelar</a>
                                <button type="submit" class="btn btn-success col-md-5">Actualizar</button>
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

