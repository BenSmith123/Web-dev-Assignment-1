<!DOCTYPE html>
<html>
<head>
	<title>Search Status</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div class="container">
	<div class="header">
	<h1>Search Status</h1> </div>
	
	<div class="nav_bar">
	<a href="index.php">Return to the Homepage</a>
	<a href="poststatusform.php">Post a new status</a>
	</div>
	
	<form action = "searchstatusprocess.php" method = "GET" > 
	
	<label>Find Status</label>
	<input type="string" name ="user_search"> </br>
	
	<input type="submit" name="submit" value="Search" />
	
</body></div>

</html>