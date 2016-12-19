
	<div id='revokeAll' class="modal fade vert-align" role="dialog">
	  <div class='modal-dialog modal-md'>
			<div class='detail-software-backdrop drop-shadow-big border-green'>
				<div class='modal-bar bg-green'>
	        Return this License Key
	        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i id='exit-icon' class="fa fa-times-circle"></i></a></div>
      	</div>
     	 	<div class='modal-container'>
					<center>
						<p>Are you sure you want to return all licenses for <?= $given_name.' '.$surname; ?>?</p>
						<form name='confirm_action' method='post' action="action.php?method=revoke_all">
							<input type='hidden' name='sam_account_name' value=<?=$sam_account_name ?>>
							<input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
							<input type='submit' class='btn btn-default' value='Okay'>
							<input type='button' value='Cancel' class='btn btn-default' data-dismiss='modal'/>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>

