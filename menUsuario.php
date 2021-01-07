<?php
    require("cabecera.php");
    session_start();
 ?>

 <style>
    body {
      background-image: url('./img/ArteliMas.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
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
       <li><a href="#"><i class="fa fa-fw fa-envelope"></i> Seguimiento</a></li>
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
