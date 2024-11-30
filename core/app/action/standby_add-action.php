<?php
	$user = UserData::getById($_SESSION["user_id"]);
	if(count($_POST)>0){
		$standby = new StandbyData();
		$standby->user_id = $user->id;
		$standby->user_dni = $user->dni;
        $standby->user_equipo = $user->equipo;        
        $standby->user_cdgequipo = $user->cdgequipo;
        $standby->user_celular = $user->celular;        		
        $standby->st_observation = $_POST["st_observation"];
        
		$standby->add();

	print "<script>window.location='index.php?view=standbys';</script>";

	}

?>