<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el horómetro final está vacío
    if (empty($_POST["horometro_end"])) {
        $error_message = "Por favor, ingresar horómetro final.";
    } else {
        // Procesa el formulario y actualiza el reporte
        $report_id = $_POST["report_id"];
        $horometro_end = $_POST["horometro_end"];

        // Aquí deberías incluir la lógica para actualizar el reporte con el horómetro final

        // Después de actualizar, redirige a la vista de reportes
        header("Location: index.php?view=reports");
        exit();
    }
}

?>


<section class="content">
<?php $report = ReportData::getById($_GET["id"]); ?>
  <div class="row">
  	<div class="col-md-12">  
    	<h2><i class="fa fa-male"></i> Actualizar Reporte</h2>
      <a href="index.php?view=reports" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
    	<br><br>
  		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=report_update" role="form">
        
        <!-- turno -->
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="turno" value="<?php echo $report->turno;?>" class="form-control" id="turno" placeholder="Ingrese el codigo del equipo">
          </div>
        </div>
    


        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Cod. Equipo*</label>
          <div class="col-md-6">
            <input type="text" name="code_equipo" value="<?php echo $report->code_equipo;?>" class="form-control" id="code_equipo" placeholder="Ingrese el codigo del equipo" >
          </div>
        </div>

        <div class="line1">
	        <h4>HOROMETROS Y DESCRIPCIÓN DEL TRABAJO</h4>
	      </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Horometro Inicial*</label>
          <div class="col-md-6">
            <input type="number" name="horometro_start" value="<?php echo $report->horometro_start;?>" class="form-control" id="horometro_start" placeholder="Horometro Inicial" >
          </div>
        </div>



        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Trabajo* (1)</label>
          <div class="col-md-6">
              <select name="front_work" id="front_work" class="form-control" required>
                <option value="">--Seleccionar--</option>
                <option value="MV01" <?php echo ($report->front_work == "MV01") ? "selected" : ""; ?>>Mantenimiento de Vías y Seguridad Vial</option>
                <option value="C01" <?php echo ($report->front_work == "C01") ? "selected" : ""; ?>>Desbroce y Limpieza</option>
                <option value="C02" <?php echo ($report->front_work == "C02") ? "selected" : ""; ?>>Excav. de explanaciones materiales sueltos</option>
                <option value="C03" <?php echo ($report->front_work == "C03") ? "selected" : ""; ?>>Relleno compactado con mat. Propio</option>
                <option value="C04" <?php echo ($report->front_work == "C04") ? "selected" : ""; ?>>Const. Oficinas talleres (inc. Operación)</option>                
                <option value="C05" <?php echo ($report->front_work == "C05") ? "selected" : ""; ?>>Mejoramiento de caminos existentes</option>
                <option value="C06" <?php echo ($report->front_work == "C06") ? "selected" : ""; ?>>Caminos para construcción</option>
                <option value="C07" <?php echo ($report->front_work == "C07") ? "selected" : ""; ?>>Excav. de mat. No clasificado</option>							
                <option value="C08" <?php echo ($report->front_work == "C08") ? "selected" : ""; ?>>Excav. Uña de Dique - Mat. Suelo</option>
                <option value="C09" <?php echo ($report->front_work == "C09") ? "selected" : ""; ?>>Excav. Poza amortiguadora - Mat. suelo</option>
                <option value="C10" <?php echo ($report->front_work == "C10") ? "selected" : ""; ?>>Excav. y conformación de fundación de dique</option>
                <option value="C13" <?php echo ($report->front_work == "C13") ? "selected" : ""; ?>>Enrocado de uña de dique</option>
                <option value="C14-1" <?php echo ($report->front_work == "C14-1") ? "selected" : ""; ?>>Enrocado de capa nivelante</option>
                <option value="C14-2" <?php echo ($report->front_work == "C14-2") ? "selected" : ""; ?>>Enrocado de Capa 1</option>
                <option value="C14-3" <?php echo ($report->front_work == "C14-3") ? "selected" : ""; ?>>Enrocado de Capa 2</option>
                <option value="C14-4" <?php echo ($report->front_work == "C14-4") ? "selected" : ""; ?>>Enrocado de Capa 3</option>                
                <option value="C14-5" <?php echo ($report->front_work == "C14-5") ? "selected" : ""; ?>>Enrocado de Capa 4</option>
                <option value="C15" <?php echo ($report->front_work == "C15") ? "selected" : ""; ?>>Enrocado de Poza Amortiguadora</option>
                <option value="C16" <?php echo ($report->front_work == "C16") ? "selected" : ""; ?>>Transporte de roca D < = 1km (inc. Carguío)</option>
                <option value="C17" <?php echo ($report->front_work == "C17") ? "selected" : ""; ?>>Transporte de roca D > = 1km</option>
                <option value="C18" <?php echo ($report->front_work == "C18") ? "selected" : ""; ?>>Transporte de mat. suelto D < = 1km</option>
                <option value="C19" <?php echo ($report->front_work == "C19") ? "selected" : ""; ?>>Transporte de mat. suelto D > = 1km</option>
                <option value="C20" <?php echo ($report->front_work == "C20") ? "selected" : ""; ?>>Conformación y acomodo DME</option>
                <option value="C21" <?php echo ($report->front_work == "C21") ? "selected" : ""; ?>>Readecuación ambiental de campamento, polvorin y otros</option>
                <option value="C22" <?php echo ($report->front_work == "C22") ? "selected" : ""; ?>>Rescate y reubicación de cactáceas</option>
                <option value="C23" <?php echo ($report->front_work == "C23") ? "selected" : ""; ?>>Revegetación de áreas auxiliares</option>
                <option value="C24" <?php echo ($report->front_work == "C24") ? "selected" : ""; ?>>Plan de gestión de residuos solidos</option>
                <option value="C25" <?php echo ($report->front_work == "C25") ? "selected" : ""; ?>>Señalizacipon temporal medio ambiente</option>          
                </select>
              </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="description_work" value="<?php echo $report->description_work;?>" class="form-control" id="description_work" placeholder="Descripcion del trabajo" >
          </div>
        </div>





        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Trabajo* (2)</label>
          <div class="col-md-6">
              <select name="front_work_2" id="front_work_2" class="form-control" >
                <option value="">--Seleccionar--</option>
                <option value="MV01" <?php echo ($report->front_work_2 == "MV01") ? "selected" : ""; ?>>Mantenimiento de Vías y Seguridad Vial</option>
                <option value="C01" <?php echo ($report->front_work_2 == "C01") ? "selected" : ""; ?>>Desbroce y Limpieza</option>
                <option value="C02" <?php echo ($report->front_work_2 == "C02") ? "selected" : ""; ?>>Excav. de explanaciones materiales sueltos</option>
                <option value="C03" <?php echo ($report->front_work_2 == "C03") ? "selected" : ""; ?>>Relleno compactado con mat. Propio</option>
                <option value="C04" <?php echo ($report->front_work_2 == "C04") ? "selected" : ""; ?>>Const. Oficinas talleres (inc. Operación)</option>                
                <option value="C05" <?php echo ($report->front_work_2 == "C05") ? "selected" : ""; ?>>Mejoramiento de caminos existentes</option>
                <option value="C06" <?php echo ($report->front_work_2 == "C06") ? "selected" : ""; ?>>Caminos para construcción</option>
                <option value="C07" <?php echo ($report->front_work_2 == "C07") ? "selected" : ""; ?>>Excav. de mat. No clasificado</option>							
                <option value="C08" <?php echo ($report->front_work_2 == "C08") ? "selected" : ""; ?>>Excav. Uña de Dique - Mat. Suelo</option>
                <option value="C09" <?php echo ($report->front_work_2 == "C09") ? "selected" : ""; ?>>Excav. Poza amortiguadora - Mat. suelo</option>
                <option value="C10" <?php echo ($report->front_work_2 == "C10") ? "selected" : ""; ?>>Excav. y conformación de fundación de dique</option>
                <option value="C13" <?php echo ($report->front_work_2 == "C13") ? "selected" : ""; ?>>Enrocado de uña de dique</option>
                <option value="C14-1" <?php echo ($report->front_work_2 == "C14-1") ? "selected" : ""; ?>>Enrocado de capa nivelante</option>
                <option value="C14-2" <?php echo ($report->front_work_2 == "C14-2") ? "selected" : ""; ?>>Enrocado de Capa 1</option>
                <option value="C14-3" <?php echo ($report->front_work_2 == "C14-3") ? "selected" : ""; ?>>Enrocado de Capa 2</option>
                <option value="C14-4" <?php echo ($report->front_work_2 == "C14-4") ? "selected" : ""; ?>>Enrocado de Capa 3</option>                
                <option value="C14-5" <?php echo ($report->front_work_2 == "C14-5") ? "selected" : ""; ?>>Enrocado de Capa 4</option>
                <option value="C15" <?php echo ($report->front_work_2 == "C15") ? "selected" : ""; ?>>Enrocado de Poza Amortiguadora</option>
                <option value="C16" <?php echo ($report->front_work_2 == "C16") ? "selected" : ""; ?>>Transporte de roca D < = 1km (inc. Carguío)</option>
                <option value="C17" <?php echo ($report->front_work_2 == "C17") ? "selected" : ""; ?>>Transporte de roca D > = 1km</option>
                <option value="C18" <?php echo ($report->front_work_2 == "C18") ? "selected" : ""; ?>>Transporte de mat. suelto D < = 1km</option>
                <option value="C19" <?php echo ($report->front_work_2 == "C19") ? "selected" : ""; ?>>Transporte de mat. suelto D > = 1km</option>
                <option value="C20" <?php echo ($report->front_work_2 == "C20") ? "selected" : ""; ?>>Conformación y acomodo DME</option>
                <option value="C21" <?php echo ($report->front_work_2 == "C21") ? "selected" : ""; ?>>Readecuación ambiental de campamento, polvorin y otros</option>
                <option value="C22" <?php echo ($report->front_work_2 == "C22") ? "selected" : ""; ?>>Rescate y reubicación de cactáceas</option>
                <option value="C23" <?php echo ($report->front_work_2 == "C23") ? "selected" : ""; ?>>Revegetación de áreas auxiliares</option>
                <option value="C24" <?php echo ($report->front_work_2 == "C24") ? "selected" : ""; ?>>Plan de gestión de residuos solidos</option>
                <option value="C25" <?php echo ($report->front_work_2 == "C25") ? "selected" : ""; ?>>Señalizacipon temporal medio ambiente</option>          
                </select>
              </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="description_work_2" value="<?php echo $report->description_work_2;?>" class="form-control" id="description_work_2" >
          </div>
        </div>




        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Trabajo* (3)</label>
          <div class="col-md-6">
              <select name="front_work_3" id="front_work_3" class="form-control" >
                <option value="">--Seleccionar--</option>
                <option value="MV01" <?php echo ($report->front_work_3 == "MV01") ? "selected" : ""; ?>>Mantenimiento de Vías y Seguridad Vial</option>
                <option value="C01" <?php echo ($report->front_work_3 == "C01") ? "selected" : ""; ?>>Desbroce y Limpieza</option>
                <option value="C02" <?php echo ($report->front_work_3 == "C02") ? "selected" : ""; ?>>Excav. de explanaciones materiales sueltos</option>
                <option value="C03" <?php echo ($report->front_work_3 == "C03") ? "selected" : ""; ?>>Relleno compactado con mat. Propio</option>
                <option value="C04" <?php echo ($report->front_work_3 == "C04") ? "selected" : ""; ?>>Const. Oficinas talleres (inc. Operación)</option>                
                <option value="C05" <?php echo ($report->front_work_3 == "C05") ? "selected" : ""; ?>>Mejoramiento de caminos existentes</option>
                <option value="C06" <?php echo ($report->front_work_3 == "C06") ? "selected" : ""; ?>>Caminos para construcción</option>
                <option value="C07" <?php echo ($report->front_work_3 == "C07") ? "selected" : ""; ?>>Excav. de mat. No clasificado</option>							
                <option value="C08" <?php echo ($report->front_work_3 == "C08") ? "selected" : ""; ?>>Excav. Uña de Dique - Mat. Suelo</option>
                <option value="C09" <?php echo ($report->front_work_3 == "C09") ? "selected" : ""; ?>>Excav. Poza amortiguadora - Mat. suelo</option>
                <option value="C10" <?php echo ($report->front_work_3 == "C10") ? "selected" : ""; ?>>Excav. y conformación de fundación de dique</option>
                <option value="C13" <?php echo ($report->front_work_3 == "C13") ? "selected" : ""; ?>>Enrocado de uña de dique</option>
                <option value="C14-1" <?php echo ($report->front_work_3 == "C14-1") ? "selected" : ""; ?>>Enrocado de capa nivelante</option>
                <option value="C14-2" <?php echo ($report->front_work_3 == "C14-2") ? "selected" : ""; ?>>Enrocado de Capa 1</option>
                <option value="C14-3" <?php echo ($report->front_work_3 == "C14-3") ? "selected" : ""; ?>>Enrocado de Capa 2</option>
                <option value="C14-4" <?php echo ($report->front_work_3 == "C14-4") ? "selected" : ""; ?>>Enrocado de Capa 3</option>                
                <option value="C14-5" <?php echo ($report->front_work_3 == "C14-5") ? "selected" : ""; ?>>Enrocado de Capa 4</option>
                <option value="C15" <?php echo ($report->front_work_3 == "C15") ? "selected" : ""; ?>>Enrocado de Poza Amortiguadora</option>
                <option value="C16" <?php echo ($report->front_work_3 == "C16") ? "selected" : ""; ?>>Transporte de roca D < = 1km (inc. Carguío)</option>
                <option value="C17" <?php echo ($report->front_work_3 == "C17") ? "selected" : ""; ?>>Transporte de roca D > = 1km</option>
                <option value="C18" <?php echo ($report->front_work_3 == "C18") ? "selected" : ""; ?>>Transporte de mat. suelto D < = 1km</option>
                <option value="C19" <?php echo ($report->front_work_3 == "C19") ? "selected" : ""; ?>>Transporte de mat. suelto D > = 1km</option>
                <option value="C20" <?php echo ($report->front_work_3 == "C20") ? "selected" : ""; ?>>Conformación y acomodo DME</option>
                <option value="C21" <?php echo ($report->front_work_3 == "C21") ? "selected" : ""; ?>>Readecuación ambiental de campamento, polvorin y otros</option>
                <option value="C22" <?php echo ($report->front_work_3 == "C22") ? "selected" : ""; ?>>Rescate y reubicación de cactáceas</option>
                <option value="C23" <?php echo ($report->front_work_3 == "C23") ? "selected" : ""; ?>>Revegetación de áreas auxiliares</option>
                <option value="C24" <?php echo ($report->front_work_3 == "C24") ? "selected" : ""; ?>>Plan de gestión de residuos solidos</option>
                <option value="C25" <?php echo ($report->front_work_3 == "C25") ? "selected" : ""; ?>>Señalizacipon temporal medio ambiente</option>          
                </select>
              </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="description_work_3" value="<?php echo $report->description_work_3;?>" class="form-control" id="description_work_3" >
          </div>
        </div>




        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Trabajo* (4)</label>
          <div class="col-md-6">
              <select name="front_work_4" id="front_work_4" class="form-control" >
                <option value="">--Seleccionar--</option>
                <option value="MV01" <?php echo ($report->front_work_4 == "MV01") ? "selected" : ""; ?>>Mantenimiento de Vías y Seguridad Vial</option>
                <option value="C01" <?php echo ($report->front_work_4 == "C01") ? "selected" : ""; ?>>Desbroce y Limpieza</option>
                <option value="C02" <?php echo ($report->front_work_4 == "C02") ? "selected" : ""; ?>>Excav. de explanaciones materiales sueltos</option>
                <option value="C03" <?php echo ($report->front_work_4 == "C03") ? "selected" : ""; ?>>Relleno compactado con mat. Propio</option>
                <option value="C04" <?php echo ($report->front_work_4 == "C04") ? "selected" : ""; ?>>Const. Oficinas talleres (inc. Operación)</option>                
                <option value="C05" <?php echo ($report->front_work_4 == "C05") ? "selected" : ""; ?>>Mejoramiento de caminos existentes</option>
                <option value="C06" <?php echo ($report->front_work_4 == "C06") ? "selected" : ""; ?>>Caminos para construcción</option>
                <option value="C07" <?php echo ($report->front_work_4 == "C07") ? "selected" : ""; ?>>Excav. de mat. No clasificado</option>							
                <option value="C08" <?php echo ($report->front_work_4 == "C08") ? "selected" : ""; ?>>Excav. Uña de Dique - Mat. Suelo</option>
                <option value="C09" <?php echo ($report->front_work_4 == "C09") ? "selected" : ""; ?>>Excav. Poza amortiguadora - Mat. suelo</option>
                <option value="C10" <?php echo ($report->front_work_4 == "C10") ? "selected" : ""; ?>>Excav. y conformación de fundación de dique</option>
                <option value="C13" <?php echo ($report->front_work_4 == "C13") ? "selected" : ""; ?>>Enrocado de uña de dique</option>
                <option value="C14-1" <?php echo ($report->front_work_4 == "C14-1") ? "selected" : ""; ?>>Enrocado de capa nivelante</option>
                <option value="C14-2" <?php echo ($report->front_work_4 == "C14-2") ? "selected" : ""; ?>>Enrocado de Capa 1</option>
                <option value="C14-3" <?php echo ($report->front_work_4 == "C14-3") ? "selected" : ""; ?>>Enrocado de Capa 2</option>
                <option value="C14-4" <?php echo ($report->front_work_4 == "C14-4") ? "selected" : ""; ?>>Enrocado de Capa 3</option>                
                <option value="C14-5" <?php echo ($report->front_work_4 == "C14-5") ? "selected" : ""; ?>>Enrocado de Capa 4</option>
                <option value="C15" <?php echo ($report->front_work_4 == "C15") ? "selected" : ""; ?>>Enrocado de Poza Amortiguadora</option>
                <option value="C16" <?php echo ($report->front_work_4 == "C16") ? "selected" : ""; ?>>Transporte de roca D < = 1km (inc. Carguío)</option>
                <option value="C17" <?php echo ($report->front_work_4 == "C17") ? "selected" : ""; ?>>Transporte de roca D > = 1km</option>
                <option value="C18" <?php echo ($report->front_work_4 == "C18") ? "selected" : ""; ?>>Transporte de mat. suelto D < = 1km</option>
                <option value="C19" <?php echo ($report->front_work_4 == "C19") ? "selected" : ""; ?>>Transporte de mat. suelto D > = 1km</option>
                <option value="C20" <?php echo ($report->front_work_4 == "C20") ? "selected" : ""; ?>>Conformación y acomodo DME</option>
                <option value="C21" <?php echo ($report->front_work_4 == "C21") ? "selected" : ""; ?>>Readecuación ambiental de campamento, polvorin y otros</option>
                <option value="C22" <?php echo ($report->front_work_4 == "C22") ? "selected" : ""; ?>>Rescate y reubicación de cactáceas</option>
                <option value="C23" <?php echo ($report->front_work_4 == "C23") ? "selected" : ""; ?>>Revegetación de áreas auxiliares</option>
                <option value="C24" <?php echo ($report->front_work_4 == "C24") ? "selected" : ""; ?>>Plan de gestión de residuos solidos</option>
                <option value="C25" <?php echo ($report->front_work_4 == "C25") ? "selected" : ""; ?>>Señalizacipon temporal medio ambiente</option>          
                </select>
              </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="description_work_4" value="<?php echo $report->description_work_4;?>" class="form-control" id="description_work_4" >
          </div>
        </div>




        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Trabajo* (5)</label>
          <div class="col-md-6">
              <select name="front_work_5" id="front_work_5" class="form-control">
                <option value="">--Seleccionar--</option>
                <option value="MV01" <?php echo ($report->front_work_5 == "MV01") ? "selected" : ""; ?>>Mantenimiento de Vías y Seguridad Vial</option>
                <option value="C01" <?php echo ($report->front_work_5 == "C01") ? "selected" : ""; ?>>Desbroce y Limpieza</option>
                <option value="C02" <?php echo ($report->front_work_5 == "C02") ? "selected" : ""; ?>>Excav. de explanaciones materiales sueltos</option>
                <option value="C03" <?php echo ($report->front_work_5 == "C03") ? "selected" : ""; ?>>Relleno compactado con mat. Propio</option>
                <option value="C04" <?php echo ($report->front_work_5 == "C04") ? "selected" : ""; ?>>Const. Oficinas talleres (inc. Operación)</option>                
                <option value="C05" <?php echo ($report->front_work_5 == "C05") ? "selected" : ""; ?>>Mejoramiento de caminos existentes</option>
                <option value="C06" <?php echo ($report->front_work_5 == "C06") ? "selected" : ""; ?>>Caminos para construcción</option>
                <option value="C07" <?php echo ($report->front_work_5 == "C07") ? "selected" : ""; ?>>Excav. de mat. No clasificado</option>							
                <option value="C08" <?php echo ($report->front_work_5 == "C08") ? "selected" : ""; ?>>Excav. Uña de Dique - Mat. Suelo</option>
                <option value="C09" <?php echo ($report->front_work_5 == "C09") ? "selected" : ""; ?>>Excav. Poza amortiguadora - Mat. suelo</option>
                <option value="C10" <?php echo ($report->front_work_5 == "C10") ? "selected" : ""; ?>>Excav. y conformación de fundación de dique</option>
                <option value="C13" <?php echo ($report->front_work_5 == "C13") ? "selected" : ""; ?>>Enrocado de uña de dique</option>
                <option value="C14-1" <?php echo ($report->front_work_5 == "C14-1") ? "selected" : ""; ?>>Enrocado de capa nivelante</option>
                <option value="C14-2" <?php echo ($report->front_work_5 == "C14-2") ? "selected" : ""; ?>>Enrocado de Capa 1</option>
                <option value="C14-3" <?php echo ($report->front_work_5 == "C14-3") ? "selected" : ""; ?>>Enrocado de Capa 2</option>
                <option value="C14-4" <?php echo ($report->front_work_5 == "C14-4") ? "selected" : ""; ?>>Enrocado de Capa 3</option>                
                <option value="C14-5" <?php echo ($report->front_work_5 == "C14-5") ? "selected" : ""; ?>>Enrocado de Capa 4</option>
                <option value="C15" <?php echo ($report->front_work_5 == "C15") ? "selected" : ""; ?>>Enrocado de Poza Amortiguadora</option>
                <option value="C16" <?php echo ($report->front_work_5 == "C16") ? "selected" : ""; ?>>Transporte de roca D < = 1km (inc. Carguío)</option>
                <option value="C17" <?php echo ($report->front_work_5 == "C17") ? "selected" : ""; ?>>Transporte de roca D > = 1km</option>
                <option value="C18" <?php echo ($report->front_work_5 == "C18") ? "selected" : ""; ?>>Transporte de mat. suelto D < = 1km</option>
                <option value="C19" <?php echo ($report->front_work_5 == "C19") ? "selected" : ""; ?>>Transporte de mat. suelto D > = 1km</option>
                <option value="C20" <?php echo ($report->front_work_5 == "C20") ? "selected" : ""; ?>>Conformación y acomodo DME</option>
                <option value="C21" <?php echo ($report->front_work_5 == "C21") ? "selected" : ""; ?>>Readecuación ambiental de campamento, polvorin y otros</option>
                <option value="C22" <?php echo ($report->front_work_5 == "C22") ? "selected" : ""; ?>>Rescate y reubicación de cactáceas</option>
                <option value="C23" <?php echo ($report->front_work_5 == "C23") ? "selected" : ""; ?>>Revegetación de áreas auxiliares</option>
                <option value="C24" <?php echo ($report->front_work_5 == "C24") ? "selected" : ""; ?>>Plan de gestión de residuos solidos</option>
                <option value="C25" <?php echo ($report->front_work_5 == "C25") ? "selected" : ""; ?>>Señalizacipon temporal medio ambiente</option>          
                </select>
              </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label"></label>
          <div class="col-md-6">
            <input type="hidden" name="description_work_5" value="<?php echo $report->description_work_5;?>" class="form-control" id="description_work_5">
          </div>
        </div>



        
        <span class="nota">Nota: Solo poner Horometro Final al terminar la jordana de trabajo.</span>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Horometro Final*</label>
          <div class="col-md-6">
            <input type="number" name="horometro_end" value="<?php echo $report->horometro_end;?>" class="form-control" id="horometro_final" placeholder="Horometro Final">
          </div>
        </div>

        <!-- <div class="line2">
	         <h4>KILOMETRAJES</h4>
	      </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Kilometraje Inicial</label>
          <div class="col-md-6">
            <input type="text" name="km_start"  value="<?php echo $report->km_start;?>"  class="form-control" id="km_start" placeholder="Kilometraje inicial" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Kilometraje Final</label>
          <div class="col-md-6">
            <input type="text" name="km_end"  value="<?php echo $report->km_end;?>"  class="form-control" id="km_end" placeholder="Kilometraje final" >
          </div>
        </div> -->
        
        <div class="line3">
	        <h4>OBSERVACIONES Y REPORTE DE COMBUSTIBLE</h4>
	      </div>

        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Observación</label>
          <div class="col-md-6">
            <input type="text" name="observation"  value="<?php echo $report->observation;?>"  class="form-control" id="observation" placeholder="Ingrese alguna observación del equipo">
          </div>
        </div>

        <div class="form-group">
	        <label for="inputEmail1" class="col-lg-2 control-label">Combustible / GL</label>
	        <div class="col-md-6">
	          <input type="text" name="fuel" value="<?php echo $report->fuel;?>" class="form-control" id="fuel" placeholder="ingrese el N° de GL" >
	        </div>
	      </div>
        <div class="form-group">
	        <label for="inputEmail1" class="col-lg-2 control-label">Horometro / km del Abastecimiento</label>
	        <div class="col-md-6">
	          <input type="text" name="hk_fuel" value="<?php echo $report->hk_fuel;?>" class="form-control" id="hk_fuel" placeholder="Horometro / kilometraje" >
	        </div>
	      </div>
        <p class="alert alert-info">* Campos obligatorios</p>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="hidden" name="report_id" value="<?php echo $report->id;?>">
            <button type="submit" class="btn btn-primary">Actualizar Reporte</button> 
          </div>         
        </div>

      </form>
  	</div>
  </div>
</section>




