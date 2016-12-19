<?php

//adds technician message section if a message is left
if(isset($tech_message)  && $tech_message != ''){
	$technician_message = 
	"<tr>
		<td style='border:2px solid #444;background:#eee;padding:15px;font-family: Consolas, Helvetica, Arial, sans-serif;'>
			<strong>Message from Technician (".$technician."):</strong><br>
			<br>
			".$tech_message."
		</td>
	</tr>";
} else {
	$technician_message = '';
}

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
		<h1>An Application Has Been Removed From Your Account</h1>
		<p>Hello ".$first_name.",</p>
		<p>
			Your license key for <strong>".$application."</strong> has been removed from your account by ".$admin_team.".
			If you haven't already done so, please remove the application from your system to ensure license compliance.
		</p>
	</td>
</tr>
".
$technician_message
."
<tr>
	<td style='font-family: Consolas, Helvetica, Arial, sans-serif;'>
		<br>
		<br>
		<br>
		<br>
		<h2>-From your local ".$admin_team." team</h2>
		<br>
		<br>
		<p>
			<em style='color:#666;font-size:.75em;'>
				If you think this was done in error, please send a message to <a href='mailto:".$admin_email."'>".$admin_email."</a> and 
				the ".$admin_team." team can assist you.  You can also simply <strong>Reply</strong> via your mail client.
			</em>
		</p>
	</td>
</tr>
</table>
</div>
"; 