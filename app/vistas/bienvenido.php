<?php 
include_once "app/vistas/layout/head.php";
/*
Mostrar datos para Dashoard
*/

$fecha = date('Y-m-d');
$listar = $objHistorial->listarCuarentena($fecha);
$reg15 = $objHistorial->cantidad('REGISTRO','7 days');
 foreach ($reg15 as $k => $registro) {
 	$Cant_registro15 = $registro['cantidad'];
 }
$reg30 = $objHistorial->cantidad('REGISTRO','1 month');
foreach ($reg30 as $k => $registro1) {
 	$Cant_registro30 = $registro1['cantidad'];
 }

$cuarent15 = $objHistorial->cantidad('CUARENTENA','7 days');
foreach ($cuarent15 as $k => $cuarentena) {
 	$Cant_cuarentena15 = $cuarentena['cantidad'];
 }
$cuarent30 = $objHistorial->cantidad('CUARENTENA','1 month');
foreach ($cuarent30 as $k => $cuarentena1) {
 	$Cant_cuarentena30 = $cuarentena1['cantidad'];
 }


 ?>
<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Controlando</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">Sistema</a></li>
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">Datos</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Registradas x sem</h5>
												<h1 class="mt-1 mb-3"><?=$Cant_registro15?></h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Datos </span>
													<span class="text-muted">En una semana</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Cuarentena x sem</h5>
												<h1 class="mt-1 mb-3"><?=$Cant_cuarentena15?></h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> Datos </span>
													<span class="text-muted">En una semana</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Registradas x mes</h5>
												<h1 class="mt-1 mb-3"><?=$Cant_registro30?></h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> Datos </span>
													<span class="text-muted">En un mes</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Cuarentena x mes</h5>
												<h1 class="mt-1 mb-3"><?=$Cant_cuarentena30?></h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Datos </span>
													<span class="text-muted">En un mes</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Casos registrados</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Personas viajantes</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Huánuco</td>
													<td class="text-right">0.00</td>
												</tr>
												<tr>
													<td>Pasco</td>
													<td class="text-right">0.00</td>
												</tr>
												<tr>
													<td>Pucallpa</td>
													<td class="text-right">0.00</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Tiempo real</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendario</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Personas en cuarentena</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Nombre</th>
											<th class="d-none d-xl-table-cell">Fecha inicio</th>
											<th class="d-none d-xl-table-cell">Fecha final</th>
											<th>Estado</th>
											<th class="d-none d-md-table-cell">Asignado</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										// $listar = listar->fetchAll();
                                         foreach ($listar as $k => $value) {
                                         	echo '
                                           <tr>
											    <td>'.$value['apellidos'].', '.$value['nomP'].'</td>
											    <td class="d-none d-xl-table-cell">'.$value['fecha_inicio'].'</td>
											    <td class="d-none d-xl-table-cell">'.$value['fecha_final'].'</td>
											    <td><span class="badge bg-danger">'.$value['resultado'].'</span></td>
											    <td class="d-none d-md-table-cell">'.$value['nomU'].'</td>
										    </tr>
                                         	';
                                         }
										 ?>
										
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Casos por meses</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
					datasets: [{
						label: "Cantidad (#)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
						<?php 
                         for($i=1;$i<=12;$i++) {
                         	$Cantidad = $objHistorial->CantidadMes($i);
                            foreach ($Cantidad as $k => $value) {
                              	echo $value['cantidad'].',';
                              }  
                         	
                         }
						 ?>

						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Huánuco", "Pasco", "Pucallpa"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [-9.8912006, -76.3282823],
					name: "Huánuco"
				},
				{
					coords: [-10.2989032, -75.9915818],
					name: "Pasco"
				},
				{
					coords: [-9.2973253, -76.0044342],
					name: "Tingo Maria"
				},
				{
					coords: [-8.3750231, -74.6167379],
					name: "Pucallpa"
				},
				{
					coords: [-10.2231116, -76.415317],
					name: "Ambo"
				},
				{
					coords: [-10.4472091, -76.1948252],
					name: "Huariaca"
				},
				{
					coords: [-10.4907657, -76.5190458],
					name: "Yanahuanca"
				},
				{
					coords: [-8.9313593, -76.1174012],
					name: "Aucayacu"
				},
				{
					coords: [-11.5241869, -75.9026602],
					name: "La Oroya"
				},
				{
					coords: [-12.0484232, -75.2376585],
					name: "Huancayo "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
			});
		});
	</script>
<?php 
include_once "app/vistas/layout/footer.php";
 ?>