<!DOCTYPE html>
<html>
<head>
	<title>Status Posting System</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>
    <div class="container">
	<div class="header">
    <h1>Status Posting System</h1> </div>
	
	<div class="nav_bar">
	<a href="poststatusform.php">Post a new status</a>

	<a href="searchstatusform.php">Search status</a>
	
	<a href="about.php">About this assignment</a></div>
	
	
	<div class="containerText">
	<?php
	// custom function to create a new line easier
	function ln(){
		echo "<br>";
	}

	// initialize all variables
	$name = "Ben Smith";
	$studentID = "13836606";
	$email = "jmr3283@autuni.ac.nz";
	$statement = "I declare that this assignment is my individual work. I have not worked
	collaboratively nor have I copied from any other students work or from any other source.";
	
	// print out variables
	ln();
	echo "Name: $name";
	ln();
	echo "Student ID: $studentID";
	ln();
	echo "Email: $email";
	ln();
	ln();
	echo "$statement";
	ln();
	ln();
?>

	</body></div>
	




</div>
	
	
</html>

