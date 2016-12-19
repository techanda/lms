<!--This is the window used for adding a new license -->
<div id="sendFeedback" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
    <div class='detail-software-backdrop drop-shadow-big border-gold'>
      <div class='modal-bar bg-blue'>
        Feedback - Let us know what you think
        <div class='text-right'><a class='text-grey upper-cancel' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>
        <form  method='post' action='action.php?method=send_mail'>
            <input type="hidden" name="mail_to" value=<?= $admin_email ?>> 
            <input type='hidden' name='url_redirect' value=<?=remove_querystring_var($_SERVER['QUERY_STRING'],'submit_error'); ?>>
            <input type='hidden' name='subject' value='LMS - Feedback'>
            <input type='hidden' name='message_type' value='feedback'> <!-- sets send_mail to work from post information -->
            <input type='hidden' name='user_mail' value=<?="'". $_SESSION['email']."'" ?>>
            <input type='hidden' name='user_name' value=<?="'". $_SESSION['given_name']." ".$_SESSION['surname']."'" ?>>

            <div class='form-group'>
                <label>Description:</label>
                <textarea class='form-control tinymce-textarea' style='height:260px;' placeholder='Place Description Here...' name='message'></textarea>
            </div>


            <input class='btn btn-default' type='submit' value='Send Feedback' name='submit'>
            <input class='btn btn-default cancel-button' type='button' value='Cancel' data-dismiss="modal" />

         </form>
       </div>
    </div>
  </div>
</div>








    


