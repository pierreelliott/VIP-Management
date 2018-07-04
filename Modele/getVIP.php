<?php
	require("modeleVIP.php");
	
	echo json_encode(getVIP($_POST["numVIP"]));
?>