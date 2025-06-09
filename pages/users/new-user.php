<?php
	require_once("header.php");
	require_once("testLogin.php");
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Ajouter un nouveau utilisateur</h2>
				<form class="form" id="add-user-form" method="POST" action="user-process.php">
					<div class="form__field">
						<label for="user-fullname" class="form__label">Nom</label>
						<input type="text" name="user-fullname" id="user-fullname" class="form__input" placeholder="Entrez le nom complet de l'utilisateur" required="">
					</div>

					<div class="form__field">
						<label for="user-email" class="form__label">Email</label>
						<input type="email" name="user-email" id="user-email" class="form__input" placeholder="Entrez l'adresse email de l'utilisateur" required="">
					</div>

					<div class="form__field">
						<label for="user-password" class="form__label">Mot de passe </label>
						<input type="password" name="user-password" id="user-password" class="form__input" placeholder="Entrez le mot de passe de l'utilisateur" required="">
					</div>

					<div class="form__field">
						<label for="user-confirm-password" class="form__label">Mot de passe </label>
						<input type="password" name="user-confirm-password" id="user-confirm-password" class="form__input" placeholder="Confirmez le mot de passe de l'utilisateur" required="">
					</div>

					<div class="form__field">
						<label for="user-role" class="form__label">Roles</label>
						<select id="user-role" name="user-role" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le rôle de l'utilisateur
							</option>
							<option value="administrateur">administrateur</option>
							<option value="agent">agent</option>
						</select>
					</div>

					<button type="submit" name="add-user" class="form__button form__button--primary">
						Ajouter
					</button>
				</form>
			</section>
		</div>
	</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>