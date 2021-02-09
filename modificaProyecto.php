<?php
    require("cabecera.php");
    require("conectDB.php");
    $post = get_ProyectoByID($_GET['id']);
    session_start();
?>
<body>
<div class="container" style="margin: auto; background-color:#fff; padding:auto;">
  <div class="row">
  <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">

   <!--<form method="post" action="./actualizaProyecto.php">-->
	 <form method="post" id="frmProyectos">
    	<div class="encabezado">
        <h3>Modificar Proyecto</h3>
        <hr>
      </div>
				<input type="hidden" name="id" value="<?php echo $post['id_proyecto']; ?>">
        <div class="form-group col-md-12">
          <label for="proyecto">Nombre Proyecto.:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" value="<?php echo $post['pr_nombre'];?>" placeholder="Nombre proyecto" required autofocus>
        </div>

        <div class="form-group col-md-6">
          <label for="colabora">Colaborador(es).:</label>
          <input type="text" class="form-control" id="colabora" name="colabora" value="<?php echo $post['pr_colaboradores'];?>" placeholder="Colaborador/(es)" required>
        </div>

        <div class="form-group col-md-6">
          <label for="solicito">Solicitó.:</label>
          <input type="text" class="form-control" id="solicito" name="solicito" value="<?php echo $post['pr_solicito'];?>" placeholder="Solicitó" required>
        </div>

        <div class="form-group col-md-3">
          <label for="inicio">Fecha Inicial.:</label>
          <input type="date" class="form-control" id="finicio" name="finicio" value="<?php echo $post['pr_inicio'];?>" placeholder="Fecha Inicio" required>
        </div>

        <div class="form-group col-md-3">
          <label for="final">Fecha Final</label>
          <input type="date" class="form-control" id="ffinal" name="ffinal" value="<?php echo $post['pr_fin'];?>" placeholder="Fecha Final" required>
        </div>

        <div class="form-group col-md-3">
          <label for="estatus">Status.: </label><?php echo " - " . $post['pr_status'] . " - " ;?>
          <select id="estatus" name="estatus" class="form-control">
            <option value="ANALISIS DE REQUERIMIENTOS" selected>ANALISIS DE REQUERIMIENTOS</option>
            <option value="DISEÑO">DISEÑO</option>
            <option value="DESARROLLO">DESARROLLO</option>
            <option value="PRUEBAS">PRUEBAS</option>
            <option value="PRODUCCION">PRODUCCION</option>
            <option value="DETENIDO">DETENIDO</option>
            <option value="ACTUALIZACION">ACTUALIZACION</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="acuerdo">Es acuerdo de Administración</label><?php echo " - " . $post['pr_acuerdo'] . " - ";?>
          <select id="acuerdo" name="acuerdo" class="form-control">
            <option value="0" selected>NO</option>
            <option value="1">SI</option>
          </select>
        </div>

        <div class="form-group col-md-12">
          <label for="notas">Comentarios.:</label><br>
          <textarea name="notas" rows="10" cols="168"><?php echo $post['pr_notas'];?></textarea>
          <!--<input type="text" class="form-control" id="notas" name="notas" value="<?php echo $post['pr_notas'];?>">-->
        </div>

        <div class="form-group col-md_12">
          <button type="submit" class="btn btn-success" id="enviar" name="enviar">Actualizar</button>
          <a class="btn btn-danger pull-right" href="./proyectos.php">Salir</a>
        </div>
        <hr>

  </form>
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
            url    :"actualizaProyecto.php",
            data   :datos,
            success:function(r){
              if (r=1){
                alert("El proyecto fue modificado de manera exitosa !!!");
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
