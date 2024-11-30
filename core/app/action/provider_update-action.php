<?php

	if(count($_POST)>0){
		$user = PersonData::getById($_POST["user_id"]);
		$user->no = $_POST["no"];
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->address = $_POST["address"];
		$user->email = $_POST["email"];
		$user->phone = $_POST["phone"];
		$user->update_provider();

	print "<script>window.location='index.php?view=providers';</script>";

	}

?>