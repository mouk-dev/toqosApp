<?php
    if (isset($_POST['connect'])) {
        $userEmail = filter_var($_POST['user-email'], FILTER_SANITIZE_EMAIL);
        $userPassword = $_POST['user-password'];
        if (!empty($userEmail) && !empty($userPassword)) {
            require_once("IndexController.php");
            $index = new IndexController();
            $userInfo = $index->verifyEmailUser($userEmail);
            if ($userInfo) {
                // Vérification du mot de passe (si les mots de passe sont hashés en BDD)
                if (password_verify($userPassword, $userInfo['password'])) {
                    session_start();
                    $_SESSION['userId'] = $userInfo['id'];
                    $_SESSION['userName'] = $userInfo['name'];
                    $_SESSION['userEmail'] = $userInfo['email'];
                    $_SESSION['userRole'] = $userInfo['role'];
                    $_SESSION['userSignupDate'] = $userInfo['user_signup_date'];
                    header("location: pages/dashboard.php");
                } else {
                    echo '<script>
                            window.alert("Adresse email ou mot de passe incorrecte !");
                            close("http://localhost/niyi/connect-user.php");
                            open("http://localhost/niyi/index.php");
                        </script>
                        ';
                }
            } else {
                    echo '<script>
                            window.alert("Adresse email ou mot de passe incorrecte !");
                            close("http://localhost/niyi/connect-user.php");
                            open("http://localhost/niyi/index.php");
                        </script>
                        ';
                } 
        }
    }
?>

