<?php
	//Get details of currently tapped beers and total
		$query = "SELECT column1,column2,columnn
					FROM table1";
		$all_beers = $mysqli->query($query);
		$total_beers = $all_beers->num_rows;
		$all_beers_col_w = floor(100/$total_beers);