<?php
    require_once 'DeviseController.php';

    $statut = $_GET['statut'] ?? null;
    $type = $_GET['type'] ?? null;
    $date = $_GET['date'] ?? null;

    $ctrl = new DeviseController();
    $data = $ctrl->getFilteredAmounts($statut, $type, $date);

    foreach ($data as $index => $row) {
        echo "<tr class=\"table__row\">";
        echo "<td class=\"table__cell\">" . ($index + 1) . "</td>";
        echo "<td class=\"table__cell\">" . htmlspecialchars($row['type']) . "</td>";
        echo "<td class=\"table__cell\">" . number_format($row['amount'], 2, ',', ' ') . "</td>";
        echo "<td class=\"table__cell\">" . htmlspecialchars($row['statut']) . "</td>";
        echo "<td class=\"table__cell\">" . htmlspecialchars($row['date']) . "</td>";
        echo "<td class=\"table__cell\">";
        echo "<a href=\"edit-devise.php?id=". $row['id'] ."\" class=\"btn-success btn-action\">Modifier</a> | ";
        echo "<a href=\"#\" onclick=\"delDevise(". $row['id'] .")\" class=\"btn-danger btn-action\">Supprimer</a>";
        echo "</td>";
        echo "</tr>";
    }             
?>