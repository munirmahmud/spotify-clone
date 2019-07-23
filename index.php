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
	<title>Welcome to Slotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	
	<div class="main-container">

		<div class="top-tontainer">
			<div class="nav-bar-container">
				<nav class="nav-bar">

					<a href="index.php" class="logo">
						<img src="assets/images/icons/logo.png">
					</a>


					<div class="group">

						<div class="nav-item">
							<a href="search.php" class="nav-item-link">Search
								<img src="assets/images/icons/search.png" class="icon" alt="Search">
							</a>
						</div>

					</div>

					<div class="group">
						<div class="nav-item">
							<a href="browse.php" class="nav-item-link">Browse</a>
						</div>

						<div class="nav-item">
							<a href="yourMusic.php" class="nav-item-link">Your Music</a>
						</div>

						<div class="nav-item">
							<a href="profile.php" class="nav-item-link">Reece Kenney</a>
						</div>
					</div>




				</nav>
			</div>
			<!-- End .nav-bar-container -->
		</div>
		<!-- End .top-tontainer -->

		<div class="playing-bar-container">

			<div class="playing-bar">

				<div class="playing-bar-left">
					<div class="content">
						<span class="albumLink">
							<img src="https://i.ytimg.com/vi/rb8Y38eilRM/maxresdefault.jpg" class="albumArtwork">
						</span>

						<div class="trackInfo">

							<span class="trackName">
								<span>Happy Birthday</span>
							</span>

							<span class="artistName">
								<span>Reece Kenney</span>
							</span>

						</div>

					</div>
				</div>

				<div id="playing-bar-center">

					<div class="content playerControls">

						<div class="buttons">

							<button class="controlButton shuffle" title="Shuffle button">
								<img src="assets/images/icons/shuffle.png" alt="Shuffle">
							</button>

							<button class="controlButton previous" title="Previous button">
								<img src="assets/images/icons/previous.png" alt="Previous">
							</button>

							<button class="controlButton play" title="Play button">
								<img src="assets/images/icons/play.png" alt="Play">
							</button>

							<button class="controlButton pause" title="Pause button" style="display: none;">
								<img src="assets/images/icons/pause.png" alt="Pause">
							</button>

							<button class="controlButton next" title="Next button">
								<img src="assets/images/icons/next.png" alt="Next">
							</button>

							<button class="controlButton repeat" title="Repeat button">
								<img src="assets/images/icons/repeat.png" alt="Repeat">
							</button>

						</div>


						<div class="playbackBar">

							<span class="progressTime current">0.00</span>

							<div class="progressBar">
								<div class="progressBarBg">
									<div class="progress"></div>
								</div>
							</div>

							<span class="progressTime remaining">0.00</span>


						</div>


					</div>


				</div>

				<div class="playing-bar-right">
					<div class="volumeBar">

						<button class="controlButton volume" title="Volume button">
							<img src="assets/images/icons/volume.png" alt="Volume">
						</button>

						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>
		<!-- End .playing-bar-container -->

	</div>
	<!-- End .main-container -->

</body>
</html>
