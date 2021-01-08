<?php
    require("conectDB.php");
    session_start();

    if (isset($_POST["enviar"])){
      $nombre = strtoupper(htmlspecialchars($_POST["nombre"]));
      $correo = htmlspecialchars($_POST["correo"]);
      $contra = htmlspecialchars($_POST["contra"]);
      $contra = password_hash($contra, PASSWORD_DEFAULT);

      try {
      // invocamos el SP correspondiente y mandamos los parametros solicitados
      $sql = "CALL sp_insert_usuario('$nombre','$correo','$contra','2','now()');";
      $conn->exec($sql);
      echo "<script>
              alert('$nombre con correo $correo ha sido agregado exitosamente !!');
              location.href='./login.php';
            </script>";
      } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    } // del catch
  $conn = null;
} // del if
?>
