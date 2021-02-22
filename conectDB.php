<?php
    $servername = "localhost";
    $dbname     = "BDCDES";
    $username   = "root";
    $password   = "";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Error de conexión con la BD: " . $e->getMessage();
    }


    function connectPDO()
    {
    	$usuario    = "root";
    	$contrasena = "";
    	return new PDO('mysql:host=localhost;dbname=BDCDES', $usuario, $contrasena);
    }


    function get_ProyectoById($id)
    {
      $conn	 = connectPDO();
    	$sql   = "SELECT *  FROM proyectos WHERE id_proyecto = ?";
    	$stmt  = $conn->prepare($sql);
    	$stmt -> execute(array($id));
    	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($resultado){
    		$dato= $resultado;
    	}
    	return $dato;
    }

    function getStatus($id){
      $conn	 = connectPDO();
      $sql   = "SELECT descripcion FROM estatus WHERE idstatus = ?";
    	$stmt  = $conn->prepare($sql);
    	$stmt -> execute(array($id));
    	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($resultado){
    		$dato= $resultado["descripcion"];
    	}
    	return $dato;
    }

    function get_UsuarioByID($id)
    {
      $conn	 = connectPDO();
    	$sql   = "SELECT *  FROM usuarios WHERE id_usuario = ?";
    	$stmt  = $conn->prepare($sql);
    	$stmt -> execute(array($id));
    	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($resultado){
    		$dato= $resultado;
    	}
    	return $dato;
    }

    function getRol($id){
      $conn	 = connectPDO();
      $sql   = "SELECT descripcion FROM roles WHERE idrol = ?";
    	$stmt  = $conn->prepare($sql);
    	$stmt -> execute(array($id));
    	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($resultado){
    		$dato= $resultado["descripcion"];
    	}
    	return $dato;
    }

    function get_ProveedorByID($id)
    {
      $conn	 = connectPDO();
      $sql   = "SELECT *  FROM proveedores WHERE id_proveedor = ?";
      $stmt  = $conn->prepare($sql);
      $stmt -> execute(array($id));
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($resultado){
        $dato= $resultado;
      }
      return $dato;
    }

    function get_Proyectos()
    {
      $conn	 = connectPDO();
      $sql   = "SELECT count(id_proyecto) FROM proyectos";
      $stmt  = $conn->prepare($sql);
      $stmt -> execute(array($id));
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($resultado){
        $dato= $resultado;
      }
      return $dato;
    }

  ?>
