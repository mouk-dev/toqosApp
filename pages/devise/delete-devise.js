const delDevise = (id) => {
	let confirmDel = confirm("Autorisez cette suppression");
	if (confirmDel) {
		const btnDel = document.getElementById("delete-devise");
		window.location.replace(`view-devise.php?id=${id}&action=delete`);
		window.location.reload();
		alert("Suppression effectuée avec succès");
	}
};
