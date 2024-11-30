<?php

	if(count($_POST)>0){
		$user = SpendData::getById($_POST["user_id"]);
		$user->name = $_POST["name"];
		$user->price = $_POST["price"];
		$user->created_at = $_POST["created_at"];
		$user->update();
	print "<script>window.location='index.php?view=spends';</script>";
	}

?>