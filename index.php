<?php 
	require('inc/config.php');

	if ( isset( $_SESSION['userLoggedIn'] ) ) {
		$username = $_SESSION['userLoggedIn'];
	} else {
		header("Location: register.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
</head>
<body>
	
<h1>Hello Index</h1>

</body>
</html>
