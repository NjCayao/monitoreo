<section class="content">
	<?php $admin = UserData::getById($_SESSION["user_id"]); ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-users"></i> Operadores en StandBy</h2>
			<a href='#' data-id="2" data-toggle='modal' data-target="#standby_new" class='btn btn-primary'><i class='fa fa-user'></i> Nuevo Reporte</a>
			<?php if($admin->kind==1 || $admin->kind==2){ ?>
			<!-- <div class="btn-group pull-right">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
					<button onclick="Export()" type="submit" class="btn btn-default">Excel (.xls)</button>
				  </ul>
				<script type="text/javascript">
					function Export(par) {
			    		window.open('report/reports-excel.php', '_blank');
					}
				</script>
			</div> -->
			<?php }else{ ?>
			<div class="btn-group pull-right">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<button onclick="Export(<?php echo $admin->id; ?>)" type="submit" class="btn btn-default">Excel (.xls)</button>
			  </ul>
				<script type="text/javascript">
					function Export(par) {
			    		window.open('report/reports-user-excel.php?par='+par, '_blank');
					}
				</script>
			</div>
			<?php } ?>
			<br><br>
			<?php if($admin->kind==1 || $admin->kind==2){
				$standbys = StandbyData::getAll();
			}else{
				$standbys = StandbyData::getAllUser($admin->id);
			}
			if(count($standbys)>0){ // si hay reportes ?>
			<div class="box box-primary">
				<div class="box-body no-padding">
			  		<div class="box-body">
			  			<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>									
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Nombre&nbsp;Completo</th>
									<th style="text-align: center;">DNI</th>	
									<th style="text-align: center;">Equipo</th>
									<th style="text-align: center;">Codg. al que se registro</th>											
                                    <th style="text-align: center;">Celular</th> 
									<th style="text-align: center;">Observación</th>                                                                     	
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($standbys as $standby){
									$user = $standby->getUser(); ?>
								<tr>									
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>									
									<td><?php echo $standby->created_at; ?></td>
									<td><?php echo $user->lastname." ".$user->name; ?></td>
									<td><?php echo $user->dni; ?></td>
									<td><?php echo $user->equipo; ?></td>
									<td><?php echo $user->cdgequipo; ?></td>	
									<td><?php echo $user->celular; ?></td>
									<td><?php echo $standby->st_observation; ?></td>													                             									
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php }else{
			echo "<p class='alert alert-danger'>No hay Reportes de StanBy</p>";
			} ?>
		</div>
	</div>
</section>

<div class="modal fade" id="standby_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Reportar en StandBy</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal"  enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=standby_add" role="form">
	            
				<div class="form-group">
    				<label for="inputEmail1" class="col-lg-2 control-label"></label>
    				<div class="col-md-9">
    				    <input  name="fecha" class="form-control" id="fecha" style="text-align: center; font-weight: bold;"  disabled>
    				    <script>
    				        setInterval(() => {
    				            let fecha = new Date();
    				            let fechaHora = fecha.toLocaleString();

    				            document.getElementById("fecha").value = fechaHora;
    				        }, 1000);
    				    </script>
    				</div>
				</div>

                <!-- <div class="form-group">
    				<label for="inputEmail1" class="col-lg-2 control-label">Equipo*</label>
    				<div class="col-md-9">
						<input type="text" name="equipo" value="<?php echo $user->equipo;?>" required class="form-control" id="equipo" >    				    
    				</div>
				</div> -->
				<div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label">Observación</label>
	              <div class="col-md-9">
	                <input type="text" name="st_observation" class="form-control" id="st_observation" value="StandBy" readonly>
	              </div>
	            </div>
	            <p class="alert alert-info">* Campos obligatorios</p>
	            <div class="form-group">
	              <div class="col-lg-offset-2 col-lg-10">
	                <button type="submit" class="btn btn-primary">Agregar Reporte</button>
	              </div>
	            </div>
	          </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(' #code_equipo').on('input', function() {
        // Filtrar caracteres especiales y convertir a mayúsculas
        var inputValue = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase();
        $(this).val(inputValue);
    });
});



</script> -->



