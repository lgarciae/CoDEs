<?php
    require('conectDB.php');

    if (isset($_POST["enviar"])){
      $mensaje    = "";
      $correo     = htmlspecialchars($_POST["correo"]);
      $contra     = htmlspecialchars($_POST["password"]);
      try {
          $sql   = "SELECT * FROM usuarios WHERE us_correo = ?";
          $stmt  = $conn->prepare($sql);
          $stmt  -> execute(array($correo));
          $resultado = $stmt->fetch(PDO::FETCH_ASSOC); //como es una consulta puntual solo se espera un correo en la entrada, por eso se usa fetch; si fuera más de uno sería fecthall
          if ($resultado)
            {
              $usuario      = $resultado["us_username"];
              $contraBD     = $resultado["us_password"];
              $rol          = $resultado["us_rol"];
              if (password_verify($contra,$contraBD)) {
                session_start();
                $_SESSION["ID"]     = session_id();
                $_SESSION["USUARIO"]= $resultado["us_username"];
                $_SESSION["STATUS"] = "ACTIVA";
                $_SESSION["ROL"]    = $rol;
                $_SESSION["CORREO"] = $correo;
                if ($rol == 1) {
                  echo "
                    <script>
                      location.href='./menuAdmin.php';
                    </script>
                  ";
                } elseif ($rol == 2) {
                  echo "
                    <script>
                      location.href='./menUsuario.php';
                    </script>
                  ";
                }
            } else {
              $mensaje = "Password incorrecto !!!  <br>";
            }
          }  else {
            $mensaje = $correo . " no existe en nuestra Base de Datos !!! <br>";
          }
      } catch (PDOException $e) {
            echo $e->getMessage();
        }
        echo $mensaje . "<br>";
      }
?>
<a href="./login.php">Regresar</a>
