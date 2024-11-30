<?php

if(count($_POST)>0){
	    $standby = StandbyData::getById($_POST["standby_id"]);		
        $standby->st_observation = $_POST["st_observation"];
		$standby->update();


print "<script>window.location='index.php?view=standbys';</script>";


}


?>