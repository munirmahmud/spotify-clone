<?php
include_once('inc/config.php');
include_once('inc/classes/Account.php');
include_once('inc/classes/ErrorMessage.php');
$account = new Account($conn);

include_once('inc/handlers/register-handler.php');
include_once('inc/handlers/login-handler.php');


function getInputValue($name) {
	if (isset($_POST[$name])) {
		echo $_POST[$name];
	}
}