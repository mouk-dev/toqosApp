const delCaisse = (id) => {
	let confirmDel = confirm("Autorisez cette suppression");
	if (confirmDel) {
		const btnDel = document.getElementById("delete-caisse");
		window.location.replace(`view-caisse.php?id=${id}&action=delete`);
		window.location.reload();
		alert("Suppression effectuée avec succès");
	}
};
