
<body id="front">

      
<div id="main">

		<?php echo $message; ?>

<div id="logo_header">
        <img src="http://localhost/whoistlerslocal/images/logo_whistlers.png" id="logo" alt="logo">
		<h1 id="name">hoistlers.com</h1>
</div> 
<script>
	$.get("http://ipinfo.io", function(response) {
    document.getElementById('city').value = response.city;
	}, "jsonp"); 
</script>

<?php echo form_open('http://localhost/whoistlerslocal/index.php?/site/validate_credentials');?>
  
  <p>
		<label for="email">Be ready to whistle, we are working to hear you soon!<br></label>
  </p>	
		
		<div id="input_block">
		<?php
			echo form_open('site/validate_credentials');
			echo ' Username: '.form_input('username');
			echo ' Password: '.form_password('password'); ?>
		    &nbsp
			<?php echo form_submit('submit','Go');?>
		&nbsp  &nbsp
		<?php //echo anchor('site/signup','Join!');?>
		</div>
		<div id="register">
		
		</div>
  
</div>
<div id="errors">  
  <?php echo validation_errors(); ?>		
  <?php echo form_close();?>
  
</div>
</body>


