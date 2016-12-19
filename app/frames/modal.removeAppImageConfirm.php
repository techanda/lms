<?php
// $software_id = $_GET['swid'];
// include $PATH['INC'].'query_one_software.php';
?>

<div id="removeAppImageConfirm" class="modal fade vert-align" role="dialog">
  <div class='modal-dialog modal-sm'>
		<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
        Remove Application Image
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>

				<p>Are you sure you want to remove the image of <strong><?= $sw_info['sw_name'] ?></strong>? </p>

				<form name='confirm_action' method='post' action='action.php?method=remove_app_image'>
					<input type='hidden' name='delete_file' value=<?=$sw_info['sw_logo'];?>>
					<input type='hidden' name='software_id' value=<?=$software_id;?>>
					<input type='hidden' name='folder_path' value='sw_logo'>
					<input type='hidden' name='type' value=<?=$sw_info['type_name']; ?>>
					<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
					<br>
					<center>
						<button class='btn btn-default' type='submit'>Okay</button>
						<input class='btn btn-default' type='button' value='Cancel' data-dismiss='modal'>
					</center>
				</form>
			</div>
		</div>
	</div>
</div>





	
