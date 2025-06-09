<?php
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    
    // Include the NairaController class
    require_once 'NairaController.php';

    // Initialize the NairaController
    $nairaController = new NairaController();

    // Validate and sanitize input data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate the statut
        @$statut = filter_input(INPUT_POST, 'statut-naira', FILTER_SANITIZE_STRING);
        if (!$statut || !in_array($statut, ['Entrant', 'Sortant'], true)) {
            die('<script>
                    alert("Statut invalide.");
                    history.back();
                </script>');
        }

        // Validate the amount
        @$amount = filter_input(INPUT_POST, 'amount-naira', FILTER_VALIDATE_FLOAT);
        if ($amount === false || $amount <= 0) {
            die('<script>
                    alert("Montant invalide.");
                    history.back();
                </script>');
        }

        // Get the current date and time from the server
        @$date = date('Y-m-d H:i:s');

        if (isset($_POST["add-naira"])) {
            // Add the data to the database
            try {
                $nairaController->addAmount($amount, $statut, $date);
                header("location: view-naira.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

        // Get amount id from database
        $id = $_GET["id"];
        
        if (isset($_POST["edit-naira"])) {
            // Update the data to the database
            try {
                $nairaController->updateAmount($id, $amount, $statut, $date);
                header("location: view-naira.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

    } else {
        die('Requête non autorisée.');
    }
?>
