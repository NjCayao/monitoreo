<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-truck"></i> Directorio de Proveedores</h2>
			<a href='#provider_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-truck'></i> Nuevo Proveedor</a>
			<br><br>
			<?php $users = PersonData::getProviders();
			if(count($users)>0){ // si hay usuarios ?>
			<div class="box box-primary">
				<div class="box-body no-padding">
			  		<div class="box-body">
			  			<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center;">RUC/DNI</th>
									<th style="text-align: center;">Nombre&nbsp;Completo</th>
									<th style="text-align: center;">Direccion</th>
									<th style="text-align: center;">Email</th>
									<th style="text-align: center;">Telefono</th>
									<th style="text-align: center; width:150px;">Acción</th>
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($users as $user){ ?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td style="text-align: right;"><?php echo $user->dni; ?></td>
									<td><?php echo $user->name." ".$user->lastname; ?></td>
									<td><?php echo $user->address; ?></td>
									<td><?php echo $user->email; ?></td>
									<td style="text-align: right;"><?php echo $user->phone; ?></td>
									<td style="text-align: center;">
										<a href="index.php?view=provider_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
										<a href="index.php?action=provider_del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php }else{
			echo "<p class='alert alert-danger'>No hay proveedores</p>";
			} ?>
		</div>
	</div>
</section>

<div class="modal fade" id="provider_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Nuevo Proveedor</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=provider_add" role="form">
            	<div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
		          <div class="col-md-9">
		            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
		          <div class="col-md-9">
		            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">RUC/DNI*</label>
		          <div class="col-md-9">
		            <input type="text" name="dni" class="form-control" id="dni" placeholder="RUC/DNI">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
		          <div class="col-md-9">
		            <input type="text" name="address" class="form-control" required id="address" placeholder="Direccion">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
		          <div class="col-md-9">
		            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
		          <div class="col-md-9">
		            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
		          </div>
		        </div>
		        <p class="alert alert-info">* Campos obligatorios</p>
		        <div class="form-group">
		          <div class="col-lg-offset-2 col-lg-10">
		            <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
		          </div>
		        </div>
		    </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->