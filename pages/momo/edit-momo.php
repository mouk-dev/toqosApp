<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
    require_once("MomoController.php");

	// Initialize the MomoController
	$momoController = new MomoController();

	// Fetch id data from the database
	$momoData = $momoController->getAmountById($_GET["id"]);
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Éditer une opération momo</h2>
				<form class="form" method="POST" action="momo-process.php?id=<?= $_GET['id']; ?>">
					<div class="form__field">
						<label for="amount-momo" class="form__label">Montant</label>
						<input type="number" name="amount-momo" id="amount-momo" class="form__input" placeholder="Entrez le montant" value="<?php echo $momoData["amount"]; ?>" required="">
					</div>

					<div class="form__field">
						<label for="statut-momo" class="form__label">Statut</label>
						<select id="statut-momo" name="statut-momo" class="form__input">
							<option <?php echo $staut = ($momoData['statut'] === "Entrant") ? 'selected': ''; ?> value="Entrant">Entrant</option>
							<option <?php echo $staut = ($momoData['statut'] === "Sortant") ? 'selected': ''; ?> value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-momo" class="form__label">Type d'opération Momo</label>
						<select id="type-momo" name="type-momo" class="form__input">
							<option <?php echo $staut = ($momoData['statut'] === "MTN") ? 'selected': ''; ?> value="MTN">MTN</option>
							<option <?php echo $staut = ($momoData['statut'] === "MOOV") ? 'selected': ''; ?> value="MOOV">MOOV</option>
							<option <?php echo $staut = ($momoData['statut'] === "CELTIS") ? 'selected': ''; ?> value="CELTIS">CELTIS</option>
							<option <?php echo $staut = ($momoData['statut'] === "CAISSE") ? 'selected': ''; ?> value="CAISSE">CAISSE</option>
						</select>
					</div>

					<button type="submit" name="edit-momo" class="form__button form__button--primary">
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