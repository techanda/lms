<?php
		$query = "SELECT 	lic_id,lic_sw,lic_lic_type,lic_key,lic_user,lic_bu,
							lic_type_name,bu_name,bu_id,lic_user_samaccount
					FROM lms_lic
					LEFT JOIN lms_lic_type
					ON (lms_lic.lic_lic_type = lms_lic_type.lic_type_id)
					LEFT JOIN lms_bu
					ON (lms_lic.lic_bu = lms_bu.bu_id)
					WHERE lic_sw=".$software_id." ORDER BY lic_user,lic_id";
		$licenses = $mysqli->query($query);
		$total_licenses = $licenses->num_rows;

		$query = "SELECT 	lic_id,lic_sw,lic_lic_type,lic_key,lic_user,lic_bu,
							lic_type_name,bu_name,bu_id,lic_user_samaccount
					FROM lms_lic
					LEFT JOIN lms_lic_type
					ON (lms_lic.lic_lic_type = lms_lic_type.lic_type_id)
					LEFT JOIN lms_bu
					ON (lms_lic.lic_bu = lms_bu.bu_id)
					WHERE lic_user !='' AND lic_sw=".$software_id;
		$claimed_licenses = $mysqli->query($query);
		$total_claimed_licenses = $claimed_licenses->num_rows;

		$query = "SELECT 	lic_id,lic_sw,lic_lic_type,lic_key,lic_user,lic_bu,
							lic_type_name,bu_name,bu_id,lic_user_samaccount
					FROM lms_lic
					LEFT JOIN lms_lic_type
					ON (lms_lic.lic_lic_type = lms_lic_type.lic_type_id)
					LEFT JOIN lms_bu
					ON (lms_lic.lic_bu = lms_bu.bu_id)
					WHERE lic_user ='' AND lic_sw=".$software_id;
		$available_licenses = $mysqli->query($query);
		$total_available_licenses = $available_licenses->num_rows;