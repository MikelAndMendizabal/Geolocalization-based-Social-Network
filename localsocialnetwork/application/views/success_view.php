<!DOCTYPE html> 
<html>
<head>
<title>Whoistlers</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://localhost/whoistlerslocal/css/style.css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
<link rel="icon" href="http://localhost/whoistlerslocal/images/favicon.gif" type="image/gif">
<link href='http://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


</head>
<body>
  
 <div id="success">	 	
		<?php echo $message; ?>
  </div>
  
<div id="errors">  
  <?php echo validation_errors(); ?>		
  <?php echo form_close();?>
  
</div>
</body>

</html>
