<?php 
include_once('inc/classes/Account.php');
include_once('inc/classes/Constants.php');
$account = new Account();

include_once('inc/handlers/register-handler.php');
include_once('inc/handlers/login-handler.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Spotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div id="inputContainer">
				<!-- Login Form -->
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<div class="form-group">
						<label for="loginUsername" class="sr-only">User Name</label>
						<input type="text" class="form-control" name="loginUsername" id="loginUsername" placeholder="e.g. munirmahmud" required>
					</div>
					<div class="form-group">
						<label for="loginPassword" class="sr-only">Password</label>
						<input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
					</div>
					<button type="submit" name="loginButton" class="btn btn-primary">Log In</button>
				</form>

				<!-- Registration form -->
				<form id="loginForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<div class="form-group">
						<label for="username" class="sr-only">User Name</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="e.g. munirmahmud">
						<?php echo $account->getError(Constants::$userNameCharacters); ?>
					</div>
					<div class="form-group">
						<label for="firstName" class="sr-only">First Name</label>
						<input type="text" class="form-control" name="firstName" id="firstName" placeholder="e.g. Munir">
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
					</div>
					<div class="form-group">
						<label for="lastName" class="sr-only">Last Name</label>
						<input type="text" class="form-control" name="lastName" id="lastName" placeholder="e.g. Mahmud">
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
					</div>
					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="e.g. munir@gmail.com">
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$invalidEmail); ?>
					</div>
					<div class="form-group">
						<label for="email2" class="sr-only">Confirm Email</label>
						<input type="email" class="form-control" name="email2" id="email2" placeholder="e.g. munir@gmail.com">
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<?php echo $account->getError(Constants::$passwordMinCharacters); ?>
					</div>
					<div class="form-group">
						<label for="password2" class="sr-only">Password</label>
						<input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
					</div>
					<button type="submit" name="registerButton" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
		</div>

		<div class="col-md-6">
			
		</div>
	</div>
</div>	

	<script type="text/javascript" src="assets/js/scripts.js"></script>
</body>
</html>