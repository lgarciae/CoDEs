<?php
  require("cabecera.php");
  require("conectDB.php");
  session_start();
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<h1><i class="fa fa-fw fa-book"></i> Proyectos</h1>
    			<hr>
          <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAgregarProyecto"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo Proyecto</button>-->
    			<a href="./capProyecto.php" class="btn btn-primary" data-toggle="tooltip" title="Dar de alta un nuevo proyecto"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo Proyecto</a>
          <a href="./menuAdmin.php"   class="btn btn-danger"  data-toggle="tooltip" title="Abandonar pantalla"> Salir</a>
          <a href="./export_excel.php?tabla=proyectos&archivo=tProyectos" class="btn btn-success pull-right" data-toggle="tooltip" title="Descargar en un archivo Excel" name="exportar" role="button">Descargar a Excel</a>

              <?php
                $stmt = $conn->prepare("SELECT * FROM proyectos WHERE pr_baja <> 1");
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
              ?>

    					<br><br>
        			<?php if(count($datos)>0):?>
        				<table id="proyectos" class="table table-hover table-bordered">
        					<thead>
        						<th>Id</th>
                    <th style="width:200px;" class="text-center">Nombre</th>
                    <th style="width:200px;" class="text-center">Solicitó</th>
                    <th style="width:200px;" class="text-center">Colaborador(es)</th>
                    <th style="width:150px;" class="text-center">Inicio</th>
                    <th style="width:150px;" class="text-center">Final</th>
                    <th style="width:75px;"  class="text-center">Días Invertidos</th>
                    <th style="width:75px;"  class="text-center">¿Es acuerdo?</th>
                    <th style="width:150px;" class="text-center">Fase</th>
                    <th style="width:180px;" class="text-center">Comentarios</th>
        						<th>Transacción</th>
        					</thead>
                  <tbody>
                    <?php foreach($datos as $d):?>
                   <tr>
                     <td><?php echo $d['id_proyecto'];?></td>
                     <td><?php echo $d['pr_nombre'];?></td>
                     <td><?php echo $d['pr_solicito'];?></td>
                     <td><?php echo $d['pr_colaboradores'];?></td>
                     <td><?php echo $d['pr_inicio'];?></td>
                     <td><?php echo $d['pr_fin'];?></td>
                     <?php
                      $datetime1 = date_create($d['pr_inicio']);
                      $datetime2 = date_create($d['pr_fin']);
                      $interval  = date_diff($datetime1, $datetime2);
                     ?>
                     <td><?php echo $interval->format('%R%a');?></td>
                     <td class="text-center"><?php echo "<span style='color:white;' class='badge'>"; echo ($d['pr_acuerdo']==1)?'SI':'NO'; echo "</span";?></td>
                     <td><?php echo $d['pr_status'];?></td>
                     <td><?php echo $d['pr_notas'];?></td>
                     <td class="text-center">
                       <a href="./modificaProyecto.php?id=<?php echo $d['id_proyecto']?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil fa-fw"></i></a>
                     </td>
                   </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th style="width:200px;" class="text-center">Nombre</th>
                      <th style="width:200px;" class="text-center">Solicitó</th>
                      <th style="width:200px;" class="text-center">Colaborador(es)</th>
                      <th style="width:150px;" class="text-center">Inicio</th>
                      <th style="width:150px;" class="text-center">Final</th>
                      <th style="width:75px;"  class="text-center">Días Invertidos</th>
                      <th style="width:75px;"  class="text-center">¿Es acuerdo?</th>
                      <th style="width:150px;" class="text-center">Fase</th>
                      <th style="width:180px;" class="text-center">Comentarios</th>
                      <th>Transacción</th>
                    </tr>
                  </tfoot>

    				</table>
    			<?php else:?>
    				<p class="alert alert-warning">Tabla Vacía !!!</p>
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
