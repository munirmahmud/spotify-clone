<?php 
	function sanitizeFormUsername($inputText) {
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}

	function sanitizeFormString($inputText) {
		$inputText = trim($inputText);
		$inputText = ucfirst(strtolower($inputText));
		return $inputText;
	}

	function sanitizeFormEmail($inputText) {
		$inputText = trim($inputText);
		$inputText = strtolower($inputText);
		return $inputText;
	}

	function sanitizeFormPassword($inputText) {
		$inputText = strip_tags($inputText);
		return $inputText;
	}



	if (isset($_POST['registerButton'])) {
		$username = sanitizeFormUsername($_POST['username']);
		$firstName = sanitizeFormString($_POST['firstName']);		
		$lastName = sanitizeFormString($_POST['lastName']);
		$email = sanitizeFormEmail($_POST['email']);
		$email2 = sanitizeFormEmail($_POST['email2']);
		$password = sanitizeFormPassword($_POST['password']);
		$password2 = sanitizeFormPassword($_POST['password2']);

		$success = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
		echo $success;
	}
?>