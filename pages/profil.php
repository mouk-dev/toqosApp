<?php
	require_once("header.php");
	session_start();
	if(!$_SESSION['userId']){
		header("location: ../index.php");
	}

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    require_once("../IndexController.php");

	// Initialize the IndexController
	$indexController = new IndexController();

	// Fetch id data from the database
	$usersData = $indexController->getUserById($_SESSION["userId"]);
?>

<div class="dashboard__container">
    <div class="profil__box">
        <h1>Mon Profil</h1>

        <hr />

        <h2 class="infos__title">Informations personelles</h2>

            <table class="table">
                <thead class="table__head">
                    <form action="profil-process.php" method="POST">
                        <tr class="table__row">
                            <th class="table__cell">
                                <label for="user-fullname" class="form__label">Nom actuel : <?php echo $usersData['name']; ?></label> 
                            </th>
                            <td class="table__cell cell__profil">
                                <label for="user-fullname" class="form__label">Nouveau : </label> 
                                <input type="text" name="user-fullname" id="user-fullname" class="form__input" placeholder="Entrez l'adresse nom complet de l'utilisateur" required="">
                                <button type="submit" name="edit-name-infos" class="btn-action btn-primary">Modifier</button>
                            </td>
                        </tr>
                    </form>

                    <form action="profil-process.php" method="POST">
                        <tr class="table__row">
                            <th class="table__cell">
                                <label for="user-email" class="form__label">Email actuel : <?php echo $usersData['email']; ?></label>
                            </th>
                            <td class="table__cell cell__profil">
                                <label for="user-email" class="form__label">Nouveau : </label>
                                <input type="email" name="user-email" id="user-email" class="form__input" placeholder="Entrez l'adresse email de l'utilisateur" required="">
                                <button type="submit" name="edit-email-infos" class="btn-action btn-primary">Modifier</button>
                            </td>
                        </tr>
                    </form>
                </thead>
            </table>
        </form>

        <h2 class="infos__title">Informations administratives</h2>

        <table class="table">
            <thead class="table__head">
                <tr class="table__row">
                    <th class="table__cell">
                        <label for="user-fullname" class="form__label">Rôle : </label> 
                    </th>
                    <td class="table__cell cell__profil">
                        <label for="user-fullname" class="form__label"><?php echo $_SESSION['userRole']; ?></label>
                    </td>
                </tr>

                <tr class="table__row">
                    <th class="table__cell">
                        <label for="user-email" class="form__label">Employé le : </label>
                    </th>
                    <td class="table__cell cell__profil">
                        <label for="user-email" class="form__label"><?php echo $_SESSION['userSignupDate']; ?></label>
                    </td>
                </tr>
            </thead>
        </table>

        <h2 class="infos__title">Informations sécurisées</h2>

        <form action="profil-process.php" method="POST">
            <table class="table">
                <thead class="table__head">
                    <tr class="table__row">
                        <th class="table__cell">
                            <label for="user-last-password" class="form__label">Mot de passe actuel: &nbsp;&nbsp;&nbsp;&nbsp;********</label> 
                        </th>
                        <td class="table__cell cell__profil">
                            <label for="user-last-password" class="form__label">Actuel :</label> 
                            <input type="password" name="user-last-password" id="user-last-password" class="form__input" placeholder="Entrez le mot de passe actuel" required="">
                        </td>
                    </tr>

                    <tr class="table__row">
                        <th class="table__cell">
                            <label for="user-password" class="form__label">Nouveau mot de passe : </label> 
                        </th>
                        <td class="table__cell cell__profil">
                            <label for="user-password" class="form__label">Nouveau :</label> 
                            <input type="password" name="user-password" id="user-password" class="form__input" placeholder="Entrez le nouveau mot de passe" required="">
                        </td>
                    </tr>

                        <tr class="table__row">
                            <th class="table__cell">
                                <label for="user-password" class="form__label">Confirmez le mot de passe : </label> 
                            </th>
                            <td class="table__cell cell__profil">
                                <label for="user-password" class="form__label">Confirmez : </label> 
                                <input type="password" name="user-confirm-password" id="user-password" class="form__input" placeholder="Confirmez le nouveau mot de passe" required="">
                            </td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__cell center-btn" colspan="2">
                                <button type="submit" name="edit-password-infos" class="btn-action btn-primary">Modifier</button>
                            </td>
                        </tr>
                    </form> 
                </thead>
            </table>
        </form>
    </div>
</div>

<?php
	require_once("nav.php");
	require_once("footer.php");
?>