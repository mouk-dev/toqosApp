<?php
	require_once("header.php");
	session_start();
	if(!$_SESSION['userId']){
		header("location: ../index.php");
	}
?>
<div class="dashboard__container">
	<h1 class="dashboard__big-title">TOQOS à votre service.</h1>
	<div class="dashboard__container-elements">
		<div class="dashboard__elements-item">
			<i class="fa-solid fa-folder dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Caisses</h1>
			<span class="dashboard__elements-static">12</span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-list dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Momo</h1>
			<span class="dashboard__elements-static">107</span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-users dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Devises</h1>
			<span class="dashboard__elements-static">5</span>
		</div>

		<div class="dashboard__elements-item">
			<i class="fa-solid fa-users dashboard__elements-icon"></i>
			<h1 class="dashboard__elements-title">Transferts</h1>
			<span class="dashboard__elements-static">5</span>
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
