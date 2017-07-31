<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<link rel="stylesheet" href="styles.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="container">
	<div class="header">
    <h1>About</h1></div>

	<div class="nav_bar">
	<a href="index.php">Return to the Homepage</a></div>
	<div class="containerText">
	<p><br><b>What special features have you done, or attempted, in creating the site that we should know about?</b></p>
	<p>I have added a function in my poststatusprocess.php that will validate each input with the pattern and return which variable input caused the problem.
	This way I can just call the function to check if is_empty etc for each input. This function also adds each input error to a error_message.
	I also added a the date checker function to not only check if the date pattern is correct, check if the date is valid (includes leap years etc). 
	<br></p>
	
	<p><br><b>Which parts did you have trouble with?</b></p>
	<p>I had trouble with the regex for the status input, it wasn't as straight forward as the status_code or date format and took a lot of trial and error.
	I was stuck on a database connection problem for awhile then realised I was using a depreciated function (mysql_fetch_array instead of mysqli_fetch_array).
	I also had trouble with trying to loop and output an array after getting it from a database query (I ended up creating a string from the array then storing
	it in the database as a string).
	<br></p>
		
	<p><br><b>What would you like to do better next time?</b></p>
	<p>Next time I would add animations or more visually appealing features such as interactive graphics etc.
	I would also have liked to have a better layout for my web pages.
	<br></p>
		
	<p><br><b>What references/sources you have used to help you learn how to create your website?</b></p>
	<p>I've used php.net/manual for looking up php functions, w3schools.com for the sql and css information and stackoverflow.com for any major 
	issues I had encountered during this project.
	<br></p>
	
	<p><br><b>What you have learnt along the way?</b></p>
	<p> I now have experience with live web pages and remote databases (PHP, HTML, CSS and MySql). I am more experienced with regex expressions and I 
	have learnt how to use the basic functionality in PHP. 
	<br></p>
	
	<br></div>

	

	
</body>
</div>	
	
</html>

