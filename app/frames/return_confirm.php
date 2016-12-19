<?php include $PATH['INC'].'query_license_info_by_samaccount.php'; ?>

<?php while ($row = $licenses->fetch_assoc()): ?>
	<div id=<?='reclaimConfirm_'.$row['lic_id']; ?> class="modal fade vert-align" role="dialog">
		<div class='modal-dialog modal-md'>
			<div class='detail-software-backdrop drop-shadow-big border-green'>
				<div class='modal-bar bg-green'>
					Return this License Key
					<div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i id='exit-icon' class="fa fa-times-circle"></i></a></div>
				</div>
			<div class='modal-container'>
				<center>
					<p>Are you sure you want to return <strong><?=$row['sw_name']?>?</strong>?</p>
					<form name='confirm_action' method='post' action="action.php?method=return_license">
						<input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
						<input type='hidden' name='lic_id' value=<?=$row['lic_id'] ?>>
						<input type='submit' 	class='btn btn-default' value='Okay'>
						<input type='button' value='Cancel' class='btn btn-default' data-dismiss='modal'/>
					</form>
				</center>
			</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>

