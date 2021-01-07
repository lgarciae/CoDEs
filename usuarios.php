<?php
  require("cabecera.php");
  require("conectDB.php");
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1><i class="fa fa-fw fa-user"></i> Usuarios</h1>
			<hr>
			<a href="./capUsuario.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
      <a href="./menuAdmin.php" class="btn btn-danger">Salir</a>

					<?php
            $stmt = $conn->prepare("SELECT * FROM usuarios");
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
          ?>

					<br><br>
    			<?php if(count($datos)>0):?>
    				<table class="table table-hover table-bordered">
    					<thead>
    						<th>Id</th>
    						<th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th>Fecha Alta</th>
    						<th>Transacción</th>
    					</thead>
					<?php foreach($datos as $d):?>
					<tr>
						<td><?php echo $d['id_usuario'];?></td>
						<td><?php echo $d['us_username'];?></td>
            <td><?php echo $d['us_correo'];?></td>
            <td><?php echo getRol($d['us_rol']);?></td>
            <td><?php echo date("d/m/Y",strtotime($d['us_log']));?></td>
						<td class="text-center">
							<a href="./modificaUsuario.php?id=<?php echo $d['id_usuario']?>" class="btn btn-default btn-xs"><i class="fa fa-pencil fa-fw"></i></a>
							<a href="#" class='btn btn-danger btn-xs' onclick="myFunction()"><i class="fa fa-trash-o fa-lg"></i></a>
              <!--<a href="./eliminaUsuario.php?id=<?php echo $d['id_usuasrio']?>" class='btn btn-default btn-xs' onclick="myFunction()">Eliminar</a>-->
						</td>

					</tr>
					<?php endforeach; ?>
				</table>
			<?php else:?>
				<p class="alert alert-warning">Tabla Vacía !!!</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
function myFunction(){
  var txt;
  var r = confirm("Procede la eliminación de este elemento ?");
    if (r == true){
          txt = "Procede la eliminación !!!!";
        } else {
          txt = "No Procede la eliminación";
        }
  }
</script>

<script type="text/javascript">
		$(document).ready(function(){
				$(".table").dataTable({
				"language": {
				"lengthMenu": "Mostrando _MENU_ registros por pagina",
				"zeroRecords": "Sin registros",
				"info": "Mostrando pagina _PAGE_ de _PAGES_",
				"infoEmpty": "Sin registros",
				"sSearch": "Buscar",
				"infoFiltered": "(filtrando de _MAX_ registros)"
      },"iDisplayLength": 10
			 });
		 });
</script>

</body>
    <script src="assets/js/datatable.js"></script>
</html>
