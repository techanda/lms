<?php
	//Get details of currently tapped beers and total
		$query = "SELECT 	sw_id,sw_mfg,mfg_name,sw_os_windows,
							sw_os_osx,sw_os_linux,sw_type,type_color,
							type_name,sw_name,sw_desc,mfg_logo,sw_logo,
							sw_advertise,sw_auto_approve
					FROM lms_sw
					LEFT JOIN lms_mfg
					ON (lms_sw.sw_mfg = lms_mfg.mfg_id)
					LEFT JOIN lms_type
					ON (lms_sw.sw_type = lms_type.type_id)
					WHERE sw_id=".$software_id;
		$software_array = $mysqli->query($query);
		$sw_info = $software_array->fetch_assoc();