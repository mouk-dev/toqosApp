<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
    require_once("NairaController.php");

	// Initialize the NairaController
	$nairaController = new NairaController();

	// Fetch id data from the database
	$nairaData = $nairaController->getAmountById($_GET["id"]);
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Éditer un transfert naïra</h2>
				<form class="form" method="POST" action="naira_process.php?id=<?= $_GET['id']; ?>">
					<div class="form__field">
						<label for="amount-naira" class="form__label">Montant</label>
						<input type="number" name="amount-naira" id="amount-naira" class="form__input" placeholder="Entrez le montant" value="<?php echo $nairaData["amount"]; ?>" required="">
					</div>

					<div class="form__field">
						<label for="statut-naira" class="form__label">Statut</label>
						<select id="statut-naira" name="statut-naira" class="form__input">
							<option <?php echo $staut = ($nairaData['statut'] === "Entrant") ? 'selected': ''; ?> value="Entrant">Entrant</option>
							<option <?php echo $staut = ($nairaData['statut'] === "Sortant") ? 'selected': ''; ?> value="Sortant">Sortant</option>
						</select>
					</div>

					<button type="submit" name="edit-naira" class="form__button form__button--primary">
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