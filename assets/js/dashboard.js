// Fonction pour gérer les interactions avec les sous-menus de la barre latérale
export function sideBarController(
	tagEvent,
	tagDropdown,
	tagChevron,
	chevronState1,
	chevronState2
) {
	const subMenu = document.getElementById(tagEvent);
	if (!subMenu) {
		console.error(`Élément avec l'ID ${tagEvent} introuvable.`);
		return;
	}

	subMenu.addEventListener("mouseover", () => {
		const dropdown = document.getElementById(tagDropdown);
		const chevronState = document.getElementById(tagChevron);
		if (dropdown && chevronState) {
			chevronState.setAttribute("class", chevronState1);
			dropdown.style.display = "block";
			console.log(`Menu ${tagEvent} affiché.`);
		} else {
			console.error(
				`Éléments avec l'ID ${tagDropdown} ou ${tagChevron} introuvables.`
			);
		}
	});

	subMenu.addEventListener("mouseout", () => {
		const dropdown = document.getElementById(tagDropdown);
		const chevronState = document.getElementById(tagChevron);
		if (dropdown && chevronState) {
			chevronState.setAttribute("class", chevronState2);
			dropdown.style.display = "none";
			console.log(`Menu ${tagEvent} masqué.`);
		} else {
			console.error(
				`Éléments avec l'ID ${tagDropdown} ou ${tagChevron} introuvables.`
			);
		}
	});
}

// Initialisation des contrôleurs de la barre latérale
export function initDashboard() {
	const controllers = [
		{
			tagEvent: "sub-menu-caisse",
			tagDropdown: "dropdown-caisse",
			tagChevron: "chevron-state-caisse",
		},
		{
			tagEvent: "sub-menu-momo",
			tagDropdown: "dropdown-momo",
			tagChevron: "chevron-state-momo",
		},
		{
			tagEvent: "sub-menu-Devise",
			tagDropdown: "dropdown-Devise",
			tagChevron: "chevron-state-Devise",
		},
		{
			tagEvent: "sub-menu-transfert",
			tagDropdown: "dropdown-transfert",
			tagChevron: "chevron-state-transfert",
		},
		{
			tagEvent: "sub-menu-users",
			tagDropdown: "dropdown-users",
			tagChevron: "chevron-state-users",
		},
	];

	controllers.forEach(({ tagEvent, tagDropdown, tagChevron }) => {
		sideBarController(
			tagEvent,
			tagDropdown,
			tagChevron,
			"fa-solid fa-chevron-right",
			"fa-solid fa-chevron-left"
		);
	});
}
