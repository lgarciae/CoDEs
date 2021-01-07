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
          <a href="./export_excel.php?tabla=proyectos&archivo=tProyectos" class="btn btn-warning pull-right" name="exportar" role="button">Descargar a Excel</a>

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
                    <th>Fase</th>
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

<!-- Modal -->
<div id="myModalAgregarProyecto" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <img src="./img/imagen.png" class="img-responsive" alt="Imagen Corporativa" width="150" height="100">
        <h3 class="modal-title">Nuevo Proyecto</h3>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="proyecto">Nombre Proyecto.:</label>
          <input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="Nombre proyecto" required autofocus>
        </div>

        <div class="form-group">
          <label for="colabora">Colaborador(es).:</label>
          <input type="text" class="form-control" id="colabora" name="colabora" placeholder="Colaborador/(es)" required>
        </div>

        <div class="form-group">
          <label for="solicito">Solicitó.:</label>
          <input type="text" class="form-control" id="solicito" name="solicito" placeholder="Solicitó" required>
        </div>

        <div class="form-group col-md-3">
          <label for="inicio">Fecha Inicial</label>
          <input type="date" class="form-control" id="finicio" name="finicio" placeholder="Fecha Inicio" required>
        </div>

        <div class="form-group col-md-3">
          <label for="final">Fecha Final</label>
          <input type="date" class="form-control" id="ffinal" name="ffinal" placeholder="Fecha Final" required>
        </div>

        <div class="form-group col-md-6">
          <label for="country">Status</label>
            <select id="estatus" name="estatus" class="form-control">
              <option value="ANALISIS DE REQUERIMIENTOS">ANALISIS DE REQUERIMIENTOS</option>
              <option value="DISEÑO">DISEÑO</option>
              <option value="DESARROLLO">DESARROLLO</option>
              <option value="PRUEBAS">PRUEBAS</option>
              <option value="PRODUCCION">PRODUCCION</option>
              <option value="GO LIVE">GO LIVE</option>
              <option value="MANTENIMIENTO">MANTENIMIENTO</option>
            </select>
        </div>

      </div>
      <br>
      <hr>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-left" name="enviar">Registrar</button>
        <button type="reset"  class="btn btn-default pull-left" name="borrar">Limpiar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

</html>
