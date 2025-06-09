<?php
    require_once("header.php");
    $password_input = $_POST['user-password'];
    if (isset($_POST['generate'])) {
        if (!empty($password_input)) {
            session_start();
            $_SESSION['password_input'] = $password_input;
            $_SESSION['password_hash'] = password_hash($password_input, PASSWORD_DEFAULT);
        }
    }
?>

<style>
    body{
        background: white;
    }

    .dashboard__container{
        background: white;
        margin: 0;
        padding: 0;
    }
</style>

<div class="dashboard__container">
    <div class="dashboard__container-elements">
        <section id="edit-password" class="dashboard__section">
            <h1 class="dashboard__title">Formulaire de vérification de mot de passe</h1>
            <form class="form" id="password-controller-form" method="POST" action="">
                <div class="form__field">
                    <label for="user-password" class="form__label">Mot de passe </label>
                    <input type="password" name="user-password" id="user-password" class="form__input" placeholder="Entrez le mot de passe" required="" />
                </div>

                <button type="submit" name="generate" class="form__button form__button--primary" id="generate">
                    Générer le hache
                </button>
            </form>

            <div>
                <ul>
                    <li>
                        <b>Mot de passe : </b><span id="password-input-value"><?= $_SESSION['password_input'] ?></span>
                    </li>

                    <li>
                        <b>Hache : </b><span id="password-hash-value"><?= $_SESSION['password_hash'] ?></span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>

<script>
    
    document.getElementById("generate").onclick = () => {
        console.log(document.getElementById("user-password").value);
        console.log(document.getElementById("user-password-hash").value);
        
    }
    document.addEventListener("DOMLoader", () => {
        let password = localStorage.setItem("password", document.getElementById("password-input-value").textContent);
        let passwordHash = localStorage.setItem("passwordHash", document.getElementById("password-hash-value").textContent);
    });
    
</script>