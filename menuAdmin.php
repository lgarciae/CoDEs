<?php
    require("cabecera.php");
    session_start();
 ?>

<style>
    body {
      background-image: url('./img/imgFondo.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
</style>

<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">  <!--Barra de Navegación Colapsable-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="#">CoDES</a>
     </div>
     <ul class="nav navbar-nav"> <!-- Elementos del Menu cargados a la izquierda-->
       <li class="active"><a href="#"><i class="fa fa-fw fa-home"></i> Inicio</a></li>

       <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguimiento
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="./proyectos.php"><i class="fa fa-fw fa-book"></i> Proyectos</a></li>
           <li><a href="./reporteProyectos.php"><i class="fa fa-fw fa-search"></i> Reporte Proyecto por Colaborador</a></li>
           <li><a href="./repProyectosPorVencer.php"><i class="fa fa-fw fa-search"></i> Reporte Proyecto por Vencer</a></li>
         </ul>
       </li>

       <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Configuración
         <span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="#"><i class="fa fa-fw fa-search"></i> Inventarios</a></li>
           <li><a href="#"><i class="fa fa-fw fa-cart-plus"></i> Producto</a></li>
           <li><a href="#"><i class="fa fa-fw fa-industry"></i> Proveedores</a></li>
           <li><a href="#"><i class="fa fa-fw fa-user"></i> Usuarios</a></li>
         </ul>
        </li>

        <li class="active"><a href="./acercade.php"><i class="fa fa-fw fa-drivers-license-o"></i> Acerca de</a></li>

     </ul>
     <ul class="nav navbar-nav navbar-right">  <!-- Elementos el menu cargados a la derecha -->
       <li><a href="./salir.php"><span class="glyphicon glyphicon-log-out"></span><?php echo " " . $_SESSION["USUARIO"] . ""; ?></a></li>
     </ul>
   </div>
 </nav>

<body>
  <!-- Page content -->
  <div class="main">
  </div>
</body>
