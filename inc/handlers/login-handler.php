<?php
	if (isset($_POST['loginButton'])) {
		$username = $_POST['loginUsername'];
		$password = $_POST['loginPassword'];

		$success = $account->userLogin($username, $password);

		if ($success) {
			$_SESSION['userLoggedIn'] = $username;
			header("Location: index.php");
		} else {
			echo 'Something error';
		}
	}