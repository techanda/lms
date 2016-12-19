
<?php 
$pre_message = 
"
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<link href='https://fonts.googleapis.com/css?family=Source+Code+Pro:400,700,300' rel='stylesheet' type='text/css'>
<style type='text/css'>
*{margin:0;padding: 0;font-family: Source Code Pro, Helvetica, Arial, sans-serif !important;}
html{min-width: 320px;}
p{padding:15px 0;}
h1{padding:30px 0;}
a{color:#66d9ef;text-decoration: none;}
a:hover{font-weight: 700;}
</style>
<div style='padding:5px 15px;background:#101010;color:white;width:100%'>
	<span style='font-size:2em;font-weight:700;font-family: Consolas, Helvetica, Arial, sans-serif;margin-right:0;padding-right:0;margin-left:.5em;'>
		LMS<span style='font-weight:400;font-size:.5em;color:#a6e22e;'> an IAC Publishing Labs Application</span>
	</span>
</div>
<table style='width:80%;margin:15px auto;min-width:320px;'>
<tr>
	<td style='padding:30px 0;margin-bottom:15px;font-family: Consolas, Helvetica, Arial, sans-serif;'>
		<h1>You Have Received Feedback</h1>
		<p>Hello ".$admin_team.",</p>
		<p>
			You have received feedback from <strong><a href='mailto:".$user_mail."'>".$user_name."</a><strong> about the LMS application.  You can see their message below.
		</p>
	</td>
</tr>
<tr>
	<td style='border:2px solid #444;background:#eee;padding:15px;font-family: Consolas, Helvetica, Arial, sans-serif;'>
		<strong>Message:</strong><br>
		<br>
		".$user_message."
	</td>
</tr>
<tr>
	<td style='font-family: Consolas, Helvetica, Arial, sans-serif;'>
		<br>
		<br>
		<p>
			To reply to the user's feedback, simply click <strong>Reply</strong> or <strong>Reply All</strong> in your
			email client.
		</p>
		<br>
		<br>
		<br>
		<br>
		<h2>-From your LMS system</h2>
		<br>
		<br>
		<p>
			<em style='color:#666;font-size:.75em;'>
				If you think you received this message in error, please send a message to <a href='mailto:".$admin_email."'>".$admin_email."</a> and 
				the ".$admin_team." team can assist you.  You can also simply <strong>Reply</strong> via your mail client.
			</em>
		</p>
	</td>
</tr>
</table>
</div>
"; 