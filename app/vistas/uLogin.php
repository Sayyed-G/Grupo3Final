<?php 
 include_once 'app/vistas/layout/header.php';
 ?>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenidos al sistema</h1>
							<p class="lead">
								Para controlar personas en el transporte del covid 19!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="recursos/img/avatars/avatar.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
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
								            <a href="#">Se olvidó su contraseña?</a>
								          </small>
										</div>
										<div>
											<label class="form-check">
									            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
									            <span class="form-check-label">
									              Recordarme
									            </span>
									          </label>
										</div>
									 </form>
										<div class="text-center mt-3">
											<a href="#" class="btn btn-lg btn-primary" onclick="iniciar()">Iniciar</a><br><br>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
											<!--<a href="crear-usuarios" class="btn btn-lg btn-primary">Crear Cuenta</a> -->
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
	<script src="recursos/js/app.js"></script>
	<script>
		function iniciar() {
             var datos = $('#formUser').serializeArray();
             $.ajax({
             	method: 'POST',
             	url: 'ajax.php',
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