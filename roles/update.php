<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php'); 

include('../app/controllers/roles/update_roles.php');

?>

<?php

if(isset($_SESSION['mensaje4'])) {
    $respuesta = $_SESSION['mensaje4']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Rol no actualizado",
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
            <h1 class="m-0">Actualizar rol</h1>
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
                <h3 class="card-title">Datos del rol</h3>

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
                        <form action="../app/controllers/roles/update.php" method="post">
                            <div class="form-group">
                                <input type="text" value="<?php echo $id_rol_get;?>" name="id_rol" hidden>
                                <label for="">Nombre del rol</label>
                                <input type="text" name="rol" class="form-control" value="<?php echo $rol;?>" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <a href="index.php" class="btn btn-secondary col-md-5">Cancelar</a>
                                <button type="submit" class="btn btn-success col-md-5">Actualizar</button>
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


