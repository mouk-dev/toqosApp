<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
	require_once("NairaController.php");

	// Initialize the NairaController
	$nairaController = new NairaController();

	// Fetch all data from the database
	$nairaData = $nairaController->getAllAmounts();

	// Calculate totals by type and statut
	$totalEntrants = $nairaController->getTotalByStatut('Entrant');
	$totalSortants = $nairaController->getTotalByStatut('Sortant');
	$totalGeneralEntrant = $nairaController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $nairaController->getGeneralTotal('Sortant');
	$total = $totalGeneralEntrant + $totalGeneralSortant;

	// Delete naira
	if (isset($_GET["id"], $_GET["action"]) && $_GET["action"] === "delete") {
		$nairaDel = $nairaController->deleteAmount($_GET["id"]);
	}
?>

<div class="dashboard__container">
	<div class="dashboard__container-elements">
		<section id="view-naira" class="dashboard__section">
			<h2 class="dashboard__title">Point détaillé de naïra</h2>
			<div class="filters">
				<label for="date-filter" class="filters__label"
					>Filtrer par statut :</label
				>
				<select id="statut-naira" name="statut-naira" class="filters__input">
					<option selected disabled> Sélectionner le statut</option>
					<option value="Entrant"> Entrant</option>
					<option value="Sortant">Sortant</option>
				</select>
			</div>

			<div class="filters">
				<label for="date-filter" class="filters__label"
					>Filtrer par date :</label
				>
				<input type="date" name="date" id="date" class="filters__input" />
			</div>

			<table class="table">
				<thead class="table__head">
					<tr class="table__row">
						<th class="table__cell">N°</th>
						<th class="table__cell">Montant</th>
						<th class="table__cell">Statut</th>
						<th class="table__cell">Date</th>
						<th class="table__cell">Actions</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<?php foreach ($nairaData as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= number_format($row['amount'], 2, ',', ' ') ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['statut']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['date']) ?></td>
							<td class="table__cell">
								<!-- Example actions: Edit/Delete -->
								<a href="edit-naira.php?id=<?= $row['id'] ?>" class="btn-success btn-action">Modifier</a> |
								<a href="#" id="delete-naira" onclick="delNaira(<?= $row['id'] ?>);" class="btn-danger btn-action">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<hr />

			<h2 class="dashboard__title">Totaux entrant et sortant</h2>
			<table class="table">
				<thead class="table__head">
					<tr class="table__row">
						<th class="table__cell">N°</th>
						<th class="table__cell">Entrées</th>
						<th class="table__cell">Sorties</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<tr>
						<th class="table__cell">Total</th>
						<th class="table__cell"><?= number_format($totalGeneralEntrant, 2, ',', ' ') ?></th>
						<th class="table__cell"><?= number_format($totalGeneralSortant, 2, ',', ' ') ?></th>
					</tr>
				</tbody>
			</table>

			<div class="total__box">
				<span class="total__box-amount">Total = <?= number_format($total, 2, ',', ' '); ?> </span>
			</div>

		</section>
	</div>
</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>
