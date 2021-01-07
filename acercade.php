<?php
  require("cabecera.php");
  require("conectDB.php");
 ?>

<!doctype html>
<html lang="es">
	<head>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	  <script>
	  $( function() {
	    $( "#accordion" ).accordion();
	  } );
	  </script>

	</head>
	<body>
		<div class="container-fluid">
      <br>
			<a href="./menuAdmin.php" class="btn btn-danger pull-right">Salir</a>
      <h1><i class="fa fa-fw fa-drivers-license-o"></i> Acerca de </h1>
      <br>
			<div id="accordion">
				  <h3>Historia</h3>
				  <div>
				    <p>
							Arteli es una empresa 100% mexicana dedicada a servir a miles de familias como la tuya, brindándoles artículos de máxima calidad y al mejor precio. Esto es posible gracias al esfuerzo combinado de todos sus colaboradores.<br>
							<br>
							Es en la ciudad y puerto de Tampico, donde Arteli abrió sus puertas, el 15 de Noviembre de 1978, con la inauguración de su primera tienda, Sucursal Hidalgo.
							<br>
							El crecimiento de Arteli se hizo notar en la década de los 80's, gracias al empuje y entusiasmo de su gente, estableciéndose nuevas sucursales en puntos estratégicos de las ciudades de Tampico, Madero, Altamira, Valles, Alamo, Ébano.<br>
							<br>
							A partir de los 90's, Arteli reafirma su liderazgo, con la apertura de más sucursales y con diferentes formatos de tienda que se han establecido para satisfacer las diversas necesidades de la población.<br>
							<br>
							Hoy, Arteli es una empresa sólida que, con el esfuerzo de su gente, apoyado en un Proceso de Mejora Continua centrado en valores, seguirá creciendo año tras año, como lo ha hecho a lo largo de su historia.<br>
				    </p>
				  </div>
				  <h3>Formatos de Tiendas</h3>
				  <div>
				    <p>
							La empresa busca satisfacer las necesidades de los clientes, ubicando sus tiendas en distintos puntos de la región, a través de distintos formatos de tienda, que nos permiten satisfacer las diferentes necesidades de nuestros clientes.<br>
	 					<br>
						Hoy en día, contamos con 13 tiendas Arteli, 2 Arteli Más, 7 Arteli Express y 13 Aká para atender a todos los mercados de una manera excelente.
				    </p>
				  </div>
				  <h3>¿Quiénes somos?</h3>
				  <div>
				    <p>
							Arteli es una cadena tiendas de autoservicio, con 36 sucursales, en sus diferentes formatos, ampliamente reconocida en la región por su ubicación, calidad y variedad de productos, así como el trato amable del personal, logrando que nuestros clientes, tengan una experiencia de compra agradable.<br>
	 	 				<br>Actualmente, Arteli forma parte de la ANTAD (Asociación Nacional de Tiendas de Autoservicio y Departamentales A.C.) y Grupo IDEA (Integradora de Autoservicios) en el cual realizamos alianzas con varias cadenas regionales, lo que nos permite traer productos de otras zonas del país y del extranjero a un mejor precio, para satisfacer las necesidades de los consumidores.
				    </p>
				  </div>
				  <h3>Visión</h3>
				  <div>
				    <p>
				    Una empresa institucional, altamente productiva, profundamente humana, con una marcada vocación de servicio y un permanente enfoque al cliente.
				    </p>
				  </div>

				</div>
		</div>

		</body>
</html>
