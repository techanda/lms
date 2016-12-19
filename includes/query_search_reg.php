<?php

	$query = "SELECT 		*
			  FROM 			reg_search
			  WHERE 		itemid =".$itemid;

	$search_view_results_array = $mysqli->query($query);
	$search_view_results = $search_view_results_array->fetch_assoc();


