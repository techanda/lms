<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_os ";
		$os = $mysqli->query($query);
		$total_os= $os->num_rows;
