<?php
	require_once 'NairaController.php';

	$statut = $_GET['statut'] ?? null;
	$date = $_GET['date'] ?? null;

	$ctrl = new NairaController();
	$data = $ctrl->getFilteredAmounts($statut, $date);

	foreach ($data as $index => $row) {
		echo "<tr class=\"table__row\">";
		echo "<td class=\"table__cell\">" . ($index + 1) . "</td>";
		echo "<td class=\"table__cell\">" . number_format($row['amount'], 2, ',', ' ') . "</td>";
		echo "<td class=\"table__cell\">" . htmlspecialchars($row['statut']) . "</td>";
		echo "<td class=\"table__cell\">" . htmlspecialchars($row['date']) . "</td>";
		echo "<td class=\"table__cell\">";
		echo "<a href=\"edit-naira.php?id=" . $row['id'] . "\" class=\"btn-success btn-action\">Modifier</a> | ";
		echo "<a href=\"#\" onclick=\"delNaira(" . $row['id'] . ")\" class=\"btn-danger btn-action\">Supprimer</a>";
		echo "</td>";
		echo "</tr>";
	}
?>
