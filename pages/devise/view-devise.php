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
	// Filtrage
	$statut = $_GET['statut'] ?? null;
	$type = $_GET['type'] ?? null;
	$date = $_GET['date'] ?? null;

	$deviseData = $deviseController->getFilteredAmounts($_GET['statut'] ?? null, $_GET['type'] ?? null, $_GET['date'] ?? null);

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
			<form method="GET" class="filters" style="display: flex; gap: 1rem; align-items: center;">
				<select id="statut-devise" name="statut" class="filters__input">
					<option value="">Tous les statuts</option>
					<option value="Entrant" <?= ($_GET['statut'] ?? '') === 'Entrant' ? 'selected' : '' ?>>Entrant</option>
					<option value="Sortant" <?= ($_GET['statut'] ?? '') === 'Sortant' ? 'selected' : '' ?>>Sortant</option>
				</select>

				<select id="type-devise" name="type" class="filters__input">
					<option value="">Tous les types de devises</option>
					<option value="Euro" <?= ($_GET['type'] ?? '') === 'Euro' ? 'selected' : '' ?>>Euro</option>
					<option value="Dollars Canadien" <?= ($_GET['type'] ?? '') === 'Dollars Canadien' ? 'selected' : '' ?>>Dollars Canadien</option>
					<option value="Dollars USD" <?= ($_GET['type'] ?? '') === 'Dollars USD' ? 'selected' : '' ?>>Dollars USD</option>
					<option value="Cedi" <?= ($_GET['type'] ?? '') === 'Cedi' ? 'selected' : '' ?>>Cedi</option>
					<option value="Naïra" <?= ($_GET['type'] ?? '') === 'Naïra' ? 'selected' : '' ?>>Naïra</option>
					<option value="Fancs CFA Afrique Centrale" <?= ($_GET['type'] ?? '') === 'Fancs CFA Afrique Centrale' ? 'selected' : '' ?>>Fancs CFA Afrique Centrale</option>
					<option value="Francs suisse" <?= ($_GET['type'] ?? '') === 'Francs suisse' ? 'selected' : '' ?>>Francs suisse</option>
					<option value="Live sterling" <?= ($_GET['type'] ?? '') === 'Live sterling' ? 'selected' : '' ?>>Live sterling</option>
				</select>

				<input type="date" name="date" id="date" class="filters__input" value="<?= htmlspecialchars($_GET['date'] ?? '') ?>" />

				<button type="submit" class="btn-action btn-filter">Filtrer</button>
			</form>


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

				<div id="spinner" style="display:none; text-align:center; padding:10px;">
					<img src="../../assets/images/Rolling@1x-1.0s-200px-200px.gif" alt="Chargement..." width="40">
				</div>

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
