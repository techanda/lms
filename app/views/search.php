<?php 

	if(login_check() >= 999){
		include $PATH['VIEWS'].'search_admin.php'; 
	} else {
		include $PATH['VIEWS'].'search_reg.php';
	}

?>
