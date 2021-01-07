<?php
	require("conectDB.php");
	session_start();

	if(isset($_POST["enviar"])){
			$id         = $_POST['id'];
			$nombre     = strtoupper(htmlspecialchars($_POST['nombre']));
			$correo     = htmlspecialchars($_POST['correo']);
			$contrasena = password_hash($_POST['contrasena'],PASSWORD_DEFAULT);
      $role       = $_POST['role'];

			$sql = "UPDATE usuarios SET us_username= ?, us_correo= ?, us_password = ?, us_rol = ? WHERE id_usuario = ?";
			$stmt = $conn->prepare($sql);

	  	try {
	  			$stmt->execute(array($nombre, $correo, $contrasena, $role, $id));
	    		echo "<script>
	            			alert('El usuario $id etiquetado como $nombre a sido actualizado de manera adecuada !!');
	            			location.href='./usuarios.php';
	          		</script>";
	  		} catch (\Exception $e) {
	    echo $sql . "<br>" . $e->getMessage();
	  	}
  $conn = null;
}
?>
