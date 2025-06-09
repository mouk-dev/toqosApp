<?php
	require_once("header.php");
	require_once("testLogin.php");
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Ajouter un montant naïra</h2>
				<form class="form" method="POST" action="naira_process.php">
					<div class="form__field">
						<label for="amount-naira" class="form__label">Montant</label>
						<input type="number" name="amount-naira" id="amount-naira" class="form__input" placeholder="Entrez le montant" required="">
					</div>

					<div class="form__field">
						<label for="statut-naira" class="form__label">Statut</label>
						<select id="statut-naira" name="statut-naira" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le statut de l'ajout
							</option>
							<option value="Entrant">Entrant</option>
							<option value="Sortant">Sortant</option>
						</select>
					</div>

					<button type="submit" name="add-naira" class="form__button form__button--primary">
						Ajouter
					</button>
				</form>
			</section>
		</div>
	</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>