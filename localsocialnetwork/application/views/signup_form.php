<!DOCTYPE html> 
<html>
<head>
<title>Whoistlers</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://www.whoistlers.com/css/style.css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
<link rel="icon" href="http://www.whoistlers.com/images/favicon.gif" type="image/gif">
<link href='http://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>
<body>
<div id="signup">
<h1>Register and start whistling!</h1>
<ul>
<?php echo form_open('/site/create_member');?>
<li>User name: <?php echo form_input('username', set_value('username')); ?></li>
<li>Password: <?php echo form_password('password',set_value('password'));?></li>
<li>Repeat password: <?php echo form_password('password2',set_value('password2'));?></li>
<li>Email address: <?php echo form_input('email_address', set_value('email_address'));?></li>
<li>You live in: <?php echo form_input('city', set_value('city'));?></li>
<li>Your intersts: 
<select name="interests">
			<option value="Drinking Eating and Cooking"selected>Drinking Eating&Cooking</option>
			<option value="Audio-Video Making and Editing">Audio-Video Making&Editing</option>
			<option value="Performing and Playing">Performing & Playing</option>
			<option value="Art and Craftship">Art&Craftship</option>
			<option value="House and Event Management">House&Event Management</option>
			<option value="Transportation and Traveling">Transportation & Traveling</option>
			<option value="Training and Healthcare">Training & Healthcare</option>
			<option value="Citylife Surviving">Citylife Surviving</option>
			</select>
</li>

<?php echo form_submit('submit','Create account');
?>

</ul>

<?php echo validation_errors('<p class="error">');?>
</div>
</body>
</html>