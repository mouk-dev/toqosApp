const delMomo = (id) => {
	let confirmDel = confirm("Autorisez cette suppression");
	if (confirmDel) {
		const btnDel = document.getElementById("delete-momo");
		window.location.replace(`view-momo.php?id=${id}&action=delete`);
		window.location.reload();
		alert("Suppression effectuée avec succès");
	}
};
