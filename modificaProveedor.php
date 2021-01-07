<?php
    require("cabecera.php");
    require("conectDB.php");
    $post = get_ProveedorByID($_GET['id']);
    session_start();
?>
<body>
<br><br>
<div class="container" style="margin: auto; width:650px; background-color:#fff; padding:auto;">
  <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
	<div class="encabezado">
    <h3>Modificar Proveedor</h3>
    <hr>
  </div>

	<form method="post" action="./actualizaProveedor.php">
				<input type="hidden" name="id" value="<?php echo $post['id_proveedor']; ?>">

        <div class="form-group">
          <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $post['pr_nombre'];?>" placeholder="Razón Social" required autofocus>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="direc1" name="direc1" value="<?php echo $post['pr_direccion1'];?>" placeholder="Domicilio Fiscal" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="direc2" name="direc2" value="<?php echo $post['pr_direccion2'];?>" placeholder="Domicilio atención" required >
        </div>

        <div class="form-group">
          <input type="url" class="form-control" id="url" name="url" value="<?php echo $post['pr_website'];?>"  placeholder="HomePage" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $post['pr_pais'];?>" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $post['pr_estado'];?>" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="moneda" name="moneda" value="<?php echo $post['pr_moneda'];?>" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $post['pr_codigo'];?>" required >
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $post['pr_rfc'];?>" required >
        </div>

        <div class="form-group">
          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $post['pr_correo'];?>" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $post['pr_telefono'];?>" required>
        </div>


		    <button type="submit" class="btn btn-success" name="enviar">Actualizar</button>
        <p class="text text-right"><a class="btn btn-danger" href="./proveedores.php">Salir</a></p>

  </form>

</div>
</body>
