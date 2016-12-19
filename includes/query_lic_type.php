<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_lic_type";
		$lic_type = $mysqli->query($query);
		$total_lic_type= $lic_type->num_rows;
