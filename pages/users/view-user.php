<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
	require_once("UsersController.php");

	// Initialize the UsersController
	$usersController = new UsersController();

	// Fetch all data from the database
	$usersData = $usersController->getAllUsers();

	// Delete users
	if (isset($_GET["id"], $_GET["action"]) && $_GET["action"] === "delete") {
		$usersDel = $usersController->deleteUser($_GET["id"]);
	}
?>

<div class="dashboard__container">
	<div class="dashboard__container-elements">
		<section id="view-naira" class="dashboard__section">
			<h2 class="dashboard__title">Listes des utilisateurs</h2>
			<div class="filters">
				<label for="date-filter" class="filters__label"
					>Filtrer par rôle :</label
				>
				<select id="statut-naira" name="statut-naira" class="filters__input">
					<option selected disabled> Sélectionner le rôle</option>
					<option value="Entrant"> administrateur</option>
					<option value="Sortant">agent</option>
				</select>
			</div>

			<table class="table">
				<thead class="table__head">
					<tr class="table__row">
						<th class="table__cell">N°</th>
						<th class="table__cell">Nom</th>
						<th class="table__cell">Email</th>
						<th class="table__cell">Rôle</th>
						<th class="table__cell">Date</th>
						<th class="table__cell">Actions</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<?php foreach ($usersData as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['name']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['email']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['role']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['user_signup_date']) ?></td>
							<td class="table__cell">
								<!-- Example actions: Edit/Delete -->
								<a href="edit-user.php?id=<?= $row['id'] ?>" class="btn-success btn-action">Modifier</a> |
								<a href="#" id="delete-user" onclick="delUser(<?= $row['id'] ?>);" class="btn-danger btn-action">Supprimer</a> |
								<a href="#" id="history-user" class="btn-warning btn-action">Historique</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</section>
	</div>
</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>
