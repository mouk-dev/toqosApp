<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("header.php");
	require_once("testLogin.php");
	require_once("caisse/CaisseController.php");
	require_once("devise/DeviseController.php");
	require_once("momo/MomoController.php");
	require_once("naira/NairaController.php");

	// Initialize the CaisseController
	$caisseController = new CaisseController();

	// Calculate totals by type and statut caisse
	$totalEntrants = $caisseController->getTotalByStatut('Entrant');
	$totalSortants = $caisseController->getTotalByStatut('Sortant');
	$typeTotalsEntrants = $caisseController->getTotalsByTypeAndStatut('Entrant');
	$typeTotalsSortants = $caisseController->getTotalsByTypeAndStatut('Sortant');
	$totalGeneralEntrant = $caisseController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $caisseController->getGeneralTotal('Sortant');
	$totalCaisse = $totalGeneralEntrant + $totalGeneralSortant;

	// Initialize the DeviseController
	$deviseController = new DeviseController();
	
	// Calculate totals by type and statut devise
	$totalEntrants = $deviseController->getTotalByStatut('Entrant');
	$totalSortants = $deviseController->getTotalByStatut('Sortant');
	$typeTotalsEntrants = $deviseController->getTotalsByTypeAndStatut('Entrant');
	$typeTotalsSortants = $deviseController->getTotalsByTypeAndStatut('Sortant');
	$totalGeneralEntrant = $deviseController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $deviseController->getGeneralTotal('Sortant');
	$totalDevise = $totalGeneralEntrant + $totalGeneralSortant;

	// Initialize the MomoController
	$momoController = new MomoController();

	// Calculate totals by type and statut
	$totalEntrants = $momoController->getTotalByStatut('Entrant');
	$totalSortants = $momoController->getTotalByStatut('Sortant');
	$typeTotalsEntrants = $momoController->getTotalsByTypeAndStatut('Entrant');
	$typeTotalsSortants = $momoController->getTotalsByTypeAndStatut('Sortant');
	$totalGeneralEntrant = $momoController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $momoController->getGeneralTotal('Sortant');
	$totalMomo = $totalGeneralEntrant + $totalGeneralSortant;

	// Initialize the NairaController
	$nairaController = new NairaController();

	// Calculate totals by type and statut
	$totalEntrants = $nairaController->getTotalByStatut('Entrant');
	$totalSortants = $nairaController->getTotalByStatut('Sortant');
	$totalGeneralEntrant = $nairaController->getGeneralTotal('Entrant');
	$totalGeneralSortant = $nairaController->getGeneralTotal('Sortant');
	$totalNaira = $totalGeneralEntrant + $totalGeneralSortant;
?>
<div class="dashboard__container">
	<h1 class="dashboard__big-title">TOQOS à votre service.</h1>
	<div class="dashboard__container-elements">
		<div class="dashboard__elements-item">
			<i class="fas fa-cash-register dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Caisses</h1>
			<span class="dashboard__elements-static"><?= number_format($totalCaisse, 0, ',', ' '); ?></span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-money-bill dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Momo</h1>
			<span class="dashboard__elements-static"><?= number_format($totalMomo, 0, ',', ' '); ?></span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-coins dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Devises</h1>
			<span class="dashboard__elements-static"><?= number_format($totalDevise, 0, ',', ' '); ?></span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-right-left dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Transferts Naïra</h1>
			<span class="dashboard__elements-static"><?= number_format($totalNaira, 0, ',', ' '); ?></span>
		</div>
	</div>
	<div class="dashboard__landing-container">
		<div class="dashboard__text-container">
			<p class="dashboard__landing-text">
				Utiliser TOQOS pour une bon suivi de la comptabilité dans votre
				agence. Faites vos comptes de façon rapide et optimable. Avec
				TOQOS, gagnez en temps et en ressources.
			</p>
			<img
				src="../assets/images/about.jpg"
				alt=""
				class="dashboard_img"
			/>
		</div>
		<!-- Reports -->
		<div class="report">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title dashboard__big-title">Raports</h5>
					<!-- Line Chart -->
					<div id="reportsChart"></div>

					<script>
						document.addEventListener("DOMContentLoaded", () => {
							new ApexCharts(
								document.querySelector("#reportsChart"),
								{
									series: [
										{
											name: "Caisse",
											data: [31, 40, 28, 51, 42, 82, 56],
										},
										{
											name: "Momo",
											data: [11, 32, 45, 32, 34, 52, 41],
										},
										{
											name: "Devise",
											data: [15, 11, 32, 18, 9, 24, 11],
										},
										{
											name: "Naïra",
											data: [13, 25, 13, 37, 20, 42, 20],
										},
									],
									chart: {
										height: 350,
										type: "area",
										toolbar: {
											show: false,
										},
									},
									markers: {
										size: 4,
									},
									colors: ["#4154f1", "#2eca6a", "#ff771d", "#96109d"],
									fill: {
										type: "gradient",
										gradient: {
											shadeIntensity: 1,
											opacityFrom: 0.3,
											opacityTo: 0.4,
											stops: [0, 90, 100],
										},
									},
									dataLabels: {
										enabled: false,
									},
									stroke: {
										curve: "smooth",
										width: 2,
									},
									xaxis: {
										type: "datetime",
										categories: [
											"2018-09-19T00:00:00.000Z",
											"2018-09-19T01:30:00.000Z",
											"2018-09-19T02:30:00.000Z",
											"2018-09-19T03:30:00.000Z",
											"2018-09-19T04:30:00.000Z",
											"2018-09-19T05:30:00.000Z",
											"2018-09-19T06:30:00.000Z",
										],
									},
									tooltip: {
										x: {
											format: "dd/MM/yy HH:mm",
										},
									},
								}
							).render();
						});
					</script>
					<!-- End Line Chart -->
				</div>
			</div>
		</div>
	</div>
	<div class="dashboard__foot">
		@TOQOS - APP
	</div>
</div>
<?php
	require_once("nav.php");
	require_once("footer.php");
?>
