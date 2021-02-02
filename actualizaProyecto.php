<?php
	require("conectDB.php");
	session_start();

	if(isset($_POST["enviar"])){
			$id       = $_POST['id'];
			$proyecto = strtoupper(htmlspecialchars($_POST['proyecto']));
			$colabora = strtoupper(htmlspecialchars($_POST['colabora']));
			$solicito = strtoupper(htmlspecialchars($_POST['solicito']));
			$finicio  = $_POST["finicio"];
			$ffinal   = $_POST["ffinal"];
			$estatus  = $_POST["estatus"];
			$quienes  = $_SESSION["USUARIO"];
			$correo   = $_SESSION["CORREO"];
			$notas    = strtoupper(htmlspecialchars($_POST['notas']));

			$sql = "UPDATE proyectos SET pr_nombre= ?, pr_colaboradores= ?, pr_solicito= ?, pr_inicio = ?, pr_fin = ?, pr_status = ?, log_usuario = ?, pr_notas = ? WHERE id_proyecto = ?";
			$stmt = $conn->prepare($sql);

	  	try {
	  			$stmt->execute(array($proyecto, $colabora, $solicito, $finicio, $ffinal, $estatus, $quienes, $notas, $id));

					// preparamos el $mensaje
					$asunto  = "Actualización de Datos en Proyecto | CODES";
					$mensaje =  "De: Ing. Luis Armando García Eliseo | lagesoft@gmail.com \n";
					$mensaje .= "Para: $correo \n\n";
					$mensaje .= "Estimado $quienes, por este medio confirmamos la actualización de datos en el proyecto $proyecto.";
					//enviar correo electrónico
					//mail($correo, $asunto, $mensaje);

	    		echo "<script>
	            			alert('El proyecto $id etiquetado como $proyecto con los colaboradores $colabora a sido actualizado de manera adecuada !!');
	            			location.href='./proyectos.php';
	          		</script>";
	  		} catch (\Exception $e) {
	    echo $sql . "<br>" . $e->getMessage();
	  	}
  $conn = null;
}
?>
