
<?php
require("../core/controller/Database.php");
require("../core/controller/Core.php");
require("../core/controller/Model.php");
include "../core/controller/Executor.php";
include "../core/app/model/UserData.php";
include "../core/app/model/ReportData.php";

header("Pragma: public");
header("Expires: 0");
$filename = "reporte_de_equipos.xls";
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$reports = ReportData::getAllUser($_GET["par"]);

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
?>
<!-- Resto del código para la generación del archivo Excel -->

<section class="content-header">
    <h1>Lista de Reportes</h1>
</section>
<section class="content"> <!-- Main content -->
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body no-padding">
					<div class="box-body">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width:150px;"><?php echo utf8_decode("Acción") ?></th>
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Nombre&nbsp;Completo</th>									
									<th style="text-align: center;">Cod. Equipo</th>
									<th style="text-align: center;">H. Inicial</th>
                                    <th style="text-align: center;">H. Final</th>
                                    <th style="text-align: center;">H. Total</th>
                                    <th style="text-align: center;">km. Inicial</th>
                                    <th style="text-align: center;">km. Final</th>
                                    <th style="text-align: center;">Km. Total</th>
									<th style="text-align: center;">Combustible</th>
									<th style="text-align: center;">H./Km Diesel</th>
                                    <th style="text-align: center;"><?php echo utf8_decode("Observación") ?></th>
                                    <th style="text-align: center;">turno</th>                                   	
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($reports as $report){
									$user = $report->getUser(); ?>
								<tr>									
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td style="text-align: center;">
										<?php if($report->horometro_result>0 || $report->km_result>0){  echo "<div class='btn btn-success btn-xs'>Reporte Cerrado</div>";  }else{ ?>
										<a href="index.php?view=report_edit&id=<?php echo $report->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>&nbsp;&nbsp;
										<a href="index.php?action=report_del&id=<?php echo $report->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a></td>
									<?php } ?>
									<td><?php echo $report->created_at; ?></td>
									<td><?php echo utf8_decode( $user->lastname." ".$user->name); ?></td>
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
                                    <td><?php if($report->km_start!="0"){ echo $report->km_start; }else{ echo "N/A"; } ?></td>
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
                                    } ?></td>
									<td><?php echo $report->fuel; ?></td> 
									<td><?php echo $report->hk_fuel; ?></td>                             
                                    <td><?php echo $report->observation; ?></td>
                                    <td><?php switch ($report->turno) {
													case '1': echo utf8_decode("DÍA"); break;
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
	</div>
</section>