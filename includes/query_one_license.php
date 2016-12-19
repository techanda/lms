<?php
		$query = "SELECT 	lic_id,lic_sw,lic_lic_type,lic_key,lic_user,lic_bu,
							lic_type_name,bu_name,lic_po,lic_purchdate,lic_expdate,lic_whencreated,lic_whenmodified
					FROM lms_lic
					LEFT JOIN lms_lic_type
					ON (lms_lic.lic_lic_type = lms_lic_type.lic_type_id)
					LEFT JOIN lms_bu
					ON (lms_lic.lic_bu = lms_bu.bu_id)
					WHERE lic_id=".$license_id;
		$result = $mysqli->query($query);
		$license_info = $result->fetch_assoc();
		

	