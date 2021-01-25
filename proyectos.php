<?php
  require("cabecera.php");
  require("conectDB.php");
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
    			<a href="./capProyecto.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo Proyecto</a>
          <a href="./menuAdmin.php"   class="btn btn-danger"> Salir</a>
          <a href="./export_excel.php?tabla=proyectos&archivo=tProyectos" class="btn btn-default pull-right" name="exportar" role="button">Descargar a Excel</a>

              <?php
                $stmt = $conn->prepare("SELECT * FROM proyectos WHERE pr_baja <> 1");
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
              ?>

    					<br><br>
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
                    <th>Fase</th>
                    <th >Comentarios</th>
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
                       <a href="./modificaProyecto.php?id=<?php echo $d['id_proyecto']?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil fa-fw"></i></a>
                       <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-togle="tooltip" title="Visualizar" data-target="#Comentarios"><i class="fa fa-search fa-fw"></i></a>
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
                      <th >Comentarios</th>
          						<th>Transacción</th>
                    </tr>
                  </tfoot>

    				</table>
    			<?php else:?>
    				<p class="alert alert-warning">Tabla Vacía !!!</p>
    			<?php endif; ?>
    		</div>

        <!-- The Modal -->
          <div class="modal fade" id="Comentarios">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><?php echo $d['pr_nombre'];?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <p><?php echo $d['pr_notas'];?></p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

              </div>
            </div>
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
