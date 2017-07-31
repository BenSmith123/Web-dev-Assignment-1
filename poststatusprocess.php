<!DOCTYPE html>
<html>	


<head>
	<title>Status Posting System</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body> 
<div class="container">
	<div class="nav_bar">
	<a href="index.php">Return to the Homepage</a>
	<a href="poststatusform.php">Post a new status</a>
	</div>

	<div class="bodyText">
<?php

/******** this function checks the variable for NOTNULL or empty and also checks the var agaist its pattern
var - the variable to check
pattern - the pattern to check if the var is correctly
name - the name of the var (return where the error went wrong)
********/
function check_form($var, $pattern, $name){

	if ((isset($var)) && ($var != "")){ // check if variable is not NULL and not empty

		if (preg_match($pattern, $var)){ // check if variable matches the pattern param
			// echo $var; // debug
		} else {$GLOBALS['error_text'] .= "$name - invalid input <br>";}

	} else {$GLOBALS['error_text'] .= "$name - not filled out <br>";}
}


// initialize all variables from poststatusform
$status_code = $_POST['status_code'];
$status = $_POST['status'];
$date = $_POST['date'];
$share_to = $_POST['share_to'];
$permissions[] = $_POST['permissions'];

$error_text = ""; // GLOBAL: used to output what was not filled out correctly


// CHECK EACH INPUT
// call function to check each input
check_form($status_code, '/^S[0-9]{4}$/', "Status code");
check_form($status, '/^[A-Za-z0-9 ,.!?]*$/', "Status");
check_form($date, '/^\d{1,2}\/\d{1,2}\/\d{2}$/', "Date");

// check if the date is a real date (get a substring of each two date digits)
$day = substr($date,0,2);
$month = substr($date,3,2);
$year = substr($date,6,2);

$valid_date = checkdate($month,$day,$year); // has to be that format cause of params

// if date is not a valid date
if (!$valid_date) {
	$error_text .= "This date is not a real date <br>";
}

// check if the shareto field is filled out
if ($share_to == ""){
	$error_text .= "No share button was set<br>";
}

/* DEBUG (iterate through permissions array)
if(!empty($_POST['permissions'])){
  if (is_array($_POST['permissions'])) {
    foreach($_POST['permissions'] as $value){
      echo $value;
    }
  } else {
    $value = $_POST['permissions'];
    echo $permissions;
  }
}
*//////////////////////////////////////////


// check if any permissions are ticked
if (empty($permissions)){
	$error_text .= "No permissions were set<br>";
} else {
	// loop through the permissions array and add each permission to one string
	foreach($_POST['permissions'] as $value){
		$permissions_string .= " $value";
    }
}

// END CODE HERE IF THERE WAS AN ERROR WITH INPUT
// if there was an error with input, exit and print out what went wrong
if (!$error_text == ""){
	exit("\n Error: " . $GLOBALS['error_text']);
} 
else 
{
	// if there is no errors with input, connect and post info to the database	
	
	$host = "cmslamp14.aut.ac.nz";
	$user = "jmr3283";
	$password = "Hello343";
	$database = "jmr3283";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die('<p>Failed to connect to server</p>');
	
	// if database cannot connect
	if (!$connect) {
		echo "<p>Database connection failure</p>"; // error message
	} else {
		// DATABASE IS CONNECTED!
	
		// check if the table exists
		$table_exists = mysqli_query($connect,"SELECT * FROM status;");
		if (!$table_exists) {
			// create the database table if one doesn't exist
			$query = "CREATE TABLE status (status_code VARCHAR(5) PRIMARY KEY, status VARCHAR(255), share VARCHAR(7), date_posted VARCHAR(8), permissions VARCHAR(255));"; // need permission type!!!
		}
		
		// check if the status code is unique!
		$query = "SELECT status_code FROM status;";		
		$results = mysqli_query($connect,$query);

		$sc_error = false; // initialize status code error variable
		
		// loop through each status_code and compare to current status
		while ($col = mysqli_fetch_array($results)){
			if ($col["status_code"] == $status_code){ // check if this status code is unique
				$sc_error = true;
				break;
			} else {
				$sc_error = false;
			}
		}
		
		// if there is already a status_code with those digits,
		if ($sc_error == true){
			echo "\n Error: This status code already exists.";
		} else {
			// ADD INFO INTO THE DATABASE
			$add_to_db = "INSERT INTO status(status_code,status,share,date_posted,permissions) VALUES ('$status_code','$status','$share_to','$date','$permissions_string');";
			$result = mysqli_query($connect,$add_to_db);
			if ($result == true){
				echo "\nYou're status has been successfully posted!";
			} else {
				echo "An error has occurred, cannot add status to database.";
			}
			
		}

	// close the result and database connection		
	mysqli_free_result($results);
	
	mysqli_close($connect);
	}
	
}

?>
</div>
</body></div>



</html>
