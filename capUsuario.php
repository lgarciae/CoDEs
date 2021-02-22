<?php
  require("cabecera.php");
?>

  <body>
    <br>
    <div class="container" style="margin: auto; width:350px; background-color:#fff; padding:auto; opacity:0.8; -webkit-box-shadow: 9px 15px 13px 0px rgba(0,0,0,0.75); -moz-box-shadow: 9px 15px 13px 0px rgba(0,0,0,0.75); box-shadow: 9px 15px 13px 0px rgba(0,0,0,0.75);">
      <div class="" align="center">
          <img src="./img/imagen.png" align="middle" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
      </div>

      <form method="post" action="insertUsuario.php">
        <div class="encabezado">
          <h3>Crear cuenta</h3>
          <hr>
        </div>

        <div class="form-group">
          <label for="nombre">Nombre Completo.:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico.:</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="form-group">
          <label for="contra">Contraseña.:</label>
          <input type="password" class="form-control" id="contra" name="contra" required>
        </div>

        <button type="submit" class="btn btn-primary" name="enviar">Crear tu cuenta</button>
        <!--<button type="reset" class="btn btn-default" name="borrar">Limpiar</button>-->
        <a class="btn btn-danger pull-right" href="./index.php">Salir</a>
        <hr>

      </form>
    </div>
    <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
  </body>
</html>
