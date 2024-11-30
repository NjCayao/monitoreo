<?php

if(count($_POST)>0){
	    $report = ReportData::getById($_POST["report_id"]);

		if($_POST["horometro_end"]!=""){
			$resta = $_POST["horometro_end"] - $_POST["horometro_start"];
		}else{
			$resta = 0;
		}

		$report->horometro_end = $_POST["horometro_end"];
		$report->horometro_result = $resta;

		// if($_POST["km_end"]!=""){
		// 	$km = $_POST["km_end"] - $_POST["km_start"];
		// }else{
		// 	$km = 0;
		// }

		// $report->km_end = $_POST["km_end"];
		// $report->km_result = $km;
		$report->fuel = $_POST["fuel"];
		$report->hk_fuel = $_POST["hk_fuel"];

		$report->front_work = $_POST["front_work"];
		$report->description_work = $_POST["description_work"];

		$report->front_work_2 = $_POST["front_work_2"];
		$report->description_work_2 = $_POST["description_work_2"];

		$report->front_work_3 = $_POST["front_work_3"];
		$report->description_work_3 = $_POST["description_work_3"];

		$report->front_work_4 = $_POST["front_work_4"];
		$report->description_work_4 = $_POST["description_work_4"];

		$report->front_work_5 = $_POST["front_work_5"];
		$report->description_work_5 = $_POST["description_work_5"];

        $report->observation = $_POST["observation"];
		$report->update();


print "<script>window.location='index.php?view=reports';</script>";


}


?>