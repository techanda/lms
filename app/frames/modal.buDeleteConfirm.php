
<div id="buDeleteConfirm" class="modal fade vert-align" role="dialog">
  <div class='modal-dialog modal-md'>
		<div class='detail-software-backdrop drop-shadow-big border-gold '>
			<div class='modal-bar bg-gold'>
        Delete Business Unit
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>

      	<center>
      		<?php if($bu_id != 1): ?>
						<p>Are you sure you want to delete <strong><?php echo $bu_info['bu_name'];?></strong> as a business unit?</p>
						<p><small class='text-blue'><em>Please note: All orphaned applications will be assigned to <strong>Other</strong> business unit.</em></small></p>

						<form name='confirm_action' method='post' action='action.php?method=delete_bu'>
							<input type='hidden' name='delete_file' value=<?=$bu_info['bu_img'];?>>
							<input type='hidden' name='bu_id' value=<?=$bu_id;?>>
							<input type='hidden' name='folder_path' value='bu_limg'>
							<input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>

							
								<button class='btn btn-default' type='submit'>Okay</button>
								<input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'>
						</form>
					<?php else: ?>
						<p>Sorry, you are not able to delete <strong><?=$bu_info['bu_name'];?></strong>.  It is the default location for orphaned applications.</p>
						<input class='btn btn-default' type='button' value='Okay' data-dismiss='modal'>
					<?php endif; ?>
				</center>
			</div>
		</div>
	</div>
</div>





	
