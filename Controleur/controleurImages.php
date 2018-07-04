<?php
	if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
	{
		if ($_FILES['photo']['size'] <= 1000000)
		{
			   
			$infosfichier = pathinfo($_FILES['photo']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{   
				$serverPath = 'img/' . basename($_FILES['photo']['name']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $serverPath);	
			}
		}
	}
	
	echo $serverPath;
?>