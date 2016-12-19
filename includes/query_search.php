<?php
	//Get details of currently tapped beers and total
	$query = "SELECT 		bu_name,search.lic_user,lic_type_name,sw_desc,
							type_name,mfg_name,search.lic_user_samaccount,
							lic_id,lic_sw,sw_name
			  FROM 			search
			  INNER JOIN	lms_lic	ON search.itemid = lms_lic.lic_id
			  WHERE 		itemid =".$itemid;

	$search_view_results_array = $mysqli->query($query);
	$search_view_results = $search_view_results_array->fetch_assoc();


