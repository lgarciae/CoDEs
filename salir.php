<?php
    session_start();
    // remove all session variables
    $usuario = $_SESSION["USUARIO"];
    session_unset();

    // destroy the session
    session_destroy();
    echo "<script>
          alert(' ! Hasta luego $usuario ¡' );
          location.href='./index.php';
          </script>";
?>
