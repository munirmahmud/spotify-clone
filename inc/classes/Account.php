<?php
/*
*This Account class is responsible to the form validation
*/
class Account
{
	private $errorArray = [];

    public function __construct() 
    {
    	$this->errorArray;    
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
			return 'Successfullly inserted';
		} else {
			return 'Something Error happend';
		}
    }

	// Form validation
	private function validateUsername($un) {
		if (strlen($un) > 25 || strlen($un) < 3) {
			array_push($this->errorArray, "Your username must be between 5 and 25 characters");
			return;
		}
		// TODO: check if the username already exists
	}
	private function validateFirstName($fn) {
		if (strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
			return;
		}
	}
	private function validateLastName($ln) {
		if (strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
			return;
		}
	}
	private function validateEmail($em, $em2) {
		if ($em != $em2) {
			array_push($this->errorArray, "Your emails dont't match.");
			return;
		}
		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, "Your email is invalid.");
			return;
		}
		//TODO: check if the email is already exists
	}
	private function validatePassword($pw, $pw2) {
		if ($pw != $pw2) {
			array_push($this->errorArray, "Your passwords dont't match.");
			return;
		}
		if (preg_match('/[^a-zA-Z0-9]/', $pw)) {
			array_push($this->errorArray, "Your password may only contain numbers and letters.");
			return;
		}
		if (strlen($pw) > 80 || strlen($pw) < 5) {
			array_push($this->errorArray, "Your password must be at least 5 characters");
			return;
		}
	}
}