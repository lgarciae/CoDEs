<?php
    require("cabecera.php");
    require("conectDB.php");
    $post = get_ProyectoByID($_GET['id']);
    session_start();
?>
<body>
<br><br>
<div class="container" style="margin: auto; background-color:#fff; padding:auto;">
  <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
	<div class="encabezado">
    <h3>Modificar Proyecto</h3>
    <hr>
  </div>

	<form method="post" action="./actualizaProyecto.php">
				<input type="hidden" name="id" value="<?php echo $post['id_proyecto']; ?>">

        <div class="form-group">
          <label for="proyecto">Nombre Proyecto.:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" value="<?php echo $post['pr_nombre'];?>" placeholder="Nombre proyecto" required autofocus>
        </div>

        <div class="form-group">
          <label for="colabora">Colaborador(es).:</label>
          <input type="text" class="form-control" id="colabora" name="colabora" value="<?php echo $post['pr_colaboradores'];?>" placeholder="Colaborador/(es)" required>
        </div>

        <div class="form-group">
          <label for="solicito">Solicitó.:</label>
          <input type="text" class="form-control" id="solicito" name="solicito" value="<?php echo $post['pr_solicito'];?>" placeholder="Solicitó" required>
        </div>

        <div class="form-group">
          <label for="inicio">Fecha Inicial.:</label>
          <input type="date" class="form-control" id="finicio" name="finicio" value="<?php echo $post['pr_inicio'];?>" placeholder="Fecha Inicio" required>
        </div>

        <div class="form-group">
          <label for="final">Fecha Final.:</label>
          <input type="date" class="form-control" id="ffinal" name="ffinal" value="<?php echo $post['pr_fin'];?>" placeholder="Fecha Final" required>
        </div>

        <div class="form-group">
          <label for="estatus">Status.:</label>
          <input type="text" class="form-control" id="eststus" name="estatus" value="<?php echo $post['pr_status'];?>" placeholder="Estatus" required>
        </div>

        <div class="form-group">
          <label for="notas">Comentarios.:</label><br>
          <textarea name="notas" rows="3" cols="160"><?php echo $post['pr_notas'];?></textarea>
          <!--<input type="text" class="form-control" id="notas" name="notas" value="<?php echo $post['pr_notas'];?>">-->
        </div>

		    <button type="submit" class="btn btn-success" name="enviar">Actualizar</button>
        <a class="btn btn-danger pull-right" href="./proyectos.php">Salir</a>

  </form>

</div>
</body>
