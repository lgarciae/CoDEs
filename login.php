<?php
  require('cabecera.php');
?>

<body>
		<div class="container" style="margin: auto; width:350px; background-color:#fff; padding:auto;">
        <div class="" align="center">
            <img src="./img/imagen.png" align="middle" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
        </div>

		    <form action="./authenticate.php" method="post">
          <div class="encabezado">
		        <h3>Iniciar sesión</h3>
            <hr>
          </div>

		        <div class="form-group">
                <label for="correo">Dirección de email</label>
		            <input type="email" name="correo" class="form-control" required="required" autofocus>
		        </div>
		        <div class="form-group">
                <label for="password">Contraseña</label>
		            <input type="password" name="password" class="form-control" required="required">
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-warning btn-block" name="enviar">Iniciar sesión</button>
		        </div>
		        <div class="clearfix">
		            <label class="pull-left checkbox-inline"><input type="checkbox"> Recuérdame</label>
		            <a href="#" class="pull-right">Olvidaste tu contraseña?</a>
		        </div>
            <p class="text-right"><a href="./capUsuario.php">Crear una cuenta</a></p>
            <p class="text text-right"><a class="btn btn-danger" href="./index.php">Salir</a></p>
            <hr>


		    </form>
		</div>
    <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
</body>
</html>
