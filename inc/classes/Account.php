<?php
/*
*This Account class is responsible to the form validation
*/
class Account
{
	private $conn;
	private $errorArray;

    public function __construct($conn) 
    {
    	$this->conn = $conn;
    	$this->errorArray = [];    
    }

    public function userLogin($un, $pw)
    {
    	$sql = "SELECT username, password FROM users WHERE username = '$un'";
    	$query = mysqli_query($this->conn, $sql);
    	$user = mysqli_fetch_assoc($query);

    	if (mysqli_num_rows($query) == 1) {
    		if (password_verify($pw, $user['password']) == true) {
    			return true;
    		} else {
    			array_push($this->errorArray, ErrorMessage::$loginFailed);
    			return;
    		}
    	} else {
    		array_push($this->errorArray, ErrorMessage::$loginFailed);
    		return;
    	}
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2)
    {
		// Set variable to validate form data
		$this->validateUsername($un);
		$this->validateFirstName($fn);
		$this->validateLastName($ln);
		$this->validateEmail($em, $em2);
		$this->validatePassword($pw, $pw2);

		if (empty($this->errorArray)) {
			return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
		} else {
			return 'Something Error happend';
		}
    }

    public function getError($error)
    {
    	if (!in_array($error, $this->errorArray)) {
    		$error = '';
    	} else {
    		return "<span class='alert alert-danger'>{$error}</span>";
    	}
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw)
    {
    	$password = password_hash($pw, PASSWORD_BCRYPT);
    	$profile_pic = 'assets/images/profile-pics/user-profile-pic.png';
    	$sql = "INSERT INTO users VALUES('', '$un', '$fn', '$ln', '$em', '$password', Now(), '$profile_pic')";
    	$result = mysqli_query($this->conn, $sql);
    	return $result;
    }

	// Form validation
	private function validateUsername($un) {
		if (strlen($un) > 25 || strlen($un) < 3) {
			array_push($this->errorArray, ErrorMessage::$userNameCharacters);
			return;
		}
		//check if the username already exists
		$sql = "SELECT username FROM users WHERE username = '$un'";
		$checkUsername = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($checkUsername) != 0) {
			var_dump( array_push($this->errorArray, ErrorMessage::$userNameExist));
			return;
		}
	}
	private function validateFirstName($fn) {
		if (strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, ErrorMessage::$firstNameCharacters);
			return;
		}
	}
	private function validateLastName($ln) {
		if (strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, ErrorMessage::$lastNameCharacters);
			return;
		}
	}

	private function validateEmail($em, $em2) {
		if ($em != $em2) {
			array_push($this->errorArray, ErrorMessage::$emailsDoNotMatch);
			return;
		}
		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, ErrorMessage::$invalidEmail);
			return;
		}
		// check if the email is already exists
		$sql = "SELECT email FROM users WHERE email = '$em'";
		$checkEmail = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($checkEmail) != 0) {
			array_push($this->errorArray, ErrorMessage::$emailExist);
			return;
		}
	}

	private function validatePassword($pw, $pw2) {
		if ($pw != $pw2) {
			array_push($this->errorArray, ErrorMessage::$passwordsDoNotMatch);
			return;
		}
		if (preg_match('/[^a-zA-Z0-9]/', $pw)) {
			array_push($this->errorArray, ErrorMessage::$passwordCharacters);
			return;
		}
		if (strlen($pw) > 80 || strlen($pw) < 5) {
			array_push($this->errorArray, ErrorMessage::$passwordMinCharacters);
			return;
		}
	}
}