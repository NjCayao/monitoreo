<?php

if(count($_POST)>0){
	$user = PersonData::getById($_POST["user_id"]);
	$user->dni = $_POST["dni"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->credit_limit = $_POST["credit_limit"];
	$user->is_active_access = isset($_POST["is_active_access"])?1:0;
	$user->has_credit = isset($_POST["has_credit"])?1:0;
	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
	}
	$user->update_client();


print "<script>window.location='index.php?view=clients';</script>";


}


?>