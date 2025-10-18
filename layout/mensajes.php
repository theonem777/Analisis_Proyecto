<?php

if(isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
        Swal.fire({
         title: "JEY GT",
         text: "Las contraseñas no coinciden",
        icon: "error"
   });
</script>

<?php
  unset($_SESSION['mensaje']);

}

?>
