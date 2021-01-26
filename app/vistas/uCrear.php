<?php 
 //include_once 'app/vistas/layout/header.php';
include_once "app/vistas/layout/head.php";
if ($_SESSION['tipo']!=1) {
  header("Location: bienvenido");
  exit;
}
 ?>


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
											<label class="form-label">Email/Usuario</label>
											<input class="form-control form-control-lg" type="email" name="user" placeholder="Escriba un Usuario" />
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
											<a href="#" class="btn btn-lg btn-primary" onclick="crear()">Crear</a><br><br>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										  <!--	<a href="login" class="btn btn-lg btn-primary">Iniciar sesión</a> -->
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
	<?php 
    include_once "app/vistas/layout/footer.php";
 ?>
	<script>
		function crear() {
             var datos = $('#formCrear').serializeArray();
             console.log(datos);
             $.ajax({
             	method: 'POST',
             	url: 'ajax.php',
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
