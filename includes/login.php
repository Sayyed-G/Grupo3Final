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

	<title>SISTEMA COVID</title>

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
							<h1 class="h2">Bienvenidos</h1>
							<p class="lead">
								Identifiquese por favor!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="../recursos/img/avatars/avatar.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form id="formUser">
									 <input type="hidden" name="accion" value="LOGIN">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Escriba su correo" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Escriba su contraseña" />
											<small>
								            <a href="#">Forgot password?</a>
								          </small>
										</div>
										<div>
											<label class="form-check">
									            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
									            <span class="form-check-label">
									              Remember me next time
									            </span>
									          </label>
										</div>
									 </form>
										<div class="text-center mt-3">
											<a href="#" class="btn btn-lg btn-primary" onclick="iniciar()">Iniciar</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
										<div id="error"></div>
									
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
		function iniciar() {
             var datos = $('#formUser').serializeArray();
             $.ajax({
             	method: 'POST',
             	url: '../ajax.php',
             	data: datos
             })
             .done(function(html){
             	console.log(html);
             	if (html==1) {
                  location.href='bienvenido';
             	} else {
             	   	  $('#error').html(html);	
             	}
             	
             	
             })
		}
	</script>



</body>

</html>