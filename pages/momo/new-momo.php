<?php
	require_once("header.php");
	require_once("testLogin.php");
?>

	<div class="dashboard__container">
		<div class="dashboard__container-elements">
			<section id="add-employee" class="dashboard__section">
				<h2 class="dashboard__title">Ajouter un montant aux opérations Momo</h2>
				<form class="form" method="POST" action="momo-process.php">
					<div class="form__field">
						<label for="amount-momo" class="form__label">Montant</label>
						<input type="number" name="amount-momo" id="amount-momo" class="form__input" placeholder="Entrez le montant" required="">
					</div>

					<div class="form__field">
						<label for="statut-momo" class="form__label">Statut</label>
						<select id="statut-momo" name="statut-momo" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le statut de l'ajout
							</option>
							<option value="Entrant">Entrant</option>
							<option value="Sortant">Sortant</option>
						</select>
					</div>

					<div class="form__field">
						<label for="type-momo" class="form__label">Type d'opération Momo</label>
						<select id="type-momo" name="type-momo" class="form__input">
							<option selected="" disabled="">
								Sélectionnez le type d'opération Momo
							</option>
							<option value="MTN">MTN</option>
							<option value="MOOV">MOOV</option>
							<option value="CELTIS">CELTIS</option>
							<option value="CAISSE">CAISSE</option>
						</select>
					</div>

					<button type="submit" name="add-momo" class="form__button form__button--primary">
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