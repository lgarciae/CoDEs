<?php
  require("conectDB.php");

    if (isset($_POST["enviar"])){
      $proyecto = strtoupper(htmlspecialchars($_POST["proyecto"]));
      $colabora = strtoupper(htmlspecialchars($_POST["colabora"]));
      $solicito = strtoupper(htmlspecialchars($_POST["solicito"]));
      $finicio  = $_POST["finicio"];
      $ffinal   = $_POST["ffinal"];
      $estatus  = $_POST["estatus"];
      $quienes  = $_SESSION["USUARIO"];

      $sql = "INSERT INTO proyectos (pr_nombre, pr_colaboradores, pr_solicito, pr_inicio, pr_fin, pr_status, pr_baja ,log_usuario)
              VALUES ('$proyecto', '$colabora', '$solicito','$finicio','$ffinal','$estatus',0,'$quienes')";
      $stmt = $conn->prepare($sql);

      try {
          $stmt->execute();
            echo "<script>
                    alert('El proyecto $proyecto a sido agregado de manera adecuada !!');
                        location.href='./capProyecto.php';
                  </script>";
      } catch(PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
    }
  $conn = null;
}
?>
