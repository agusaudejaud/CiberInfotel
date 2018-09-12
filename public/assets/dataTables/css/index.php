<?php 
	
	$path = "";															# INICIALIZA LA VARIABLE path.
	$r = $_SERVER['PHP_SELF'];											# OBTIENE LA URI COMPLETA.
	for($i=1;$i < substr_count($r,'/')-1;$i++){ $path .= "../"; }		# ARMA LA URI HASTA LA RAIZ DEL SERVER ../
	
	header("location: ".$path."index.php");								# REDIRECCIONA.

?>
