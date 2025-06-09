<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title id="title-page">Connexion | TOQOS</title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link
			rel="stylesheet"
			href="assets/vendors/fontawesome-free-6.6.0-web/css/all.css"
		/>
		<link
			rel="shortcut icon"
			href="assets/images/toqos_log.png"
			type="image/x-icon"
		/>
	</head>
	<body>
		<!-- start main-box -->
		<div class="main-box" id="main-box">
			<div class="login-box" id="login-box">
				<!-- start login-box -->

				<div id="message-box">
					
				</div>

				<div class="logo-box">
					<!-- start logo-box -->
					<img src="assets/images/toqos_logo.png" alt="logo" class="logo" />
				</div>
				<!-- end logo-box -->

				<form action="connect-user.php" method="POST" class="form-box" id="form-login">
					<!-- start form-box -->

					<h1 class="form-title">Connexion</h1>

					<div class="form-elements">
						<!-- start form-elements -->
						<label for="user-email" class="form-label"
							>Email : <span id="label-email-login"></span
						></label>
						<input
							type="email"
							name="user-email"
							placeholder="Email"
							class="form-input"
							id="user-email-login"
						/>
						<i class="fa-solid fa-envelope" id="fa-envelope"></i>
					</div>
					<!-- end form-elements -->

					<div class="form-elements">
						<!-- start form-elements -->
						<label for="user-password" class="form-label"
							>Mot de passe :
							<span id="label-password-login"></span
						></label>
						<input
							type="password"
							name="user-password"
							placeholder="Mot de passe"
							class="form-input"
							id="user-password-login"
						/>
						<i class="fa-solid fa-eye-slash" id="fa-eye-login"></i>
					</div>
					<!-- end form-elements -->

					<div class="form-elements form-button">
						<!-- start form-elements -->
						<div class="remember">
							<!-- start remember -->
							<input
								type="checkbox"
								name="remember"
								class="remember-input"
								id="user-remember"
							/>
							<label for="remember" class="remember-label"
								>Se souvenir de moi</label
							>
						</div>
						<!-- end remember -->
						<button
							type="submit"
							name="connect"
							class="btn btn-to-login"
							id="btn-to-login"
						>
							Se connecter
						</button>
					</div>
					<!-- end form-elements -->
				</form>
				<!-- end form-box -->
			</div>
			<!-- end login-box -->
		</div>
		<!-- end main-box -->
		<script src="assets/js/main.js" type="module"></script>
	</body>
</html>
