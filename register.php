<?php 
include_once('inc/bootstrap.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Spotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>

<div class="background">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div id="inputContainer" class="inputContainer">
					<!-- Login Form -->
					<form class="login-form" action="register.php" method="POST">
						<h2>Login to your account</h2>
						<div class="form-group">
							<label for="loginUsername" class="sr-only">User Name</label>
							<input type="text" class="form-control" name="loginUsername" id="loginUsername" placeholder="e.g. munirmahmud" value="<?php getInputValue('loginUsername'); ?>" required>
							<?php echo $account->getError(ErrorMessage::$loginFailed); ?>
						</div>
						<div class="form-group">
							<label for="loginPassword" class="sr-only">Password</label>
							<input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
						</div>
						<button type="submit" name="loginButton" class="btn btn-primary">Log In</button>

						<div class="hasAccountText">
							<span id="hide-login">Don't have an account yet? Signup here.</span>
						</div>
					</form>

					<!-- Registration form -->
					<form class="register-form" action="register.php" method="POST">
						<h2>Create your free account</h2>
						<div class="form-group">
							<label for="username" class="sr-only">User Name</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="e.g. munirmahmud" value="<?php getInputValue('username'); ?>">
							<?php echo $account->getError(ErrorMessage::$userNameCharacters); ?>
							<?php echo $account->getError(ErrorMessage::$userNameExist); ?>
						</div>
						<div class="form-group">
							<label for="firstname" class="sr-only">First Name</label>
							<input type="text" class="form-control" name="firstname" id="firstname" placeholder="e.g. Munir" value="<?php getInputValue('firstname'); ?>">
							<?php echo $account->getError(ErrorMessage::$firstNameCharacters); ?>
						</div>
						<div class="form-group">
							<label for="lastname" class="sr-only">Last Name</label>
							<input type="text" class="form-control" name="lastname" id="lastname" placeholder="e.g. Mahmud" value="<?php getInputValue('lastname'); ?>">
							<?php echo $account->getError(ErrorMessage::$lastNameCharacters); ?>
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="e.g. munir@gmail.com" value="<?php getInputValue('email'); ?>">
							<?php echo $account->getError(ErrorMessage::$emailsDoNotMatch); ?>
							<?php echo $account->getError(ErrorMessage::$invalidEmail); ?>
							<?php echo $account->getError(ErrorMessage::$emailExist); ?>
						</div>
						<div class="form-group">
							<label for="email2" class="sr-only">Confirm Email</label>
							<input type="email" class="form-control" name="email2" id="email2" placeholder="e.g. munir@gmail.com" value="<?php getInputValue('email2'); ?>">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							<?php echo $account->getError(ErrorMessage::$passwordsDoNotMatch); ?>
							<?php echo $account->getError(ErrorMessage::$passwordCharacters); ?>
							<?php echo $account->getError(ErrorMessage::$passwordMinCharacters); ?>
						</div>
						<div class="form-group">
							<label for="password2" class="sr-only">Password</label>
							<input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
						</div>
						<button type="submit" name="registerButton" class="btn btn-primary">Sign Up</button>

						<div class="hasAccountText">
							<span id="hide-register">Already have an account? Login here.</span>
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-5">
				
			</div>
		</div>
	</div>	
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/scripts.js"></script>
	<?php 
		if ( isset( $_POST['registerButton'])) {
			echo "<script>
				$(document).ready(function(){
					$('.login-form').show();
					$('.register-form').hide();
				});
			</script>";
		} else {
			echo "<script>
				$(document).ready(function(){
					$('.login-form').hide();
					$('.register-form').show();
				});
			</script>";
		}
	?>
</body>
</html>