<?php 
include_once "app/vistas/layout/head.php";
 ?>
<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Verificar</strong> Personas</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">Personas & PNP</a></li>
									<li class="breadcrumb-item"><a href="#">Registro</a></li>
									<li class="breadcrumb-item active" aria-current="page">Persona</li>
								</ol>
							</nav>
						</div>
					</div>

            
            <div class="row">
            	<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Verificar Persona</h5>
									<h6 class="card-subtitle text-muted">Buscar con el dni.</h6>
								</div>
								<div class="card-body">
								  <form id="formPersona">
								    <div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Tipo de Documento</label>
											<div class="col-sm-10">
												<select class="form-control" name="tipoprueba">
													<option value="" selected disabled>[seleccione]</option>
													<option value="DNI">DNI</option>
													<option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
													<option value="RUC">RUC</option>
													<option value="Pasaporte">Pasaporte</option>
												</select>
											</div>
										</div>
 									<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">DNI</label>
											<div class="col-sm-10">
											  <div class="input-group">
												<input type="text" class="form-control" name="dni" id="dni" placeholder="DNI">
												 <span class="input-group-btn">
											        <button class="btn btn-primary" type="button" onclick="buscarPersona()">Buscar</button>
											      </span>
											      </div>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Nombres</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" readonly>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Apellidos</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" readonly>
											</div>
										</div>
									</form>
									
								</div>
							</div>
					</div>
            </div>


			</div>
</main>
<?php 
include_once "app/vistas/layout/footer.php";
 ?>