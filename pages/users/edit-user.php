<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
    require_once("UsersController.php");

	// Initialize the UsersController
	$usersController = new UsersController();

	// Fetch id data from the database
	$usersData = $usersController->getUserById($_GET["id"]);
?>
    <div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="edit-employee" class="dashboard__section">
				<h2 class="dashboard__title">Modifier un utilisateur</h2>
				<form class="form" id="edit-user-form" method="POST" action="user-process.php?id=<?= $_GET['id']; ?>">
					
					<div class="form__field">
						<label for="user-role" class="form__label">Roles</label>
						<select id="user-role" name="user-role" class="form__input">
							<option <?php echo $role = ($usersData['role'] === "administrateur") ? 'selected': ''; ?> value="administrateur">administrateur</option>
							<option <?php echo $role = ($usersData['role'] === "agent") ? 'selected': ''; ?> value="agent">agent</option>
						</select>
					</div>

					<button type="submit" name="edit-user" class="form__button form__button--primary">
						Mettre à jour
					</button>
				</form>
			</section>
		</div>
	</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>