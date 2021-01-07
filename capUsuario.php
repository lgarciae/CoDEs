<?php
  require("cabecera.php");
?>

  <body>
    <br><br>
    <div class="container" style="margin: auto; width:400px; background-color:#fff; padding:auto;">
      <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">

      <form method="post" action="insertUsuario.php">
        <div class="encabezado">
          <h3>Nuevo Usuario</h3>
          <hr>
        </div>

        <div class="form-group">
          <label for="nombre">Nombre Completo.:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" required autofocus>
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico.:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@dominio.com" required>
        </div>

        <div class="form-group">
          <label for="contra">Password.:</label>
          <input type="password" class="form-control" id="contra" name="contra" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
        <button type="reset" class="btn btn-default" name="borrar">Limpiar</button>
        <a class="btn btn-danger pull-right" href="./index.php">Salir</a>
        <hr>

      </form>
    </div>
    <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
  </body>
</html>
