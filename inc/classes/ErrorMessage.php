<?php
class ErrorMessage
{
    public static $userNameCharacters = "Your username must be between 5 and 15 characters";
    public static $userNameExist = "The user name you used is not available";
    public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
    public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";
    public static $emailsDoNotMatch = "Your emails dont't match.";
    public static $invalidEmail = "Your email is invalid.";
    public static $emailExist = "This email has already been used.";
    public static $passwordsDoNotMatch = "Your passwords dont't match.";
    public static $passwordCharacters = "Your password may only contain numbers and letters.";
    public static $passwordMinCharacters = "Your password must be at least 5 characters";

    public static $loginFailed = "Your username or password was incorrect.";
}