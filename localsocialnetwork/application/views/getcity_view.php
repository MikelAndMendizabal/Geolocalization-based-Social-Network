
<body id="map">
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script type="text/javascript">
$.get("http://ipinfo.io", function(response) {
    document.getElementById('city').value = response.city;
	}, "jsonp"); 
</script>

<script type="text/javascript">
$.get("http://ipinfo.io", function(response) {
    document.getElementById('city2').value = response.city;
	}, "jsonp"); 
</script>


<div id="geolocation">
<h2>Whistle box</h2>
<?php echo form_open('http://www.whoistlers.com/index.php?/whistle_box');?>
<div id="map_block">	 	
	
</div>
  
<div id="whistle_block"> 

<div id="tabs">
<ul>
<li><a href="#whistle">Whistle</a></li>
<li><a href="#location">Location</a></li>
<li><a href="#date">Expiry date</a></li>
</ul>

<div id="whistle">
	<h3>Your Whistle</h3>
			I am whistling for:<select name="macrocategory">
			<option value="Brain" selected>Consulting</option>
			<option value="Hands">Manual help</option>
			<option value="Lamp">Help through objects</option>
			</select></select><br>	 
		 Category:<select name="category">
			<option value="Eating" selected>Eating</option>
			<option value="Drinking">Drinking</option>
			<option value="Music">Music & Sound</option>
			<option value="Video">Video & Theater</option>
			<option value="Books">Books & literature</option>
			<option value="Story">Story & Artistic creativity</option>
			<option value="Nightlife">Nightlife & Shows</option>
			<option value="Crafts">Crafts & Handwork</option>
			<option value="House">House Management</option>
			<option value="Transport">Transport</option>
			<option value="Sport">Sport & Travel</option>
			<option value="Technicalities">Technicalities</option>
			<option value="Burocracy">Public offices & Burocracy</option>
			<option value="Health">Care & Health</option>
			<option value="Weird">Weird & Others</option>						
			</select><br>
			Header: <input type="text" title="whistle" name="whistle" id="whistle" value="" maxlength="20"/><br>
			Description:<br><?php $data=array('name'=>'whistle_long','cols'=>15,'rows'=>2)?>
	        <?php echo form_textarea($data);?><br> 
		
</div>
		<div id="location">	
       <h3>Your Location</h3>		
		
		 You live in: <input type="text" title="location2" name="city2" id="city2" value="" /><br>
		 Your street is: <input type="text" name="street" value=""/><br>
         Choose your area of whistle: <br>	
		 <input type="radio" name="distance" value="200" checked>same place or close (200m)<br>
		 <input type="radio" name="distance" value="1000">walking distance (1Km)<br>
		 <input type="radio" name="distance" value="5000">running distance (5Km)<br>
		 <input type="radio" name="distance" value="10000"> biking distance (10Km)<br>
		 <input type="hidden" title="location" name="city" id="city" value="" />		 
	<br>
	</div>
		<div id="date">
		<h3>Your Expiry date</h3>
		Expiry date: <input type=“text” id="datepicker" /><br>
		</div>
<input type="submit" value='Whistle it!' >
</div>
</form>
</div>
</body>