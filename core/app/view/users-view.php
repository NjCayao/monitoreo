<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-users"></i> Lista de Usuarios</h2>
			<a href='#' data-id="2" data-toggle='modal' data-target="#detail_product" class="btn btn-primary"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
			<br><br>
			<?php $users = UserData::getAll();
			if(count($users)>0){ ?>
				<div class="box box-primary">
					<div class="box-body no-padding">
						<div class="box-body">
							<div class="box-body table-responsive">
								<table class="table table-bordered datatable table-hover">
									<thead>
										<th style="text-align: center; width: 30px;">N°</th>
										<th style="text-align: center; width: 30px;">Foto</th>
										<th style="text-align: center;">Nombre&nbsp;Completo</th>
										<th style="text-align: center;">Fecha de ingreso</th>
										<th style="text-align: center;">DNI</th>
										<th style="text-align: center;">Equipo</th>
										<th style="text-align: center;">Cdg. Equipo</th>
										<th style="text-align: center;">Frente de trabajo</th>
										<th style="text-align: center;">Celular</th>
										<th style="text-align: center;">Activo</th>
										<th style="text-align: center;">Tipo</th>
										<th style="text-align: center; width:150px;">Acción</th>
									</thead>
									<?php for ($number=0; $number<1; $number++);
									foreach($users as $user){ ?> 
										<tr>
											<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
											<td style='text-align: center;'>
												<?php
												if($user->image!=""){
													$url = "storage/profiles/".$user->image;
													if(file_exists($url)){
														echo "<img src='$url' style='width:24px; height:24px;'>";
													}
												} ?></td>
												<td><?php echo $user->lastname." ".$user->name; ?></td>
												<td><?php echo $user->created_at; ?></td>
												<td><?php echo $user->dni; ?></td>
												<td><?php echo $user->equipo; ?></td>
												<td><?php echo $user->cdgequipo; ?></td>										
												<td><?php switch ($user->frente_trabajo) {
													case '1': echo "Capataz: Santos"; break;
													case '2': echo "Capataz: Bocanegra"; break;
													case '3': echo "Oficina"; break;													
													default:
											# code...
													break;
												} ?></td>
												<td><?php echo $user->celular; ?></td>
												<td style="text-align: center;">
    												<?php if ($user->status == 1): ?>
    												    <button class="boton-activo">Activo</button>
    												<?php else: ?>
    												    <button class="boton-desactivo">Inactivo</button>
    												<?php endif; ?>
												</td>
												<td><?php switch ($user->kind) {
													case '1': echo "Administrador"; break;
													case '2': echo "Asistente"; break;
													case '3': echo "Operador"; break;
													default:
											# code...
													break;
												} ?></td>
												<td style="text-align: center;"><a href="index.php?view=user_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
													<a href="index.php?action=user_del&id=<?php echo $user->id;?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i> Eliminar</a></td>
												</tr>
											<?php }	 echo "</table></div>";
										}else{ } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="modal fade" id="detail_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!--Inicio de ventana modal 2-->
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" style="text-align: center;">Nuevo Usuario</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" enctype="multipart/form-data"  method="post" id="user_add" action="index.php?action=user_add" role="form">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Foto&nbsp;JPG (400x400px)</label>
										<div class="col-md-9">
											<input type="file" name="image" id="image" placeholder="">
										</div>
									</div>
									<!-- aca hacemos busqueda de reniec -->
									<div class="form-group">
    									<label for="inputEmail1" class="col-lg-2 control-label">DNI*</label>
    									<div class="col-md-9">
    									    <div class="input-group">
    									        <input type="number" name="dni" class="form-control" id="dni" placeholder="Numero de DNI" maxlength="8" pattern="[0-9]{1,9}" required>
    									        <div class="input-group-append">
    									            <button type="button" class="boton-reniec" id="buscar_dni">
    									                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    									                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    									                </svg>
    									                RENIEC
    									            </button>
    									        </div>
    									    </div>
    									</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Nombres*</label> 
										<div class="col-md-9">
											<input type="text" name="name" class="form-control" id="name" placeholder="nombres" required readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
										<div class="col-md-9">
											<input type="text" name="lastname" class="form-control" id="lastname" placeholder="apellidos"  required readonly>
										</div>
									</div>									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Celular*</label>
										<div class="col-md-9">
											<input type="number" name="celular" class="form-control" id="celular" placeholder="Número de celular">
										</div>
									</div>
									<div class="form-group">
    									<label for="inputEmail1" class="col-lg-2 control-label">Equipo*</label>
    									<div class="col-md-9">
    									    <input type="text" name="equipo" class="form-control" id="equipo" placeholder="Nombre del Equipo">
    									</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Codigo Equipo*</label>
										<div class="col-md-9">
											<input type="text" name="cdgequipo" class="form-control" id="cdgequipo" placeholder="Codigo de Equipo asignado">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">frente de Trabajo*</label>
										<div class="col-md-9">
											<select name="frente_trabajo" class="form-control" required>
												<option value="">-- SELECCIONAR --</option>
												<option value="1">Capataz: Santos</option>
												<option value="2">Capataz: Bocanegra</option>
												<option value="3">Oficina</option>												
											</select> 
										</div>
									</div>									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a*</label>
										<div class="col-md-9">
											<input type="text" name="password" class="form-control" id="password" required placeholder="Contraseña"  required>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Correo Electrónico*</label>
										<div class="col-md-9">
											<input type="email" name="email" class="form-control" id="email" placeholder="Correo Electrónico">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
										<div class="col-md-9">
											<select name="kind" class="form-control" required>
												<option value="">-- SELECCIONAR --</option>
												<option value="3">Operador</option>
												<option value="2">Asistente</option>
												<option value="1">Administrador</option>
											</select> 
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-9">
											<p class="alert alert-info">* Campos obligatorios</p>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-primary">Agregar Usuario</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#equipo, #cdgequipo').on('input', function() {
        // Filtrar caracteres especiales y convertir a mayúsculas
        var inputValue = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase();
        $(this).val(inputValue);
    });
});




$(document).ready(function() {
    $('#email').on('input', function() {
        $(this).val($(this).val().toUpperCase());
    });
});


</script>


<style>
	
/* Estilo para el botón */
.boton-reniec {
    border-top-left-radius: 0;
    border-bottom-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
	width: auto;
    height: 100%;

}

/* Estilo para el texto "Reniec" en el botón */
#buscar_dni {
    position: absolute;
    padding-right: 40px; /* Espacio para el texto */
	font-size: 16px;
    font-weight: bold;
	color: #0a0a0a;
    background-color: #93afeb;
	
}

#buscar_dni svg {
    position: absolute;
    right: 10px; /* Ajusta el valor según tu preferencia */
    top: 50%;
    transform: translateY(-50%);
}

</style>