<?php
	require_once("header.php");
	require_once("testLogin.php");
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Ajouter un montant à la caisse</h2>
				<form class="form" id="add-user-form" method="POST" action="caisse-process.php">
					<div class="form__field">
						<label for="amount-caisse" class="form__label">Montant</label>
						<input type="number" name="amount-caisse" id="amount-caisse" class="form__input" placeholder="Entrez le montant" required="">
					</div>

					<div class="form__field">
						<label for="statut-caisse" class="form__label">Statut</label>
						<select id="statut-caisse" name="statut-caisse" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le statut de l'ajout
							</option>
							<option value="Entrant">Entrant</option>
							<option value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-caisse" class="form__label">Type de caisse</label>
						<select id="type-caisse" name="type-caisse" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le type de caisse
							</option>
							<option value="Western">Western</option>
							<option value="Ria">Ria</option>
							<option value="MoneyGramm">MoneyGramm</option>
							<option value="C1">C1</option>
							<option value="Momo">Momo</option>
						</select>
					</div>

					<button type="submit" name="add-caisse" class="form__button form__button--primary">
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