<?php
  require('cabecera.php');
?>

<body>
		<br><br>
		<div class="container" style="margin: auto; width:450px; background-color:#fff; padding:auto;">
      <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
		    <form action="./authenticate.php" method="post">
          <div class="encabezado">
		        <h3>Log In</h3>
            <hr>
          </div>

		        <div class="form-group">
		            <input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
		        </div>
		        <div class="form-group">
		            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-primary btn-block" name="enviar">Entrar</button>
		        </div>
		        <div class="clearfix">
		            <label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
		            <a href="#" class="pull-right">Olvidaste la contraseña?</a>
		        </div>
            <p class="text-right"><a href="./capUsuario.php">Crear una cuenta</a></p>
            <p class="text text-right"><a class="btn btn-danger" href="./index.php">Salir</a></p>
            <hr>


		    </form>
		</div>
    <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
</body>
</html>
