<?php
  require("conectDB.php");

    if (isset($_POST["enviar"])){
      $nombre   = strtoupper(htmlspecialchars($_POST["nombre"]));
      $direc1   = strtoupper(htmlspecialchars($_POST["direc1"]));
      $direc2   = strtoupper(htmlspecialchars($_POST["direc2"]));
      $url      = htmlspecialchars($_POST["url"]);
      $pais     = strtoupper(htmlspecialchars($_POST["pais"]));
      $estado   = strtoupper(htmlspecialchars($_POST["estado"]));
      $moneda   = strtoupper(htmlspecialchars($_POST["moneda"]));
      $cp       = htmlspecialchars($_POST["cp"]);
      $rfc      = strtoupper(htmlspecialchars($_POST["rfc"]));
      $correo   = htmlspecialchars($_POST["correo"]);
      $telefono = htmlspecialchars($_POST["telefono"]);

      try {
      // invocamos el SP correspondiente y mandamos los parametros solicitados
      $sql = "CALL sp_insert_proveedor('$nombre','$direc1','$direc2','$url','$pais', '$estado', '$moneda', '$cp', '$rfc','$telefono','$correo');";
      $conn->exec($sql);
      echo "<script>
              alert('El proveedor $nombre con correo $correo a sido agregado exitosamente !!');
              location.href='./capProveedor.php';
            </script>";
      } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    } // del catch
  $conn = null;
} // del if
?>
