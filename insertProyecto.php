<?php
      require("conectDB.php");
      session_start();

      $proyecto = strtoupper(htmlspecialchars($_POST["proyecto"]));
      $colabora = strtoupper(htmlspecialchars($_POST["colabora"]));
      $solicito = strtoupper(htmlspecialchars($_POST["solicito"]));
      $finicio  = $_POST["finicio"];
      $ffinal   = $_POST["ffinal"];
      $estatus  = $_POST["estatus"];
      $acuerdo  = $_POST["acuerdo"];
      $quienes  = $_SESSION["USUARIO"];

      $sql = "INSERT INTO proyectos (pr_nombre, pr_colaboradores, pr_solicito, pr_inicio, pr_fin, pr_status, pr_baja, pr_acuerdo, log_usuario)
              VALUES ('$proyecto', '$colabora', '$solicito','$finicio','$ffinal','$estatus',0, '$acuerdo','$quienes')";
      $stmt = $conn->prepare($sql);

      try {
          $stmt->execute();
      } catch(PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
    }
  $conn = null;
?>
