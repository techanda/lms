<?php
	//Get details of currently tapped beers and total
		$query = "SELECT *
					FROM lms_product_types ";
		$product_types = $mysqli->query($query);
		$total_product_types= $product_types->num_rows;
