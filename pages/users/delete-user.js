const delUser = (id) => {
	let confirmDel = confirm(
		"Autorisez-vous vraiment la suppression de cet utilisateur"
	);
	if (confirmDel) {
		const btnDel = document.getElementById("delete-user");
		window.location.replace(`view-user.php?id=${id}&action=delete`);
		window.location.reload();
		alert("Suppression effectuée avec succès");
	}
};
