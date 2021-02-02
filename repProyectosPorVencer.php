<?php
  require("cabecera.php");
  require("conectDB.php");
  session_start();
  $colabora="";
  $datos = null;
  if(!is_countable($datos))$datos = Array();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
          <br>
          <a href="./menuAdmin.php"   class="btn btn-danger pull-right"> Salir</a>
    			<h1><i class="fa fa-fw fa-book"></i> Proyectos por Vencer </h1>
    			<hr>

          <form method="post">
              <label for="fecha">Fecha de Entrega ..:</label>
              <input type="date" id="fecha" name="fecha" required>
              <button type="submit" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
          </form>
          <hr>
           <?php
              if (isset($_POST["enviar"])){

                $fecha = $_POST["fecha"];     //Recibe un string en formato dd-mm-yyyy
                $dato = strtotime($fecha);    // Convierte el string en formato de fecha en php
                $dato = date('Y-m-d',$dato);  // lo covnierte a formao de fecha en MySQL

                $stmt  = $conn->prepare("SELECT * FROM proyectos WHERE pr_fin <='$dato' AND pr_status <> 'PRODUCCION' GROUP BY pr_fin");
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
              }
          ?>

      			<?php if(count($datos)>0):?>
      				<table id="proyectos" class="table table-striped table-bordered">
      					<thead>
      						<th>Id</th>
      						<th>Nombre</th>
                  <th>Solicitó</th>
                  <th>Colaborador(es)</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha de Entrega</th>
                  <th>Días Invertidos</th>
                  <th>Estatus</th>
                  <th >Observaciones</th>
      						<th>Transacción</th>
      					</thead>
                <tbody>
                  <?php foreach($datos as $d):?>
                 <tr>
                   <td><?php echo $d['id_proyecto'];?></td>
                   <td><?php echo $d['pr_nombre'];?></td>
                   <td><?php echo $d['pr_solicito'];?></td>
                   <td><?php echo $d['pr_colaboradores'];?></td>
                   <td><?php echo date("d/m/Y",strtotime($d['pr_inicio']));?></td>
                   <td><?php echo date("d/m/Y",strtotime($d['pr_fin']));?></td>
                   <?php
                    $datetime1 = date_create($d['pr_inicio']);
                    $datetime2 = date_create($d['pr_fin']);
                    $interval  = date_diff($datetime1, $datetime2);
                   ?>
                   <td><?php echo $interval->format('%R%a días');?></td>
                   <td><?php echo $d['pr_status'];?></td>
                   <td><?php echo $d['pr_notas'];?></td>
                   <td class="text-center">
                     <a href="./modificaProyecto.php?id=<?php echo $d['id_proyecto']?>" class="btn btn-default btn-xs"><i class="fa fa-pencil fa-fw"></i></a>
                   </td>
                 </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
        						<th>Nombre</th>
                    <th>Solicitó</th>
                    <th>Colaborador(es)</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Fase</th>
                    <th >Observaciones</th>
        						<th>Transacción</th>
                  </tr>
                </tfoot>

  				</table>
  			<?php else:?>
          <div class="alert alert-warning">
            <strong>Informativo !!</strong> No hay datos que desplegar.
          </div>
  			<?php endif; ?>
    		</div>
    	</div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#proyectos').DataTable()
            } );
    </script>

    <footer style="text-align:center;">© Tienda de Descuento Arteli - <?php echo date("Y");?></footer>
</body>
</html>
