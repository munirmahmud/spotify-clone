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

    public function getError($error)
    {
    	if (!in_array($error, $this->errorArray)) {
    		$error = '';
    	} else {
    		return "<span class='alert alert-danger'>{$error}</span>";
    	}
    }

	// Form validation
	private function validateUsername($un) {
		if (strlen($un) > 25 || strlen($un) < 3) {
			array_push($this->errorArray, Constants::$userNameCharacters);
			return;
		}
		// TODO: check if the username already exists
	}
	private function validateFirstName($fn) {
		if (strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, Constants::$firstNameCharacters);
			return;
		}
	}
	private function validateLastName($ln) {
		if (strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, Constants::$lastNameCharacters);
			return;
		}
	}
	private function validateEmail($em, $em2) {
		if ($em != $em2) {
			array_push($this->errorArray, Constants::$emailsDoNotMatch);
			return;
		}
		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$invalidEmail);
			return;
		}
		//TODO: check if the email is already exists
	}
	private function validatePassword($pw, $pw2) {
		if ($pw != $pw2) {
			array_push($this->errorArray, Constants::$passwordsDoNotMatch);
			return;
		}
		if (preg_match('/[^a-zA-Z0-9]/', $pw)) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return;
		}
		if (strlen($pw) > 80 || strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordMinCharacters);
			return;
		}
	}
}