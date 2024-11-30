<?php

	$client = StockData::getById($_GET["id"]);
	$client->del();
	Core::redir("./index.php?view=stocks");

?>