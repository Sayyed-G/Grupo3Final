<?php 
include_once "app/vistas/layout/head.php";
 ?>
<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Control</strong> Covid</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">Control Covid</a></li>
									<li class="breadcrumb-item"><a href="#">Registro</a></li>
									<li class="breadcrumb-item active" aria-current="page">Control</li>
								</ol>
							</nav>
						</div>
					</div>
                  <div class="row">
                   <div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Registrar Persona</h5>
									<h6 class="card-subtitle text-muted">Buscar con el dni.</h6>
								</div>
								<div class="card-body">
						<form id="formControl">
								<!--  <form id="formPersona"> 
								   <input type="hidden" name="accion" value="GUARDAR_PERSONA"> -->
								   <input type="hidden" id="comprobar">
								   <input type="hidden" id="codigoActual">
								    <div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Tipo de Documento</label>
											<div class="col-sm-10">
												<select class="form-control" name="tipoDoc" id="tipoDoc">
													<option value="DNI" selected>DNI</option>
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
								<!--	</form> -->
									
								</div>
							</div>
							<div class="card">
								<div class="card">
								<div class="card-header">
									<h5 class="card-title">Reporte de Controles</h5>
									
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                    	<table class="table table-hover">
                                    		<thead>
                                    			<th>#</th>
                                    			<th>Código</th>
                                    			<th>Fecha de Control</th>
                                    			<th>Resultado</th>
                                    			<th>Acciones</th>
                                    		</thead>
                                    		<tbody id="listarControl"></tbody>
                                    	</table>
                                    </div>
								</div>
							</div>
						 </div>
					</div>
                  	<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Registrar control</h5>
									<h6 class="card-subtitle text-muted">Completar todo los campos.</h6>
								</div>
								<div class="card-body">
								<!--GHADUR------------------------------------------------------------------------------------------ -->

                                <input type="hidden" name="dni_paciente" id="dni_paciente">
                                <input type="hidden" name="nombre_paciente" id="nombre_paciente">
                                <input type="hidden" name="apellido_paciente" id="apellido_paciente">
                         <!---------------------------------------------------------------------------------------------->

									  <input type="hidden" name="accion" value="CONTROL">
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Codigo</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" readonly>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Estadia de la persona</label>
											<div class="col-sm-10">
												<select class="form-control" name="estadiapersona" onchange="transporte(this)">
													<option value="Permanente" selected>Permanente</option>
													<option value="Transito">Transito</option>
												</select>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Número de prueba</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="docprueba" id="docprueba" placeholder="Número de documento de prueba">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Tipo de prueba</label>
											<div class="col-sm-10">
												<select class="form-control" name="tipoprueba" id="tipoprueba">
													<option value="Prueba rapida" selected>Prueba rapida</option>
													<option value="Prueba molecular">Prueba molecular</option>
													<option value="Ninguno">Ninguno</option>
												</select>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Fecha de prueba</label>
											<div class="col-sm-10">
												<input type="date" class="form-control" name="fechaprueba" id="fechaprueba" value="<?=date('Y-m-d')?>">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Fecha de registro</label>
											<div class="col-sm-10">
												<input type="date" class="form-control" name="fechareg" value="<?=date('Y-m-d')?>">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Medio de transporte</label>
											<div class="col-sm-10">
												<select class="form-control" name="mtransporte">
													<option value="Terrestre" selected>Terrestre</option>
													<option value="Aerea">Aerea</option>
												</select>
											</div>
										</div>
										
										<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Resultado</label>
												<div class="col-sm-10">
													<label class="form-check">
								                  <input name="resultado" id="resultado" name="resultado" type="radio" value="Negativo" onchange="transporte(this)" class="form-check-input" checked>
								                  <span class="form-check-label">Negativo</span>
								                </label>
								                <label class="form-check">
								                  <input name="resultado" id="resultado" name="resultado" type="radio" value="Cuarentena" onchange="transporte(this)" class="form-check-input">
								                  <span class="form-check-label">Cuarentena</span>
								                </label>
												
											</div>
										</div>
												</fieldset>
									</form>								
										<div class="mb-3 row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="button" onclick="guardarControl()" class="btn btn-primary">Registrar</button>
												
											</div>
										</div>
									 <div id="resultados"></div>
								</div>
							</div>
						</div>
                  </div>
				

				</div>
	</main>
<script>
	function transporte(e) {
		var tipo = e.value;
		if (tipo=='Transito' || tipo=='Cuarentena') {
          $('#docprueba').attr('readonly',true);
          $('#tipoprueba').attr('readonly',true);
          $('#fechaprueba').attr('readonly',true);
          $('#tipoprueba').val('Ninguno');
          $('#fechaprueba').val('');
		} else {
		  $('#docprueba').attr('readonly',false);
          $('#tipoprueba').attr('readonly',false);
          $('#fechaprueba').attr('readonly',false);
          $('#tipoprueba').val('Prueba rapida');
              var fecha = new Date(); //Fecha actual
			  var mes = fecha.getMonth()+1; //obteniendo mes
			  var dia = fecha.getDate(); //obteniendo dia
			  var ano = fecha.getFullYear(); //obteniendo año
			  if(dia<10)
			    dia='0'+dia; //agrega cero si el menor de 10
			  if(mes<10)
			    mes='0'+mes //agrega cero si el menor de 10
			  document.getElementById('fechaprueba').value=ano+"-"+mes+"-"+dia;
      
		}
	}
</script>
<?php 
include_once "app/vistas/layout/footer.php";
 ?>