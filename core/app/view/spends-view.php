<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-coffee"></i> Lista de Gastos</h2>
			<a href='#spend_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-coffee'></i> Nuevo Gasto</a>
			<br><br>
				<?php $users = SpendData::getAllUnBoxed();
				if(count($users)>0){
					// si hay usuarios
				$total = 0; ?>
	            <div class="box box-primary">
					<div class="box-body no-padding">
				  		<div class="box-body">
				  			<div class="box-body table-responsive">
								<table class="table table-bordered datatable table-hover">
									<thead>
										<th style="text-align: center; width: 30px;">N°</th>
										<th style="text-align: center;">Concepto</th>
										<th style="text-align: center;">Costo</th>
										<th style="text-align: center;">Fecha</th>
										<th style="text-align: center; width: 130px;">Acción</th>
									</thead>
									<?php for ($number=0; $number<1; $number++);
									foreach($users as $user){ ?>
									<tr>
										<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
										<td><?php echo $user->name; ?></td>
										<td style="text-align: right;">S/ <?php echo number_format($user->price,2,".",","); ?></td>
										<td style="text-align: right;"><?php echo $user->created_at; ?></td>
										<td style="text-align: center;">
											<a href="index.php?view=spend_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
											<a href="index.php?action=spend_del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('¿Está seguro de eliminar?')"><i class="fa fa-trash"></i> Eliminar</a></td>
									</tr>
									<?php $total+=$user->price; }
								echo "</table>";
							echo "<div class='box-body'><h3>Gasto Total : S/ ".number_format($total,2,".",",")."</div></h3>";
					echo "</div></div></div></div>";
			}else{
				echo "<p class='alert alert-danger'>No hay Gastos</p>";
			} ?>
	</div>
	</div>
</section>

<div class="modal fade" id="spend_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Ingrese el Nuevo Gasto</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" id="spend_add" action="index.php?action=spend_add" role="form">
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Concepto*</label>
		          <div class="col-md-9">
		            <textarea type="text" name="name" required class="form-control" id="name" placeholder="Concepto"></textarea>
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Costo*</label>
		          <div class="col-md-9">
		            <input type="text" name="price" required class="form-control" id="name" placeholder="Costo">
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-lg-offset-2 col-lg-10">
		            <button type="submit" class="btn btn-primary">Agregar Gasto</button>
		          </div>
		        </div>
		      </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->