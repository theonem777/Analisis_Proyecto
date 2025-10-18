<?php
include ('app/config.php');
include ('layout/sesion.php');

include ('layout/parte1.php'); 
include ('app/controllers/usuario/listado_de_usuarios.php');
include ('app/controllers/roles/listado_de_roles.php');
include ('app/controllers/categorias/listado_de_categorias.php');
include ('app/controllers/almacen/listado_de_productos.php');
include ('app/controllers/proveedores/listado_de_proveedores.php');
include ('app/controllers/compras/listado_de_compras.php');
include ('app/controllers/ventas/listado_de_ventas.php');
include ('app/controllers/clientes/listado_de_clientes.php');

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Bienvenido a JEY Software GT - <?php echo $rol_sesion;?></h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        Clemcito
        <br>
        <br>

        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php 
                  $contador_usuarios = 0;
                  foreach($datos_usuarios as $dato_usuario){
                    $contador_usuarios = $contador_usuarios + 1;
                  }
                ?>
                <h3><?php echo $contador_usuarios?></h3>

                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/usuarios/create.php">
                <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php 
                  $contador_roles = 0;
                  foreach($datos_roles as $dato_rol){
                    $contador_roles = $contador_roles + 1;
                  }
                ?>
                <h3><?php echo $contador_roles?></h3>

                <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/roles/create.php">
                <div class="icon">
                <i class="fas fa-address-card"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/roles" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         

                  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <?php 
                  $contador_categorias = 0;
                  foreach($datos_categorias as $dato_categorias){
                    $contador_categorias = $contador_categorias + 1;
                  }
                ?>
                <h3><?php echo $contador_categorias?></h3>

                <p>Categorias Registradas</p>
              </div>
              <a href="<?php echo $URL;?>/Categorias/index.php">
                <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/Categorias" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <?php 
                  $contador_almacen = 0;
                  foreach($datos_productos as $dato_productos){
                    $contador_almacen = $contador_almacen + 1;
                  }
                ?>
                <h3><?php echo $contador_almacen?></h3>

                <p>Productos Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/almacen/create.php">
                <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/almacen" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


                  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <?php 
                  $contador_compra = 0;
                  foreach($datos_compras as $dato_compras){
                    $contador_compra = $contador_compra + 1;
                  }
                ?>
                <h3><?php echo $contador_compra?></h3>

                <p>Compras Registradas</p>
              </div>
              <a href="<?php echo $URL;?>/compras/create.php">
                <div class="icon">
                <i class="fas fa-cart-plus"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/compras" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


                   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">

                <?php 
                  $contador_proveedor = 0;
                  foreach($datos_proveedores as $dato_proveedores){
                    $contador_proveedor = $contador_proveedor + 1;
                  }
                ?>
                <h3><?php echo $contador_proveedor?></h3>

                <p>Proveedores Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/Proveedores/index.php">
                <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/Proveedores" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <?php 
                  $contador_ventas = 0;
                  foreach($datos_ventas as $dato_ventas){
                    $contador_ventas = $contador_ventas + 1;
                  }
                ?>
                <h3><?php echo $contador_ventas?></h3>

                <p>Ventas Registradas</p>
              </div>
              <a href="<?php echo $URL;?>/ventas/create.php">
                <div class="icon">
                <i class="fas fa-shopping-basket"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/ventas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <?php 
                  $contador_clientes = 0;
                  foreach($datos_clientes as $dato_clientes){
                    $contador_clientes = $contador_clientes + 1;
                  }
                ?>
                <h3><?php echo $contador_clientes?></h3>

                <p>Clientes Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/ventas/create.php">
                <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              </a>
              <a href="<?php echo $URL;?>/ventas/create.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include ('layout/parte2.php'); ?>

