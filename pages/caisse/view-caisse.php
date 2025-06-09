<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
	require_once("CaisseController.php");

	// Initialize the CaisseController
	$caisseController = new CaisseController();

	// Fetch all data from the database
	// Filtrage
	$statut = $_GET['statut'] ?? null;
	$type = $_GET['type'] ?? null;
	$date = $_GET['date'] ?? null;

	$caisseData = $caisseController->getFilteredAmounts($_GET['statut'] ?? null, $_GET['type'] ?? null, $_GET['date'] ?? null);


	// Calculate totals by type and statut
	$totalEntrants = $caisseController->getTotalByStatut('Entrant');
	$totalSortants = $caisseController->getTotalByStatut('Sortant');
	$typeTotalsEntrants = $caisseController->getTotalsByTypeAndStatut('Entrant');
	$typeTotalsSortants = $caisseController->getTotalsByTypeAndStatut('Sortant');
	$totalGeneralEntrant = $caisseController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $caisseController->getGeneralTotal('Sortant');
	$total = $totalGeneralEntrant + $totalGeneralSortant;

	// Delete caisse
	if (isset($_GET["id"], $_GET["action"]) && $_GET["action"] === "delete") {
		$caisserDel = $caisseController->deleteAmount($_GET["id"]);
	}
	

?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="view-caisse" class="dashboard__section">
				<h2 class="dashboard__title">Point détaillé de la caisse</h2>
				<form method="get" class="filters" style="display: flex; gap: 1rem; align-items: center;">
					<select id="statut-caisse" name="statut" class="filters__input">
						<option value="">Tous les statuts</option>
						<option value="Entrant" <?= ($_GET['statut'] ?? '') === 'Entrant' ? 'selected' : '' ?>>Entrant</option>
						<option value="Sortant" <?= ($_GET['statut'] ?? '') === 'Sortant' ? 'selected' : '' ?>>Sortant</option>
					</select>

					<select id="type-caisse" name="type" class="filters__input">
						<option value="">Tous les types</option>
						<option value="Western" <?= ($_GET['type'] ?? '') === 'Western' ? 'selected' : '' ?>>Western</option>
						<option value="Ria" <?= ($_GET['type'] ?? '') === 'Ria' ? 'selected' : '' ?>>Ria</option>
						<option value="MoneyGramm" <?= ($_GET['type'] ?? '') === 'MoneyGramm' ? 'selected' : '' ?>>MoneyGramm</option>
						<option value="C1" <?= ($_GET['type'] ?? '') === 'C1' ? 'selected' : '' ?>>C1</option>
						<option value="Momo" <?= ($_GET['type'] ?? '') === 'Momo' ? 'selected' : '' ?>>Momo</option>
					</select>

					<input type="date" name="date" id="date" class="filters__input" value="<?= htmlspecialchars($_GET['date'] ?? '') ?>" />

					<button type="submit" class="btn-action btn-filter">Filtrer</button>
				</form>


				<table class="table" >
					<thead class="table__head">
						<tr class="table__row">
							<th class="table__cell">N°</th>
							<th class="table__cell">Type de caisse</th>
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
						<?php foreach ($caisseData as $index => $row): ?>
						<tr class="table__row">
							<td class="table__cell"><?= $index + 1 ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['type']) ?></td>
							<td class="table__cell"><?= number_format($row['amount'], 2, ',', ' ') ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['statut']) ?></td>
							<td class="table__cell"><?= htmlspecialchars($row['date']) ?></td>
							<td class="table__cell">
								<!-- Example actions: Edit/Delete -->
								<a href="edit-caisse.php?id=<?= $row['id'] ?>" class="btn-success btn-action">Modifier</a> |
								<a href="#" id="delete-caisse" onclick="delCaisse(<?= $row['id'] ?>);" class="btn-danger btn-action">Supprimer</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				
				<hr />

				<h2 class="dashboard__title">Total entrant par type de caisse</h2>
				<table class="table">
					<thead class="table__head">
						<tr class="table__row">
							<th class="table__cell">N°</th>
							<th class="table__cell">Type de caisse</th>
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

				<h2 class="dashboard__title">Total sortant par type de caisse</h2>
				<table class="table">
					<thead class="table__head">
						<tr class="table__row">
							<th class="table__cell">N°</th>
							<th class="table__cell">Type de caisse</th>
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
						<tr>
							<th class="table__cell">Total</th>
							<th class="table__cell"><?= number_format($totalGeneralEntrant, 2, ',', ' ') ?></th>
							<th class="table__cell"><?= number_format($totalGeneralSortant, 2, ',', ' ') ?></th>
						</tr>
					</thead>
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
