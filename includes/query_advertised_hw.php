<?php

if (isset($_GET['hw_type']) && $_GET['hw_type'] != '' && $_GET['hw_type'] != 'All') {
	$filter = TRUE;
	$hw_type = $_GET['hw_type'];
} else {
	$filter = FALSE;
}


if ($filter == TRUE) {
	$query = "SELECT hw_id,hw_type,hw_name,hw_desc,hw_specs,
									hw_img,hw_mfg,hw_type_icon,hw_type_name,
									hw_advertise 
					FROM lms_hw 
					LEFT JOIN lms_hw_type 
					ON (lms_hw.hw_type = lms_hw_type.hw_type_id)
					WHERE hw_type_name = '$hw_type' 
					AND hw_advertise = 1
					ORDER BY hw_name";
// echo $query;die();
} else {
	$query = "SELECT hw_id,hw_type,hw_name,hw_desc,hw_specs,
									hw_img,hw_mfg,hw_type_icon,hw_type_name,
									hw_advertise 
					FROM lms_hw 
					LEFT JOIN lms_hw_type 
					ON (lms_hw.hw_type = lms_hw_type.hw_type_id)
					WHERE hw_advertise = 1
					ORDER BY hw_name";
// echo $query;die();
}
		

$limit      = ( isset( $_GET['limit'] 	) ) ? $_GET[	'limit'	] : 24;
$page       = ( isset( $_GET['page'] 	) ) ? $_GET[	'page'	] : 1;
$links      = ( isset( $_GET['links'] 	) ) ? $_GET[	'links'	] : 7;

$Paginator  = new Paginator( $mysqli, $query );
$hw_results    = $Paginator->getData( $page, $limit );

		$hw = $mysqli->query($query);
		$hw_total= $hw->num_rows;
