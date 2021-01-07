<?php
	require("conectDB.php");
	session_start();

	if(isset($_POST["enviar"])){
		$nombre   = strtoupper(htmlspecialchars($_POST["nombre"]));
		$direc1   = strtoupper(htmlspecialchars($_POST["direc1"]));
		$direc2   = strtoupper(htmlspecialchars($_POST["direc2"]));
		$url      = htmlspecialchars($_POST["url"]);
		$pais     = strtoupper(htmlspecialchars($_POST["pais"]));
		$estado   = strtoupper(htmlspecialchars($_POST["estado"]));
		$moneda   = strtoupper(htmlspecialchars($_POST["moneda"]));
		$cp       = htmlspecialchars($_POST["cp"]);
		$rfc      = strtoupper(htmlspecialchars($_POST["rfc"]));
		$correo   = htmlspecialchars($_POST["correo"]);
		$tele     = htmlspecialchars($_POST["telefono"]);


			$sql = "UPDATE proveedores SET pr_nombre = ?, pr_direccion1 = ?, pr_direccion2 = ?, pr_website = ?, pr_pais = ?, pr_estado= ?, pr_moneda = ?, pr_codigo = ?, pr_rfc = ?, pr_correo = ?, pr_telefono = ?  WHERE id_proveedor = ?";
			$stmt = $conn->prepare($sql);

	  	try {
	  			$stmt->execute(array($nombre, $direc1, $direc2, $url, $pais, $estado, $moneda, $cp, $rfc, $correo, $tele, $id));
	    		echo "<script>
	            			alert('El proveedor $nombre a sido actualizado de manera adecuada !!');
	            			location.href='./proveedores.php';
	          		</script>";
	  		} catch (\Exception $e) {
	    echo $sql . "<br>" . $e->getMessage();
	  	}
  $conn = null;
}
?>
