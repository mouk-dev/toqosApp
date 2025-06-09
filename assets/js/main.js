// Importation des modules nécessaires
import { sideBarController, initDashboard } from "./dashboard.js";
import {
	showOrHidePasswordLogIn,
	testEmptyFieldsLogIn,
	testFormatDataLogIn,
} from "./formLogInController.js";
import {
	showOrHidePasswordSignUp,
	showOrHidePasswordConfirmSignUp,
	testEmptyFieldsSignUp,
	testFormatDataSignUp,
} from "./formSignUpController.js";

/**
 * Fonction d'initialisation principale au chargement du DOM.
 */
document.addEventListener("DOMContentLoaded", function boot() {
	if (
		document.getElementById("title-page").innerText === "Connexion | TOQOS"
	) {
		showOrHidePasswordLogIn();
		testEmptyFieldsLogIn();
		testFormatDataLogIn();
	} else {
		if (
			document.getElementById("title-page").innerText ===
			"Inscription | TOQOS"
		) {
			showOrHidePasswordSignUp();
			showOrHidePasswordConfirmSignUp();
			testEmptyFieldsSignUp();
			testFormatDataSignUp();
		} else {
			// Initialisation des contrôleurs de la barre latérale et du tableau de bord
			if (
				document.getElementById("title-page").innerText ===
					"Tableau de bord | TOQOS" ||
				document.getElementById("title-page").innerText ===
					"Gestion des caisses | TOQOS" ||
				document.getElementById("title-page").innerText ===
					"Gestion des devises | TOQOS" ||
				document.getElementById("title-page").innerText ===
					"Gestion des momos | TOQOS" ||
				document.getElementById("title-page").innerText ===
					"Gestion des naïras | TOQOS" ||
				document.getElementById("title-page").innerText ===
					"Gestion des utilisateurs | TOQOS"
			) {
				initDashboard();
				sideBarController();
			}
		}
	}
});
