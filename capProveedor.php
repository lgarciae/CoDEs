<?php
  require("cabecera.php");
?>

  <body>
    <br><br>
    <div class="container" style="margin: auto; width:650px; background-color:#fff; padding:auto;">
      <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">

      <form method="post" action="insertProveedor.php">
        <div class="encabezado">
          <h3>Nuevo Proveedor</h3>
          <hr>
        </div>

        <div class="form-group">
          <label for="nombre">Razón Social.:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Razón Social" required autofocus>
        </div>

        <div class="form-group">
          <label for="direc1">Domicilio Fiscal:</label>
          <input type="text" class="form-control" id="direc1" name="direc1" placeholder="Domicilio Fiscal" required >
        </div>

        <div class="form-group">
          <label for="direc2">Domicilio Atención.:</label>
          <input type="text" class="form-control" id="direc2" name="direc2" placeholder="Domicilio atención" required >
        </div>

        <div class="form-group">
          <label for="url">Homepage:</label>
          <input type="url" class="form-control" id="url" name="url" placeholder="HomePage" required >
        </div>

        <div class="form-group">
          <label for="pais">País.:</label>
          <input type="text" class="form-control" id="pais" name="pais" placeholder="País" required >
        </div>

        <div class="form-group">
          <label for="estado">Estado.:</label>
          <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required >
        </div>

        <div class="form-group">
          <label for="moneda">Moneda.:</label>
          <input type="text" class="form-control" id="moneda" name="moneda" placeholder="Moneda" required >
        </div>

        <div class="form-group">
          <label for="cp">Código Postal.:</label>
          <input type="text" class="form-control" id="cp" name="cp" placeholder="C.P." required >
        </div>

        <div class="form-group">
          <label for="rfc">R.F.C.:</label>
          <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" required >
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico.:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="correo@dominio.com" required>
        </div>

        <div class="form-group">
          <label for="telefono">Teléfono.:</label>
          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="999.999.99.99" pattern="[0-9]{3}.[0-9]{3}.[0-9]{2}.[0-9]{2}" required>
        </div>


        <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
        <button type="reset" class="btn btn-default" name="borrar">Limpiar</button>
        <p class="text text-right"><a class="btn btn-danger" href="./proveedores.php">Salir</a></p>
        <hr>

      </form>
    </div>
  </body>
</html>
