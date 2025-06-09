<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
    require_once("DeviseController.php");

	// Initialize the DeviseController
	$deviseController = new DeviseController();

	// Fetch id data from the database
	$deviseData = $deviseController->getAmountById($_GET["id"]);
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Éditer une échange de devise</h2>
				<form class="form" id="add-user-form" method="POST" action="devise-process.php?id=<?= $_GET["id"]; ?>">
					<div class="form__field">
						<label for="amount-devise" class="form__label">Montant</label>
						<input type="number" name="amount-devise" id="amount-devise" class="form__input" placeholder="Entrez le montant" value="<?php echo $deviseData["amount"]; ?>" required="">
					</div>

					<div class="form__field">
						<label for="statut-devise" class="form__label">Statut</label>
						<select id="statut-devise" name="statut-devise" class="form__input">
							<option <?php echo $staut = ($deviseData['statut'] === "Entrant") ? 'selected': ''; ?> value="Entrant">Entrant</option>
							<option <?php echo $staut = ($deviseData['statut'] === "Sortant") ? 'selected': ''; ?> value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-devise" class="form__label">Type d'échange de devise</label>
						<select id="type-devise" name="type-devise" class="form__input">
							<option <?php echo $type = ($deviseData['type'] === "Euro") ? 'selected': ''; ?> value="Euro">Euro</option>
							<option <?php echo $type = ($deviseData['type'] === "Dollars Canadien") ? 'selected': ''; ?> value="Dollars Canadien">Dollars Canadien</option>
							<option <?php echo $type = ($deviseData['type'] === "Dollars USD") ? 'selected': ''; ?> value="Dollars USD">Dollars USD</option>
							<option <?php echo $type = ($deviseData['type'] === "Cedi") ? 'selected': ''; ?> value="Cedi">Cedi</option>
							<option <?php echo $type = ($deviseData['type'] === "Naïra") ? 'selected': ''; ?> value="Naïra">Naïra</option>
							<option <?php echo $type = ($deviseData['type'] === "Fancs CFA Afrique Centrale") ? 'selected': ''; ?> value="Fancs CFA Afrique Centrale">Fancs CFA Afrique Centrale</option>
							<option <?php echo $type = ($deviseData['type'] === "Francs suisse") ? 'selected': ''; ?> value="Francs suisse">Francs suisse</option>
							<option <?php echo $type = ($deviseData['type'] === "Live sterling") ? 'selected': ''; ?> value="Live sterling">Live sterling</option>
						</select>
					</div>

					<button type="submit" name="edit-devise" class="form__button form__button--primary">
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