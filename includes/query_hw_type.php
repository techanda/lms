<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_hw_type ORDER BY (`hw_type_id` = 9999) DESC, hw_type_name";
		$hw_type = $mysqli->query($query);
		$total_hw_type= $type->num_rows;