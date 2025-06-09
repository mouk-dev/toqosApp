<?php
	require_once("header.php");
	require_once("testLogin.php");
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Ajouter un montant aux échanges de devise</h2>
				<form class="form" id="add-user-form" method="POST" action="devise-process.php">
					<div class="form__field">
						<label for="amount-devise" class="form__label">Montant</label>
						<input type="number" name="amount-devise" id="amount-devise" class="form__input" placeholder="Entrez le montant" required="">
					</div>

					<div class="form__field">
						<label for="statut-devise" class="form__label">Statut</label>
						<select id="statut-devise" name="statut-devise" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le statut de l'ajout
							</option>
							<option value="Entrant">Entrant</option>
							<option value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-devise" class="form__label">Type d'échange de devise</label>
						<select id="type-devise" name="type-devise" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le type d'échange de devise
							</option>
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

					<button type="submit" name="add-devise" class="form__button form__button--primary">
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