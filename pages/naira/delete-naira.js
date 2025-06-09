const delNaira = (id) => {
	let confirmDel = confirm("Autorisez cette suppression");
	if (confirmDel) {
		const btnDel = document.getElementById("delete-naira");
		window.location.replace(`view-naira.php?id=${id}&action=delete`);
		window.location.reload();
		alert("Suppression effectuée avec succès");
	}
};
