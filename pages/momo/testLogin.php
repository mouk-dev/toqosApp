<?php
    if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	if(!$_SESSION['userId']){
		header("location: ../../index.php");
	}
?>