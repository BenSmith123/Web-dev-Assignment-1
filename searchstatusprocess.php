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
	<div class="containerText">
	
	<?PHP
	$user_search = $_GET['user_search'];

	// check if variable is not NULL and not empty
	if ((isset($user_search)) && ($user_search != "")){ 
		
		// CONNECT TO DATABASE
		$host = "cmslamp14.aut.ac.nz";
		$user = "jmr3283";
		$password = "Hello343";
		$database = "jmr3283";
		
		$connect = mysqli_connect($host,$user,$password,$database) or die('<p>Failed to connect to server</p>');
		
		if ($connect) {
			// DATABASE CONNECTED!
			$table_exists = mysqli_query($connect,"SELECT * FROM status;"); // check if database exists
			if (!$table_exists) {
				echo "\nError: There is no records of any status";
			} else {
				
				// TABLE EXISTS
				$query = "SELECT * FROM status WHERE status LIKE '%$user_search%'"; // query the database with our search
				$results = mysqli_query($connect,$query);

				$status_matched = 0;
				
				if (!$results) {
					echo "No status could be found that matches $user_search"; // show error no matches found
				} else {
					while($row = mysqli_fetch_array($results)) {
						$status_matched += 1;
						echo "Status code: " . $row["status_code"];
						echo "<br>Status: " . $row["status"];
						echo "<br>Shared to: " . $row["share"];
						echo "<br>Date: " . $row["date_posted"];
						echo "<br>Permissions: " . $row["permissions"];
						echo "<br> ---------------- <br>";
					}
					
				echo "Matches found: $status_matched";
				
				}

			}
			
		} else {
			echo "<p>Database connection failure</p>"; // error message
		}
		
	} else {
		echo "\nError: You did not enter any information to search for";
	}
	?>
	</div>
</body></div>

</html>