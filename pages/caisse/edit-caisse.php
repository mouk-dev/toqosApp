<?php
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
    require_once("CaisseController.php");

	// Initialize the CaisseController
	$caisseController = new CaisseController();

	// Fetch id data from the database
	$caisseData = $caisseController->getAmountById($_GET["id"]);
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Éditer un ajout à la caisse</h2>
				<form class="form" id="add-user-form" method="POST" action="caisse-process.php?id=<?= $_GET['id'] ?>">
					<div class="form__field">
						<label for="amount-caisse" class="form__label">Montant</label>
						<input type="number" name="amount-caisse" id="amount-caisse" class="form__input" placeholder="Entrez le montant" value="<?php echo $caisseData["amount"]; ?>" required="">
					</div>

					<div class="form__field">
						<label for="statut-caisse" class="form__label">Statut</label>
						<select id="statut-caisse" name="statut-caisse" class="form__input">
							<option <?php echo $staut = ($caisseData['statut'] === "Entrant") ? 'selected': ''; ?> value="Entrant">Entrant</option>
							<option <?php echo $staut = ($caisseData['statut'] === "Sortant") ? 'selected': ''; ?> value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-caisse" class="form__label">Type de caisse</label>
						<select id="type-caisse" name="type-caisse" class="form__input">
							<option <?php echo $type = ($caisseData['type'] === "Western") ? 'selected': ''; ?> value="Western">Western</option>
							<option <?php echo $type = ($caisseData['type'] === "Ria") ? 'selected': ''; ?> value="Ria">Ria</option>
							<option <?php echo $type = ($caisseData['type'] === "MoneyGramm") ? 'selected': ''; ?> value="MoneyGramm">MoneyGramm</option>
							<option <?php echo $type = ($caisseData['type'] === "C1") ? 'selected': ''; ?> value="C1">C1</option>
							<option <?php echo $type = ($caisseData['type'] === "Momo") ? 'selected': ''; ?> value="Momo">Momo</option>
						</select>
					</div>

					<button type="submit" name="edit-caisse" class="form__button form__button--primary">
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