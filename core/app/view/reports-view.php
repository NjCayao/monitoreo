<section class="content">
	<?php $admin = UserData::getById($_SESSION["user_id"]); ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-users"></i> Reportes de Equipos</h2>
			<a href='#' data-id="2" data-toggle='modal' data-target="#report_new" class='btn btn-primary'><i class='fa fa-user'></i> Nuevo Reporte</a>
			<?php if($admin->kind==1 || $admin->kind==2){ ?>
			<div class="btn-group pull-right">
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
			</div>
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
				$reports = ReportData::getAll();
			}else{
				$reports = ReportData::getAllUser($admin->id);
			}
			if(count($reports)>0){ // si hay reportes ?>
			<div class="box box-primary">
				<div class="box-body no-padding">
			  		<div class="box-body">
			  			<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width:150px;">Acción</th>
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Nombre&nbsp;Completo</th>									
									<th style="text-align: center;">Cod. Equipo</th>
									<th style="text-align: center;">H. Inicial</th>
                                    <th style="text-align: center;">H. Final</th>
                                    <th style="text-align: center;">H. Total</th>
                                    <!-- <th style="text-align: center;">km. Inicial</th>
                                    <th style="text-align: center;">km. Final</th>
                                    <th style="text-align: center;">Km. Total</th> -->
									<th >Combustible</th>
									<th style="text-align: center;">H./Km Diesel</th>
									<th style="text-align: center;">Centro de coste <br> (Fase)</th>
									<th class="combus">Descripción del Trabajo</th>									
                                    <th style="text-align: center;">Observación</th>
                                    <th style="text-align: center;">turno</th>                                   	
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($reports as $report){
									$user = $report->getUser(); ?>
								<tr>									
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td style="text-align: center;">									
										<?php if ($report->horometro_result > 0 || ($report->horometro_end >= $report->horometro_start)){  echo "<div class='btn btn-success btn-xs'>Reporte Cerrado</div>";  }else{ ?>
										<a href="index.php?view=report_edit&id=<?php echo $report->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Completar</a>&nbsp;&nbsp;
										<!-- <a href="index.php?action=report_del&id=<?php echo $report->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a></td> -->
									<?php } ?>
									<td><?php echo $report->created_at; ?></td>
									<td><?php echo $user->lastname." ".$user->name; ?></td>
									<td><?php echo $report->code_equipo; ?></td>
									<!-- HOROMETROS -->
									<td><?php if($report->horometro_start!="0"){ echo $report->horometro_start; }else{ echo "N/A"; } ?></td>
                                    <td><?php if($report->horometro_start=="0" && $report->horometro_end=="0"){ 
                                    	echo "N/A"; 
                                    }else if($report->horometro_start!="0" && $report->horometro_end=="0"){ 
                                    	echo "Pendiente"; 
                                    }else{ 
                                    	echo $report->horometro_end;
                                    } ?></td>
                                    <td><?php if($report->horometro_start=="0" && $report->horometro_end=="0"){ 
                                    	echo "N/A"; 
                                    }else if($report->horometro_start!="0" && $report->horometro_end=="0"){ 
                                    	echo "Pendiente"; 
                                    }else if($report->horometro_start!="0" && $report->horometro_end!="0"){ 
                                    	echo $report->horometro_end - $report->horometro_start;
                                    } ?></td>
									
									
									<!-- KILOMETRAJE -->
                                    <!-- <td><?php if($report->km_start!="0"){ echo $report->km_start; }else{ echo "N/A"; } ?></td>
									<td><?php if($report->km_start=="0" && $report->km_end=="0"){ 
                                    	echo "N/A"; 
                                    }else if($report->km_start!="0" && $report->km_end=="0"){ 
                                    	echo "Pendiente"; 
                                    }else{ 
                                    	echo $report->km_end;
                                    } ?></td>
									<td><?php if($report->km_start=="0" && $report->km_end=="0"){ 
                                    	echo "N/A"; 
                                    }else if($report->km_start!="0" && $report->km_end=="0"){ 
                                    	echo "Pendiente"; 
                                    }else if($report->km_start!="0" && $report->km_end!="0"){ 
                                    	echo $report->km_end - $report->km_start;
                                    } ?></td> -->


									
									<td><?php echo $report->fuel; ?></td> 
									<td><?php echo $report->hk_fuel; ?></td>
								
									<td>
										<div class="fase">									
										<?php switch ($report->front_work) {
													case 'MV01': echo "MV01"; break;
													case 'C01': echo "C01"; break;
													case 'C02': echo "C02"; break;
													case 'C03': echo "C03"; break;
													case 'C04': echo "C04"; break;
													case 'C05': echo "C05"; break;
													case 'C06': echo "C06"; break;
													case 'C07': echo "C07"; break;
													case 'C08': echo "C08"; break;																										
													case 'C09': echo "C09"; break;
													case 'C10': echo "C10"; break;													
													case 'C13': echo "C13"; break;
													case 'C14-1': echo "C14-1"; break;
													case 'C14-2': echo "C14-2"; break;
													case 'C14-3': echo "C14-3"; break;
													case 'C14-4': echo "C14-4"; break;
													case 'C14-5': echo "C14-5"; break;
													case 'C15': echo "C15"; break;
													case 'C16': echo "C16"; break;
													case 'C17': echo "C17"; break;
													case 'C18': echo "C18"; break;
													case 'C19': echo "C19"; break;
													case 'C20': echo "C20"; break;
													case 'C21': echo "C21"; break;
													case 'C22': echo "C22"; break;
													case 'C23': echo "C23"; break;
													case 'C24': echo "C24"; break;
													case 'C25': echo "C25"; break;
													default:
											# code...
													break;
												} ?>
										</div>
										

										<?php if (!empty($report->front_work_2)): ?>
										<div class="fase2">						
										<?php switch ($report->front_work_2) {
													case 'MV01': echo "MV01"; break;
													case 'C01': echo "C01"; break;
													case 'C02': echo "C02"; break;
													case 'C03': echo "C03"; break;
													case 'C04': echo "C04"; break;
													case 'C05': echo "C05"; break;
													case 'C06': echo "C06"; break;
													case 'C07': echo "C07"; break;
													case 'C08': echo "C08"; break;																										
													case 'C09': echo "C09"; break;
													case 'C10': echo "C10"; break;													
													case 'C13': echo "C13"; break;
													case 'C14-1': echo "C14-1"; break;
													case 'C14-2': echo "C14-2"; break;
													case 'C14-3': echo "C14-3"; break;
													case 'C14-4': echo "C14-4"; break;
													case 'C14-5': echo "C14-5"; break;
													case 'C15': echo "C15"; break;
													case 'C16': echo "C16"; break;
													case 'C17': echo "C17"; break;
													case 'C18': echo "C18"; break;
													case 'C19': echo "C19"; break;
													case 'C20': echo "C20"; break;
													case 'C21': echo "C21"; break;
													case 'C22': echo "C22"; break;
													case 'C23': echo "C23"; break;
													case 'C24': echo "C24"; break;
													case 'C25': echo "C25"; break;
													default:
											# code...
													break;
												} ?>
										</div>
										<?php endif; ?>


										<?php if (!empty($report->front_work_3)): ?>
										<div class="fase">									
										<?php switch ($report->front_work_3) {
													case 'MV01': echo "MV01"; break;
													case 'C01': echo "C01"; break;
													case 'C02': echo "C02"; break;
													case 'C03': echo "C03"; break;
													case 'C04': echo "C04"; break;
													case 'C05': echo "C05"; break;
													case 'C06': echo "C06"; break;
													case 'C07': echo "C07"; break;
													case 'C08': echo "C08"; break;																										
													case 'C09': echo "C09"; break;
													case 'C10': echo "C10"; break;													
													case 'C13': echo "C13"; break;
													case 'C14-1': echo "C14-1"; break;
													case 'C14-2': echo "C14-2"; break;
													case 'C14-3': echo "C14-3"; break;
													case 'C14-4': echo "C14-4"; break;
													case 'C14-5': echo "C14-5"; break;
													case 'C15': echo "C15"; break;
													case 'C16': echo "C16"; break;
													case 'C17': echo "C17"; break;
													case 'C18': echo "C18"; break;
													case 'C19': echo "C19"; break;
													case 'C20': echo "C20"; break;
													case 'C21': echo "C21"; break;
													case 'C22': echo "C22"; break;
													case 'C23': echo "C23"; break;
													case 'C24': echo "C24"; break;
													case 'C25': echo "C25"; break;
													default:
											# code...
													break;
												} ?>
										</div>
										<?php endif; ?>

										
										<?php if (!empty($report->front_work_4)): ?>
										<div class="fase2">						
										<?php switch ($report->front_work_4) {
													case 'MV01': echo "MV01"; break;
													case 'C01': echo "C01"; break;
													case 'C02': echo "C02"; break;
													case 'C03': echo "C03"; break;
													case 'C04': echo "C04"; break;
													case 'C05': echo "C05"; break;
													case 'C06': echo "C06"; break;
													case 'C07': echo "C07"; break;
													case 'C08': echo "C08"; break;																										
													case 'C09': echo "C09"; break;
													case 'C10': echo "C10"; break;													
													case 'C13': echo "C13"; break;
													case 'C14-1': echo "C14-1"; break;
													case 'C14-2': echo "C14-2"; break;
													case 'C14-3': echo "C14-3"; break;
													case 'C14-4': echo "C14-4"; break;
													case 'C14-5': echo "C14-5"; break;
													case 'C15': echo "C15"; break;
													case 'C16': echo "C16"; break;
													case 'C17': echo "C17"; break;
													case 'C18': echo "C18"; break;
													case 'C19': echo "C19"; break;
													case 'C20': echo "C20"; break;
													case 'C21': echo "C21"; break;
													case 'C22': echo "C22"; break;
													case 'C23': echo "C23"; break;
													case 'C24': echo "C24"; break;
													case 'C25': echo "C25"; break;
													default:
											# code...
													break;
												} ?>
										</div>
										<?php endif; ?>


										<?php if (!empty($report->front_work_5)): ?>
										<div class="fase">			
										<?php switch ($report->front_work_5) {
													case 'MV01': echo "MV01"; break;
													case 'C01': echo "C01"; break;
													case 'C02': echo "C02"; break;
													case 'C03': echo "C03"; break;
													case 'C04': echo "C04"; break;
													case 'C05': echo "C05"; break;
													case 'C06': echo "C06"; break;
													case 'C07': echo "C07"; break;
													case 'C08': echo "C08"; break;																										
													case 'C09': echo "C09"; break;
													case 'C10': echo "C10"; break;													
													case 'C13': echo "C13"; break;
													case 'C14-1': echo "C14-1"; break;
													case 'C14-2': echo "C14-2"; break;
													case 'C14-3': echo "C14-3"; break;
													case 'C14-4': echo "C14-4"; break;
													case 'C14-5': echo "C14-5"; break;
													case 'C15': echo "C15"; break;
													case 'C16': echo "C16"; break;
													case 'C17': echo "C17"; break;
													case 'C18': echo "C18"; break;
													case 'C19': echo "C19"; break;
													case 'C20': echo "C20"; break;
													case 'C21': echo "C21"; break;
													case 'C22': echo "C22"; break;
													case 'C23': echo "C23"; break;
													case 'C24': echo "C24"; break;
													case 'C25': echo "C25"; break;
													default:
											# code...
													break;
												}  ?>
										</div>
										<?php endif; ?>

									</td>
									<td>
										<div class="descrip">
											<?php echo $report->description_work; ?>
										</div>

										<?php if (!empty($report->description_work_2) && trim($report->description_work_2) !== ''): ?>
										<div class="descrip2">
											<?php echo $report->description_work_2; ?>
										</div>
										<?php endif; ?>

										<?php if (!empty($report->description_work_3) && trim($report->description_work_3) !== ''): ?>
										<div class="descrip">
											<?php echo $report->description_work_3; ?>
										</div>
										<?php endif; ?>

										<?php if (!empty($report->description_work_4) && trim($report->description_work_4) !== ''): ?>
    										<div class="descrip2">
    										    <?php echo $report->description_work_4; ?>
    										</div>
										<?php endif; ?>


										<?php if (!empty($report->description_work_5) && trim($report->description_work_5) !== ''): ?>
    										<div class="descrip">
    										    <?php echo $report->description_work_5; ?>
    										</div>
										<?php endif; ?>


									</td>	
									
									
                                    
									<td><?php echo $report->observation; ?></td>
                                    <td><?php switch ($report->turno) {
													case '1': echo "DÍA"; break;
													case '2': echo "NOCHE"; break;													
													default:
											# code...
													break;
												} 
                                        ?>
                                    </td>                                    
									<!-- <td style="text-align: right;"><?php echo $report->celular; ?></td> -->
									
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php }else{
			echo "<p class='alert alert-danger'>No hay Reportes</p>";
			} ?>
		</div>
	</div>
</section>

<div class="modal fade" id="report_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Ingrese Nuevo Reporte</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal"  enctype="multipart/form-data" method="post" id="addproduct" action="index.php?action=report_add" role="form">
	            
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

				            
	            <div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label">Codigo de Equipo*</label>
	              <div class="col-md-9">
	                <input type="text" name="code_equipo" class="form-control" id="code_equipo" placeholder="Ingrese el Cdg. Equipo" required>
	              </div>
	            </div>
                <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Turno</label>
					<div class="col-md-9">
						<select name="turno" class="form-control" required>
							<option value="">-- SELECCIONAR --</option>
							<option value="1">Día</option>
							<option value="2">Noche</option>							
						</select>
					</div>
				</div>

				<!-- <div class="form-group">
					<label for="inputEmail1" class="col-lg-2 control-label">Frente Trabajo</label>
					<div class="col-md-9">
						<select name="front_work" class="form-control" required>
							<option value="">-- SELECCIONAR --</option>
							<option value="1">Rio: Chico</option>
							<option value="2">Rio: Mata-Gente</option>							
						</select>
					</div>
				</div> -->

                <div class="line1">
	              <h4>Maquinaria</h4>
	            </div>


	            <div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label">Horometro. Inicial</label>
	              <div class="col-md-9">
	                <input type="text" name="horometro_start" class="form-control" id="horometro_start" placeholder="ingrese el horometro inicial" >
	              </div>
	            </div>
				<!-- Horometro final -->
	            <!--<div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label"></label>
	              <div class="col-md-9">
	                <input type="hidden" name="horometro_end" class="form-control" id="horometro_end" placeholder="ingrese el horometro final" >
	              </div>
	            </div>-->

                <!-- <div class="line2">
	              <h4>Camionetas y/o volquetes</h4>
	            </div>
                
                

	            <div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label">Km Inicial</label>
	              <div class="col-md-9">
	                <input type="text" name="km_start" class="form-control" id="km_start" placeholder="ingrese el kilometraje inicial" >
	              </div>
	            </div> -->
				<!-- km final -->
                <!--<div class="form-group">
	              
	              <div class="col-md-9">
	                <input type="hidden" name="km_end" class="form-control" id="km_end" placeholder="ingrese el kilometraje final" >
	              </div>
	            </div>-->

				


				<!-- Combustible -->
				<!-- <div class="form-group">
	              
	              <div class="col-md-9">
	                <input type="hidden" name="fuel" class="form-control" id="fuel" placeholder="ingrese el N° de GL" >
	              </div>
	            </div> -->
				<!-- Horometro del combustible -->
				<!-- <div class="form-group">
	              
	              <div class="col-md-9">
	                <input type="hidden" name="hk_fuel" class="form-control" id="hk_fuel" placeholder="ingrese el N° de GL" >
	              </div>
	            </div> -->

                <div class="form-group">
	              <label for="inputEmail1" class="col-lg-2 control-label">Observación</label>
	              <div class="col-md-9">
	                <input type="text" name="observation" class="form-control" id="observation" placeholder="Ingrese alguna observación del equipo" >
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








<script>
$(document).ready(function() {
    $(' #code_equipo').on('input', function() {
        // Filtrar caracteres especiales y convertir a mayúsculas
        var inputValue = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase();
        $(this).val(inputValue);
    });
});



</script>



