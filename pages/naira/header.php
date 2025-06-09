<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title id="title-page">Gestion des naïras | TOQOS</title>
		<link rel="stylesheet" href="../../assets/css/dashbord.css" />
		<link
			rel="stylesheet"
			href="../../assets/vendors/fontawesome-free-6.6.0-web/css/all.css"
		/>
		<link
			rel="shortcut icon"
			href="../../assets/images/toqos_logo-removebg-preview.png"
			type="image/x-icon"
		/>
		<script src="../../assets/js/main.js" type="module" defer></script>
	</head>

	<body>
        <div class="main-box">
            <div class="dashboard">
                <header class="dashboard__header">
                    <ul class="dashboard__header-list">
                        <li class="dashboard__header-item">
                            <a
                                href="#"
                                class="dashboard__header-link dashboard__header-link--profile"
                            >
                                <img
                                    src="../../assets/images/toqos_logo-removebg-preview.png"
                                    alt="photo de profil"
                                    class="dashboard__user-image"
                                />
                                <span class="dashboard__user-name"><?php echo $_SESSION['userName']; ?></span>
                            </a>
                        </li>

                        <li class="dashboard__header-item">
                            <span class="dashboard__header-text"
                                >Bienvenu dans l'inventaire des transferts de naïra</span
                            >
                        </li>

                        <li class="dashboard__header-item">
                            <a
                                href="../logout.php"
                                class="dashboard__header-link dashboard__header-link--logout"
                            >
                                <i class="fa-solid fa-sign-out-alt"></i>&nbsp; Déconnexion
                            </a>
                        </li>
                    </ul>
                </header>