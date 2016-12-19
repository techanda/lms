<?php 
	$admin_button_active = FALSE; 
	$advertise_notification = FALSE;
	$margin_class = '';
	$ad_prefix = '';
		switch ($_GET['view']) {
			case 'admin_sw_details':  // Settings for Admin Software Details
				$ad_prefix = 'sw';
				$href = '.?view=sw_details&swid='.$sw_info['sw_id'];
				$icon = "fa fa-user";
				$button_name = 'User View';
				$advertise_notification = TRUE;
				$admin_button_active = TRUE;
				break;
			case 'sw_details':  // Settings for Standard Software Details
				$ad_prefix = 'sw';
				$href = '.?view=admin_sw_details&swid='.$sw_info['sw_id'];
				$icon = "fa fa-cog";
				$button_name = 'Admin View';
				$advertise_notification = FALSE;
				$admin_button_active = TRUE;
				break;
			case 'sw_list':  // Settings for Standard Software List
				$margin_class = 'margin-top-15';
				//sets view type based on 'type'
				isset($_GET['type']) && $_GET['type'] != '' ? $type = '&type='.$_GET['type'] : $type = '&type=All';
				$href = '.?view=admin_sw'.$type;
				$icon = "fa fa-cog";
				$button_name = 'Admin View';
				$advertise_notification = FALSE;
				$admin_button_active = TRUE;
				break;
			case 'admin_sw':  // Settings for Admin Software List
				$margin_class = 'margin-top-15';
				isset($_GET['type']) && $_GET['type'] != '' ? $type = '&type='.$_GET['type'] : $type = '&type=All';
				$href = '.?view=sw_list'.$type;
				$icon = "fa fa-user";
				$button_name = 'User View';
				$advertise_notification = FALSE;
				break;
			case 'hw_list':
				$margin_class = 'margin-top-15';
				isset($_GET['hw_type']) && $_GET['hw_type'] != '' ? $hw_type = '&hw_type='.$_GET['hw_type'] : $hw_type = '&hw_type=All';
				$href = '.?view=admin_hw_list'.$hw_type;
				$icon = "fa fa-user";
				$button_name = 'Admin View';
				$admin_button_active = TRUE;
				$advertise_notification = FALSE;
				break;
			case 'admin_hw_list':
				$margin_class = 'margin-top-15';
				isset($_GET['hw_type']) && $_GET['hw_type'] != '' ? $hw_type = '&hw_type='.$_GET['hw_type'] : $hw_type = '&hw_type=All';
				$href = '.?view=hw_list'.$hw_type;
				$icon = "fa fa-user";
				$button_name = 'User View';
				$admin_button_active = TRUE;
				$advertise_notification = FALSE;
				break;
			case 'mfg_list': case 'bu_list': 
				$margin_class = 'margin-top-15';
				break;
			case 'hw_details':
				$ad_prefix = 'hw';
				login_check() >= 999 ? $advertise_notification = TRUE : $advertise_notification = FALSE;
				break;
			default:
				$admin_button_active = FALSE;
				$href = '';
				$icon = '';
				$button_name = '';
				break;
		}	
?>
	<!-- Back Button, Advertise Notification, View Toggle -->
	<div class=<?= '"container-fluid '.$margin_class.'"' ?>>
		<div class='row'>
			<div class='col-sm-3 col-xs-6'>
				<button class='btn btn-default btn-xs drop-shadow' onclick="history.go(-1);"><i class="fa fa-arrow-circle-left"></i> Back </button>
			</div>

			<?php if (login_Check() >= 999 && $admin_button_active == TRUE): ?>
				<div class='col-sm-3 col-xs-6 text-right'>
					<a class='btn btn-admin btn-xs drop-shadow' href=<?= $href ?>><i class=<?= $icon ?>></i> <?= $button_name ?> </a>
				</div>
			<?php endif ?>

			<?php if ($advertise_notification == TRUE): ?>
				<div id='advertise-notification' class='col-sm-6 col-xs-12'>
					<?php if (${$ad_prefix.'_info'}[$ad_prefix.'_advertise'] == 1): ?>
						<p class='text-blue'>This Application is Currently Advertised</p>
					<?php else: ?>
						<p class='text-pink'>This Application is <strong>not</strong> Currently Advertised</p>
					<?php endif ?>
				</div>
			<?php endif ?>			
		</div>
	</div>
	<!-- Back Button, Advertise Notification, View Toggle -->