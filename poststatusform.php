<!DOCTYPE html>
<html>	

<head>
	<title>Post new Status</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<div class="container">
	<div class="header">
    <h1>Post New Status</h1></div>
	<form action = "poststatusprocess.php" method = "POST" > 
	
	<div class="nav_bar">
	<a href="index.php">Return to the Homepage</a></div>
	<table>
	<p>
		<label>Status Code (required):  </label>
		<input type="string" name ="status_code" placeholder="(e.g. S1234)" autocomplete="off"> </br>
	</p>
	<p>
		<label>Status (required):  </label>
		<input type="string" name ="status" autocomplete="off"> </br>
	</p>
	<p>
		<label>Share: </label>
		<input type="radio" name ="share_to" value ="public"> Public
		<input type="radio" name ="share_to" value ="friends"> Friends
		<input type="radio" name ="share_to" value ="me"> Only Me
		</br>
	</p>
	<p>
		<label>Date: </label>
		<input type="string" name ="date" value =<?php echo date("d/m/y")?>> </br>
	</p>
	<p>
		<label>Permission Type: </label>
		<input type="checkbox" name="permissions[]" value="like "> Allow Like
		<input type="checkbox" name="permissions[]" value="comment "> Allow Comment
		<input type="checkbox" name="permissions[]" value="share "> Allow Share
		</br>
	</p>
	
	</table>
	
	<input type="submit" name="submit" value="Post" />

	</form>
	
</body></div>

</html>