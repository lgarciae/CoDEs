<?php
  require("cabecera.php");
  session_start();
?>
    <!--<body>-->
    <div class="container" style="margin: auto; background-color:#fff; padding:auto;">
      <div class="row">
      <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">

      <form method="post" id="frmProyectos">
        <div class="encabezado">
          <h3>Nuevo Proyecto</h3>
          <hr>
        </div>

        <div class="form-group col-md-12">
          <label for="proyecto">Nombre Proyecto.:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Nombre proyecto" required autofocus>
        </div>

        <div class="form-group col-md-6">
          <label for="colabora">Colaborador(es).:</label>
          <input type="text" class="form-control" id="colabora" name="colabora" placeholder="Colaborador/(es)" required>
        </div>

        <div class="form-group col-md-6">
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

        <div class="form-group col-md-3">
          <label for="estatus">Status</label>
            <select id="estatus" name="estatus" class="form-control">
              <option value="ANALISIS DE REQUERIMIENTOS" selected>ANALISIS DE REQUERIMIENTOS</option>
              <option value="DISEÑO">DISEÑO</option>
              <option value="DESARROLLO">DESARROLLO</option>
              <option value="PRUEBAS">PRUEBAS</option>
              <option value="PRODUCCION">PRODUCCION</option>
              <option value="GO LIVE">DETENIDO</option>
              <option value="MANTENIMIENTO">ACTUALIZACION</option>
            </select>
        </div>

        <div class="form-group col-md-3">
          <label for="acuerdo">Es acuerdo de Administración</label>
          <select id="acuerdo" name="acuerdo" class="form-control">
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
          </select>
        </div>

        <div class="form-group col-mod-12">
          <button type="submit" class="form-group btn btn-primary" id="enviar" name="enviar">Registrar</button>
          <button type="reset"  class="form-group btn btn-default" id="borrar" name="borrar">Limpiar</button>
          <a href="./proyectos.php" class="form-group btn btn-danger pull-right">Salir</a>
        </div>

        <hr>

       </form>
      </div>
    </div>
      <script src="jquery-3.4.1.min.js"></script>
      <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
  </body>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#enviar').click(function(){
        var datos=$('#frmProyectos').serialize();
        $.ajax({
              type   :"POST",
              url    :"insertProyecto.php",
              data   :datos,
              success:function(r){
                if (r=1){
                  alert("El proyecto fue agregado de manera exitosa !!!");
                  location.href='./proyectos.php';
                }else{
                  alert("Ocurrio un error al intentar grabar los datos en el servidor !!!");
                  location.href='./proyectos.php';
                }
              }
        });
        return false;
      });
    });
  </script>
