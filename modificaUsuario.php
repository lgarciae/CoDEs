<?php
    require("cabecera.php");
    require("conectDB.php");
    $post = get_UsuarioByID($_GET['id']);
    session_start();
?>
<body>
<br><br>
<div class="container" style="margin: auto; width:650px; background-color:#fff; padding:auto;">
  <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
	<div class="encabezado">
    <h3>Modificar Usuario</h3>
    <hr>
  </div>

	<form method="post" action="./actualizaUsuario.php">
				<input type="hidden" name="id" value="<?php echo $post['id_usuario']; ?>">

        <div class="form-group">
          <label for="nombre">Nombre Completo.:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $post['us_username'];?>" placeholder="Nombre" required autofocus>
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico.:</label>
          <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $post['us_correo'];?>" placeholder="Correo Electrónico" required>
        </div>

        <div class="form-group">
          <label for="contrasena">Password.:</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $post['us_password'];?>" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label for="role">Rol</label>
            <select id="role" name="role" class="form-control">
              <option value="1" selected>ADMINISTRADOR</option>
              <option value="2" >USUARIO FINAL</option>
            </select>
        </div>

		    <button type="submit" class="btn btn-success" name="enviar">Actualizar</button>
          <p class="text text-right"><a class="btn btn-danger" href="./usuarios.php">Salir</a></p>

  </form>

</div>
</body>
