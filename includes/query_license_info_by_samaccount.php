<?php
$query= "SELECT 	lic_id,lic_sw,lic_lic_type,lic_key,lic_user,lic_bu,
							lic_type_name,bu_name,sw_name,sw_id,bu_id
					FROM lms_lic
					LEFT JOIN lms_lic_type
					ON (lms_lic.lic_lic_type = lms_lic_type.lic_type_id)
					LEFT JOIN lms_bu
					ON (lms_lic.lic_bu = lms_bu.bu_id)
          LEFT JOIN lms_sw
          ON (lms_lic.lic_sw = lms_sw.sw_id)
					WHERE lic_user_samaccount = '". $sam_account_name."' ORDER BY lic_id";
					// echo $query;die();
		$licenses = $mysqli->query($query);
		$total_licenses = $licenses->num_rows;