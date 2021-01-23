<?php
  require("cabecera.php");
?>

  <body>
    <div class="container" style="margin: auto; background-color:#fff; padding:auto;">
      <div class="row">

      <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">

      <form method="post" action="insertProyecto.php">
        <div class="encabezado">
          <h3>Nuevo Proyecto</h3>
          <hr>
        </div>

        <div class="form-group">
          <label for="proyecto">Nombre Proyecto.:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Nombre proyecto" required autofocus>
        </div>

        <div class="form-group">
          <label for="colabora">Colaborador(es).:</label>
          <input type="text" class="form-control" id="colabora" name="colabora" placeholder="Colaborador/(es)" required>
        </div>

        <div class="form-group">
          <label for="solicito">Solicitó.:</label>
          <input type="text" class="form-control" id="solicito" name="solicito" placeholder="Solicitó" required>
        </div>

        <div class="form-group col-md-3">
          <label for="inicio">Fecha Inicial</label>
          <input type="date" class="form-control" id="finicio" name="finicio" placeholder="Fecha Inicio" required>
        </div>

        <div class="form-group col-md-3">
          <label for="final">Fecha Final</label>
          <input type="date" class="form-control" id="ffinal" name="ffinal" placeholder="Fecha Final" required>
        </div>

        <div class="form-group col-md-6">
          <label for="estatus">Status</label>
            <select id="estatus" name="estatus" class="form-control">
              <option value="ANALISIS DE REQUERIMIENTOS">ANALISIS DE REQUERIMIENTOS</option>
              <option value="DISEÑO">DISEÑO</option>
              <option value="DESARROLLO">DESARROLLO</option>
              <option value="PRUEBAS">PRUEBAS</option>
              <option value="PRODUCCION">PRODUCCION</option>
              <option value="GO LIVE">GO LIVE</option>
              <option value="MANTENIMIENTO">MANTENIMIENTO</option>
            </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
          <button type="reset"  class="btn btn-default" name="borrar">Limpiar</button>
          <a href="./proyectos.php" class="btn btn-danger pull-right">Salir</a>
        </div>

        <hr>

       </form>
      </div>
    </div>
      <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
  </body>
