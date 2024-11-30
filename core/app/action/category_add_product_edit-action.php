<?php

	if(count($_POST)>0){
		$id = $_POST['id'];
		$user = new CategoryData();
		$user->name = $_POST["name"];
		$user->description = $_POST["description"];
		$user->add();

	print "<script>window.location='index.php?view=product_edit&id=$id';</script>";

	}

?>