<?php
//Get details of currently tapped beers and total
$query = "SELECT hw_id,hw_type,hw_name,hw_desc,hw_specs,mfg_name,
									mfg_id,hw_img,hw_mfg,hw_type_icon,hw_type_name,
									hw_advertise  
					FROM lms_hw 
					LEFT JOIN lms_hw_type
					ON (lms_hw.hw_type = lms_hw_type.hw_type_id)
					LEFT JOIN lms_mfg
					ON (lms_hw.hw_mfg = lms_mfg.mfg_id)
					WHERE hw_id =".$hw_id;
//echo $query;die();
$current_hw = $mysqli->query($query);
$hw_info = $current_hw->fetch_assoc();

