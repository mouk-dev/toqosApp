<?php
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    // Include the CaisseController class
    require_once 'CaisseController.php';

    // Initialize the CaisseController
    $caisseController = new CaisseController();

    // Validate and sanitize input data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate the type
        @$type = filter_input(INPUT_POST, 'type-caisse', FILTER_SANITIZE_STRING);
        if (!$type || !in_array($type, ['Western', 'Ria', 'MoneyGramm', 'C1', 'Momo'], true)) {
            die('<script>
                    alert("Type de caisse invalide.");
                    history.back();
                </script>');
        }

        // Sanitize and validate the statut
        @$statut = filter_input(INPUT_POST, 'statut-caisse', FILTER_SANITIZE_STRING);
        if (!$statut || !in_array($statut, ['Entrant', 'Sortant'], true)) {
            die('<script>
                    alert("Statut invalide.");
                    history.back();
                </script>');
        }

        // Validate the amount
        @$amount = filter_input(INPUT_POST, 'amount-caisse', FILTER_VALIDATE_FLOAT);
        if ($amount === false || $amount <= 0) {
            die('<script>
                    alert("Montant invalide.");
                    history.back();
                </script>');
        }

        // Get the current date and time from the server
        @$date = date('Y-m-d H:i:s');
        

        if (isset($_POST["add-caisse"])) {
            // Add the data to the database
            try {
                $caisseController->addAmount($type, $amount, $statut, $date);
                header("location: view-caisse.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }
        
        // Get amount id from database
        $id = $_GET["id"];
        
        if (isset($_POST["edit-caisse"])) {
            // Update the data to the database
            try {
                $caisseController->updateAmount($id, $type, $amount, $statut, $date);
                header("location: view-caisse.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }
        
    } else {
        die('Requête non autorisée.');
    }
?>
