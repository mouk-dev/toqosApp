<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
	require_once("DeviseController.php");

	// Initialize the DeviseController
	$deviseController = new DeviseController();

	// Fetch all data from the database
	$deviseData = $deviseController->getAllAmounts();

	// Calculate totals by type and statut
	$totalEntrants = $deviseController->getTotalByStatut('Entrant');
	$totalSortants = $deviseController->getTotalByStatut('Sortant');
	$typeTotalsEntrants = $deviseController->getTotalsByTypeAndStatut('Entrant');
	$typeTotalsSortants = $deviseController->getTotalsByTypeAndStatut('Sortant');
	$totalGeneralEntrant = $deviseController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $deviseController->getGeneralTotal('Sortant');
	$total = $totalGeneralEntrant + $totalGeneralSortant;

	// Delete devise
	if (isset($_GET["id"], $_GET["action"]) && $_GET["action"] === "delete") {
		$deviseDel = $deviseController->deleteAmount($_GET["id"]);
	}
?>

<div class="dashboard__container">
	<div class="dashboard__container-elements">
		<section id="view-devise" class="dashboard__section">
			<h2 class="dashboard__title">Point détaillé de la devise</h2>
			<div class="filters">
				<label for="date-filter" class="filters__label"
					>Filtrer par statut :</label
				>
				<select id="statut-devise" name="statut-devise" class="filters__input">
					<option selected disabled> Sélectionner le statut</option>
					<option value="Entrant"> Entrant</option>
					<option value="Sortant">Sortant</option>
				</select>
			</div>

			<div class="filters">
				<label for="date-filter" class="filters__label">Filtrer par type :</label>
				<select id="type-devise" name="type-devise" class="filters__input">
					<option selected disabled> Sélectionner le type de devise</option>
					<option value="Euro">Euro</option>
					<option value="Dollars Canadien">Dollars Canadien</option>
					<option value="Dollars USD">Dollars USD</option>
					<option value="Cedi">Cedi</option>
					<option value="Naïra">Naïra</option>
					<option value="Fancs CFA Afrique Centrale">Fancs CFA Afrique Centrale</option>
					<option value="Francs suisse">Francs suisse</option>
					<option value="Live sterling">Live sterling</option>
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
						<th class="table__cell">Type de devise</th>
						<th class="table__cell">Montant</th>
						<th class="table__cell">Statut</th>
						<th class="table__cell">Date</th>
						<th class="table__cell">Actions</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<?php foreach ($deviseData as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['type']) ?></td>
							<td class="table__cell"><?= number_format($row['amount'], 2, ',', ' ') ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['statut']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['date']) ?></td>
							<td class="table__cell">
								<!-- Example actions: Edit/Delete -->
								<a href="edit-devise.php?id=<?= $row['id'] ?>" class="btn-success btn-action">Modifier</a> |
								<a href="#" id="delete-devise" onclick="delDevise(<?= $row['id'] ?>);" class="btn-danger btn-action">Supprimer</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<hr />

			<h2 class="dashboard__title">Total entrant par type de devise</h2>
			<table class="table">
				<thead class="table__head">
					<tr class="table__row">
						<th class="table__cell">N°</th>
						<th class="table__cell">Type de devise</th>
						<th class="table__cell">Total entrant</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<?php foreach ($typeTotalsEntrants as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['type']) ?></td>
							<td class="table__cell"><?= number_format($row['total'], 2, ',', ' ') ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<hr />

			<h2 class="dashboard__title">Total sortant par type de devise</h2>
			<table class="table">
				<thead class="table__head">
					<tr class="table__row">
						<th class="table__cell">N°</th>
						<th class="table__cell">Type de devise</th>
						<th class="table__cell">Total sortant</th>
					</tr>
				</thead>
				<tbody id="attendance-table" class="table__body">
					<?php foreach ($typeTotalsSortants as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['type']) ?></td>
							<td class="table__cell"><?= number_format($row['total'], 2, ',', ' ') ?></td>
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
