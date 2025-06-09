<?php
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    
    // Include the UsersController class
    require_once 'UsersController.php';

    // Initialize the UsersController
    $usersController = new UsersController();

    // Validate and sanitize input data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate the user name
        @$name = filter_input(INPUT_POST, 'user-fullname', FILTER_SANITIZE_STRING);

        // Sanitize and validate the user email
        @$email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_STRING);

        // Sanitize and validate the user password
        @$password = filter_input(INPUT_POST, 'user-password', FILTER_SANITIZE_STRING);

        // Sanitize and validate the password confirm
        @$passwordConfirm = filter_input(INPUT_POST, 'user-confirm-password', FILTER_SANITIZE_STRING);

        if ($password === $passwordConfirm) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        } else {
            die('<script>
                    alert("Les mots de passe ne sont pas identiques");
                    history.back();
                </script>');
        }

        // Sanitize and validate the user role
        @$role = filter_input(INPUT_POST, 'user-role', FILTER_SANITIZE_STRING);
        if (!$role || !in_array($role, ['administrateur', 'agent'], true)) {
            die('<script>
                    alert("Role invalide.");
                    history.back();
                </script>');
        }

        // Get the current date and time from the server
        @$date = date('Y-m-d H:i:s');

        if (isset($_POST["add-user"])) {
            // Add the data to the database
            try {
                $usersController->addUser($name, $email, $passwordHash, $role, $date);
                header("location: view-user.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

        // Get amount id from database
        $id = $_GET["id"];
        
        if (isset($_POST["edit-user"])) {
            // Update the data to the database
            try {
                $usersController->updateUser($id, $role);
                header("location: view-user.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

    } else {
        die('Requête non autorisée.');
    }
?>
