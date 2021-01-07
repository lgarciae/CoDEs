<?php
	require ("conectDB.php");

	if(isset($_GET["id"])){

			$id       = $_GET['id'];

			$sql = "DELETE FROM proyectos WHERE id_proyecto = ?";
			$stmt = $conn->prepare($sql);

	  	try {
	  			$stmt->execute(array($id));
	    		echo "<script>
	            			alert('El proyecto $id a sido eliminado !!');
	            			location.href='./proyectos.php';
	          		</script>";
	  		} catch (\Exception $e) {
	    echo $sql . "<br>" . $e->getMessage();
	  	}
  $conn = null;
}
?>
