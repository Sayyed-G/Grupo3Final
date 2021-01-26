<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Crear Cuenta</title>

	<link href="../recursos/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Registre un usuario</h1>
							<p class="lead">
								Registrar un usuario para el sistema
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form id="formCrear">
									<input type="hidden" name="accion" value="REGISTRAR">
										<div class="mb-3">
											<label class="form-label">Nombre</label>
											<input class="form-control form-control-lg" type="text" name="nombre" placeholder="Escriba su nombre" />
										</div>
										<div class="mb-3">
											<label class="form-label">Usuario</label>
											<input class="form-control form-control-lg" type="text" name="user" placeholder="Escriba un Usuario" />
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg" type="password" name="clave" placeholder="Escriba una contraseña" />
										</div>
										<div class="mb-3">
											<label class="form-label">Tipo</label>
											<select class="form-control" id="tipo" name="tipo">
												<option value="" selected disabled>[Seleccione]</option>
												<option value="1">Administrador</option>
												<option value="2">Policia</option>
											</select>
										</div>
										
									</form>
										<div class="text-center mt-3">
											<a href="#" class="btn btn-lg btn-primary" onclick="crear()">Crear</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										</div>
									<div id="mensaje"></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../recursos/js/app.js"></script>
	<script>
		function crear() {
             var datos = $('#formCrear').serializeArray();
             console.log(datos);
             $.ajax({
             	method: 'POST',
             	url: '../ajax.php',
             	data: datos
             })
             .done(function(html){
             	console.log(html);
             	
             	  $('#mensaje').html(html);	
             	
             	
             })
		}
	</script>

</body>

</html>