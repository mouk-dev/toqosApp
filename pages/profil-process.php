<?php
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	if(!$_SESSION['userId']){
		header("location: ../index.php");
	}

    // Get amount id from database
    $id = $_SESSION['userId'];
    
    // Include the IndexController class
    require_once '../IndexController.php';

    // Initialize the IndexController
    $indexController = new IndexController();

    $infos = $indexController->getUserById($id);

    // Validate and sanitize input data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate the user name
        @$name = filter_input(INPUT_POST, 'user-fullname', FILTER_SANITIZE_STRING);

        // Sanitize and validate the user email
        @$email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_STRING);

        // Sanitize and validate the user password
        @$lastPassword = filter_input(INPUT_POST, 'user-last-password', FILTER_SANITIZE_STRING);

        
        if (isset($_POST["edit-name-infos"])) {
            // Update the data to the database
            try {
                $indexController->updateUserName($id, $name);
                header("location: profil.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

        if (isset($_POST["edit-email-infos"])) {
            // Update the data to the database
            try {
                $indexController->updateUserEmail($id, $email);
                header("location: profil.php");
            } catch (Exception $e) {
                error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
            }
        }

        if (isset($_POST["edit-password-infos"])) {
            if (password_verify($lastPassword, $infos['password'])) {

                // Sanitize and validate the user password
                @$password = filter_input(INPUT_POST, 'user-password', FILTER_SANITIZE_STRING);

                // Sanitize and validate the password confirm
                @$passwordConfirm = filter_input(INPUT_POST, 'user-confirm-password', FILTER_SANITIZE_STRING);

                if ($password === $passwordConfirm) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // Update the data to the database
                    try {
                        $indexController->updateUserPassword($id, $passwordHash);
                        die('<script>
                                alert("Mot de passe mis à jour avec succès");
                                history.back();
                            </script>');
                    } catch (Exception $e) {
                        error_log('Erreur lors de l\'ajout des données : ' . $e->getMessage());
                        die('Erreur : ' . $e->getMessage()); // Affiche le message de l'erreur pour débogage
                    }
                } else {
                    die('<script>
                            alert("Les mots de passe ne sont pas identiques");
                            history.back();
                        </script>');
                }
            }
        }
    } else {
        die('Requête non autorisée.');
    }
?>
