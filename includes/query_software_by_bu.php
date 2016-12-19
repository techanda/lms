<?php

	//Get details of currently tapped beers and total
		$query = "SELECT DISTINCT	sw_id,sw_mfg,mfg_name,sw_os_windows,
							sw_os_osx,sw_os_linux,sw_type,type_color,
							type_name,sw_name,sw_desc,mfg_logo,sw_logo,
							sw_advertise,sw_auto_approve,lic_bu
					FROM lms_lic
					LEFT JOIN lms_sw
					ON (lms_lic.lic_sw = lms_sw.sw_id)
					LEFT JOIN lms_mfg
					ON (lms_sw.sw_mfg = lms_mfg.mfg_id)
					LEFT JOIN lms_type
					ON (lms_sw.sw_type = lms_type.type_id)
					WHERE lic_bu = '$bu_id' 
					AND sw_type = '$type_id'
					ORDER BY sw_name";
		$software_array = $mysqli->query($query);
		$total_software = $software_array->num_rows;