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

    			<h1><i class="fa fa-fw fa-book"></i> Colaborador por Proyecto </h1>
    			<hr>

          <form method="post">
              <label for="colaborador">Colaborador ..:</label>
              <select name="colaborador" required>
                 <option value=""> - Seleccione - </option>
                 <?php
                      $mysqli = new mysqli('localhost','root','','bdcdes');
                      $query  = $mysqli -> query("SELECT distinct nombre_corto, nombre_completo FROM colaborador order by nombre_corto");
                      while ($valores = mysqli_fetch_array($query)) {
                       echo '<option value="'.$valores[nombre_corto].'">'.  substr(utf8_encode($valores[nombre_corto]),0).'</option>';
                     }
                 ?>
               </select>
              <button type="submit" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
              <a href="./menuAdmin.php" class="btn btn-danger"> Salir</a>
          </form>
          <hr>
           <?php
              if (isset($_POST["enviar"])){
                $colabora= $_POST["colaborador"];
                $stmt    = $conn->prepare("SELECT * FROM proyectos WHERE pr_colaboradores like '%$colabora%' and pr_baja <> 1");
                $stmt->execute();
                $datos   = $stmt->fetchAll(PDO::FETCH_ASSOC);
              }
            ?>
            <h3><?php echo $colabora; ?></h3>
            <hr>

      			<?php if(count($datos)>0):?>
      				<table id="proyectos" style="width:100%" class="table table-striped table-bordered">
      					<thead>
      						<th>Id</th>
      						<th>Nombre</th>
                  <th>Solicitó</th>
                  <th>Colaborador(es)</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Final</th>
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
