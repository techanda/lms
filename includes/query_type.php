<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_type ORDER BY (`type_id` = 9999) DESC, type_name";
		$type = $mysqli->query($query);
		$total_type= $type->num_rows;
