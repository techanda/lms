
<div id="hwDeleteConfirm" class="modal fade vert-align" role="dialog">
  <div class='modal-dialog modal-md'>
		<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
        Delete This From <?=$hw_info['hw_type_name']; ?>
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>

      	<center>
					<p>Are you sure you want to delete <strong><?php echo $hw_info['hw_name'];?></strong> from <?=$hw_info['hw_type_name']; ?>?</p>

					<form name='confirm_action' method='post' action='action.php?method=delete_hw'>
						<input type='hidden' name='delete_file' value=<?=$hw_info['hw_img'];?>>
						<input type='hidden' name='hw_id' value=<?=$hw_id;?>>
						<input type='hidden' name='folder_path' value='hw_img'>
						<input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>

						
						<button class='btn btn-default' type='submit'>Okay</button>
						<input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'>
					</form>
				</center>
			</div>
		</div>
	</div>
</div>





	
