<?php

	if(count($_POST)>0){
		$user = new PersonData();
		$user->dni = $_POST["dni"];
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->address = $_POST["address"];
		$user->phone = $_POST["phone"];
		$user->email = $_POST["email"];
		$user->user_id = $_SESSION["user_id"];
		$user->add_client();

	print "<script>window.location='index.php?view=clients';</script>";

	}

?>