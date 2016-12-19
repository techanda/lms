<!--This is the window used for adding a new license -->
<div id="loginLog" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-gold'>
        User Login Audit
        <div class='text-right'><a class='text-grey upper-cancel' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
      	<div class='audit-info'>
          <div class='row'>
            <div class='col-xs-4'><strong>Login Time Stamp</strong></div>
            <div class='col-xs-8'><strong>User Agent</strong></div>
          </div>
	      	<?php while ($row = $login_audit->fetch_assoc()):?>
		      	<div class='row'>
		      		<div class='col-xs-4'><?= $row['login_timestamp']?></div>
		      		<div class='col-xs-8'><?= $row['login_browser']?></div>
		      	</div>
	      	<?php endwhile; ?>
      	</div>
      </div>
    </div>
  </div>
</div>