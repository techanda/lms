<div id="submitError" class="modal fade vert-align" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class='detail-software-backdrop drop-shadow-big border-pink'>
    	<div class='modal-bar bg-pink'>
        LMS has Encountered an Error
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
	      <center>
		      <p class='text-pink' id='error-message'><?= $_GET['submit_error'] ?></p>
		      <input type='button' class='btn btn-default' value='Close' data-dismiss='modal' />
	      </center>
	    </div>
    </div>
  </div>
</div>