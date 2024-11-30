<?php
	$user = UserData::getById($_SESSION["user_id"]);
	if(count($_POST)>0){
		$report = new ReportData();
		$report->user_id = $user->id;
		$report->code_equipo = $_POST["code_equipo"];
		$report->horometro_start = $_POST["horometro_start"];
		//$report->horometro_end = $_POST["horometro_end"];
			if(isset($_POST["horometro_end"])){
				$resta = $_POST["horometro_end"] - $_POST["horometro_start"];
			}else{
				$resta = "NULL";
			}
		$report->horometro_result = $resta;
		// $report->km_start = $_POST["km_start"];
		//$report->km_end = $_POST["km_end"];
		if(isset($_POST["km_end"])){
			$km = $_POST["km_end"] - $_POST["km_start"];
		}else{
			$km = "NULL";
		}
		$report->km_result = $km;
		// $report->fuel = $_POST["fuel"];
		// $report->hk_fuel = $_POST["hk_fuel"];
		// $report->front_work = $_POST["front_work"];
        $report->observation = $_POST["observation"];
        $report->turno = $_POST["turno"];
        
		$report->add();

	print "<script>window.location='index.php?view=reports';</script>";

	}

?>